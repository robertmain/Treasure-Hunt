<?php

class Auth extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('pirate_model');
    }

    public function index() {
        if (isLoggedIn()) {
            show_404(current_url(), FALSE);
        }
        $this->template->write_view('content', 'views/auth/index');
        $this->template->render();
    }

    public function authenticate() {
        if (isLoggedIn()) {
            show_404(current_url(), FALSE);
        }
        if ($user = $this->pirate_model->get_by(array('email' => $this->input->post('login'), 'password' => hash('sha512', $this->input->post('password'))))) {
            if ($this->config_model->get('authorisation')->value == '1') {
                if ($user->authorised == '1') {
                    $this->session->set_userdata('id', $user->id);
                    redirect('home');
                }
                else {
                    $this->session->set_flashdata('autherror', array('title' => 'Error - Account Not Authorised', 'content' => 'Your Account Is Not Yet Authoriseed. <br />To Authorise Your Account Please Visit The ' . TEAMNAME . ' Booth And Ask To Get Your Device Activated'));
                    redirect('auth');
                }
            }
            else {
                $this->session->set_userdata('id', $user->id);
                redirect('home');
            }
        }
        else {
            $this->session->set_flashdata('autherror', array('title' => 'Error - Authentication Failed', 'content' => 'Username/Password Not Found'));
            redirect('auth');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('home');
    }

}