<?php

use App\Core\Controller;

class Admin_login extends Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Pirate']);
    }

    public function index() {
        if (isLoggedIn()) {
            redirect('admin/home');
        }
        $this->render('partials::admin/auth/index');
    }

    public function auth() {
        if ($user = $this->Pirate->get_by(array('username' => $this->input->post('username'), 'password' => hash('sha512', $this->input->post('password')), 'admin' => 1))) {
            $this->session->set_userdata('id', $user->id);
            redirect('admin/home');
        }
        else {
            $this->session->set_flashdata('autherror', array('title' => 'Error', 'content' => 'Unable to authenticate: Bad Username or Password'));
            redirect('admin/login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('admin/login');
    }

}
