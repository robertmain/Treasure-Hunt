<?php

use App\Core\Controller;

// phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
// phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
class Admin_login extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Pirate']);
    }

    public function index()
    {
        if (isLoggedIn()) {
            redirect('admin/home');
        }
        $this->render('partials::admin/auth/index');
    }

    public function auth()
    {
        $authenticated = $this->Pirate->password_verify($this->input->post('username'), $this->input->post('password'));
        
        if ($authenticated) {
            $user = $this->Pirate->get_by(['username' => $this->input->post('username')]);
            if ($user->admin) {
                $this->session->set_userdata('id', $user->id);
                redirect('admin/home');
            } else {
                $this->session->set_flashdata('autherror', [
                    'title' => 'Error',
                    'content' => 'Unable to authenticate: Bad Username or Password',
                ]);
                redirect('admin/login');
            }
        } else {
            $this->session->set_flashdata('autherror', [
                'title' => 'Error',
                'content' => 'Unable to authenticate: Bad Username or Password',
            ]);
            redirect('admin/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin/login');
    }
}
