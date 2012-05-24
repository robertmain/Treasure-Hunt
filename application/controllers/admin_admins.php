<?php

class Admin_admins extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['admins'] = $this->pirate_model->get_many_by(array('admin' => '1'));
        $this->template->write_view('content', 'views/admin/admins/index', $this->data);
        $this->template->render();
    }

    public function create() {
        if ($this->input->is_ajax_request()) {
            $newAdmin = array(
                'forename' => $this->input->post('forename'),
                'surname' => $this->input->post('surname'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'admin' => '1',
                'signup' => time()
            );
            $this->pirate_model->insert($newAdmin);
            $this->output->set_content_type('application/json')->set_output(json_encode($this->pirate_model->get_many_by('admin', '1')));
        }
    }

    public function edit() {
        $this->data['Admin'] = $this->pirate_model->get($this->uri->segment(4));
        $this->template->write_view('content', 'views/admin/admins/edit', $this->data);
        $this->template->render();
    }

    public function update() {
        $updatedAdmin = array(
            'forename' => $this->input->post('forename'),
            'surname' => $this->input->post('surname'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
        );
        if ($this->input->post('password')) {
            $updatedAdmin['password'] = hash('sha512', $this->input->post('password'));
        }
        $this->pirate_model->update_by('id', $this->input->post('id'), $updatedAdmin);
        redirect('admin/admins');
    }

    public function delete() {
        $this->data['Admin'] = $this->pirate_model->get($this->uri->segment(4));
        $this->template->write_view('content', 'views/admin/admins/delete', $this->data);
        $this->template->render();
    }

    public function remove() {
        $this->pirate_model->delete($this->uri->segment(4));
        redirect('admin/admins');
    }

}