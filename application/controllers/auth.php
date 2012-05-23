<?php

class Auth extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('pirate_model');
    }

    public function index() {
        redirect('auth/login');
    }

    public function login() {
        if (isLoggedIn()) {
            show_404(current_url(), FALSE);
        }
        $this->template->write_view('content', 'views/auth/login');
        $this->template->render();
    }

    public function authenticate() {
        if (isLoggedIn()) {
            show_404(current_url(), FALSE);
        }
        if ($user = $this->pirate_model->get_by(array('phone' => $this->input->post('login'), 'admin' => '0', 'password' => hash('sha512', $this->input->post('password'))))) {
            if ($this->config_model->get('authorisation')->value == '1') {
                if ($user->authorised == '1') {
                    $this->session->set_userdata('id', $user->id);
                    redirect('home');
                }
                else {
                    $this->session->set_flashdata('autherror', array('title' => 'Error - Account Not Authorised', 'content' => 'Your Account Is Not Yet Authoriseed. <br />To Authorise Your Account Please Visit The ' . TEAMNAME . ' Booth And Ask To Get Your Device Activated'));
                    redirect('auth/login');
                }
            }
            else {
                $this->session->set_userdata('id', $user->id);
                redirect('home');
            }
        }
        else {
            $this->session->set_flashdata('autherror', array('title' => 'Error - Authentication Failed', 'content' => 'Username/Password Not Found'));
            redirect('auth/login');
        }
    }

    public function register() {
        if (isLoggedIn()) {
            show_404(current_url(), FALSE);
        }
        $this->template->write_view('content', 'views/auth/register');
        $this->template->render();
    }

    public function create() {
        $this->form_validation->set_rules('phone', 'Mobile No', 'trim|required|callback_mobile_check|is_numeric');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirmpassword]');
        $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
        if ($this->form_validation->run() == FALSE) {
            $this->template->write_view('content', 'views/auth/register');
            $this->template->render();
        }
        else {
            $newPirate = array(
                'phone' => $this->input->post('phone'),
                'password' => hash('sha512', $this->input->post('password'))
            );
            $this->pirate_model->insert($newPirate);
            $this->session->set_flashdata('registerinfo', array('title' => 'Information', 'content' => 'Your account has been created, press the button below to sign in and start scanning!<br /> <a href="' . site_url('auth/login') . '" class="btn btn-success">Sign In</a>'));
            redirect('auth');
        }
    }

    public function mobile_check($str) {
        if (strlen($str) != 11) {
            $this->form_validation->set_message('mobile_check', 'Please enter a valid 11 digit mobile number.');
            return FALSE;
        }
        else {
            if (sizeof($this->pirate_model->get_by('phone', $str))) {
                $this->form_validation->set_message('mobile_check', 'Mobile number is already in use, please enter another mobile number.');
                return FALSE;
            }
            else {
                return TRUE;
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('home');
    }

}