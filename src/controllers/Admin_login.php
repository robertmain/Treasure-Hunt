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
        $user = $this->Pirate->get_by([
            'username' => $this->input->post('username'),
            'password' => hash('sha512', $this->input->post('password')),
            'admin' => 1
        ]);
        if ($user) {
            $this->session->set_userdata('id', $user->id);
            redirect('admin/home');
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
