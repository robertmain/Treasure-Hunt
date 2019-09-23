<?php

class Admin_login extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if (isLoggedIn()) {
            redirect('admin/home');
        }
        $this->template->write_view('content', 'views/admin/auth/index');
        $this->template->render();
    }

    public function auth() {
        if ($user = $this->pirate_model->get_by(array('username' => $this->input->post('username'), 'password' => hash('sha512', $this->input->post('password')), 'admin' => 1))) {
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