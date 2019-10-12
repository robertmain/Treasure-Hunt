<?php

use App\Core\Admin_Controller;
use Exceptions\Http\Client\NotFoundException;

//phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
//phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
class Admin_admins extends Admin_Controller
{
    public function index()
    {
        $this->data['admins'] = $this->Pirate->get_many_by(array('admin' => '1'));
        $this->render('partials::admin/admins/index', $this->data);
    }

    public function create()
    {
        if ($this->input->is_ajax_request()) {
            $this->Pirate->save([
                'forename' => $this->input->post('forename'),
                'surname' => $this->input->post('surname'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => hash('sha512', $this->input->post('password')),
                'admin' => '1',
                'signup' => time(),
            ]);
            $admins = array_map(function ($admin) {
                unset($admin->password, $admin->email, $admin->signup);
                return $admin;
            }, $this->Pirate->get_many_by(['admin' => true]));
            $this->output->set_content_type('application/json')->set_output(json_encode($admins));
        }
    }

    public function edit($user_id)
    {
        $this->data['Admin'] = $this->Pirate->get($user_id);
        $this->render('partials::admin/admins/edit', $this->data);
    }

    public function update()
    {
        $updatedAdmin = array(
            'forename' => $this->input->post('forename'),
            'surname' => $this->input->post('surname'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
        );
        if ($this->input->post('password')) {
            $updatedAdmin['password'] = hash('sha512', $this->input->post('password'));
        }
        $this->Pirate->save($updatedAdmin, $this->input->post('id'));
        redirect('admin/admins');
    }

    public function delete($user_id)
    {
        $this->data['Admin'] = $this->Pirate->get($user_id);

        $this->render('partials::admin/admins/delete', $this->data);
    }

    public function remove($user_id)
    {
        if (sizeof($this->Pirate->get_many_by(array('admin' => '1'))) > 1) {
            $this->Pirate->delete($user_id);
        }
        redirect('admin/admins');
    }
}
