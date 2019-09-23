<?php

use App\Core\Controller;

class Auth extends Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pirate');
    }

    public function index() {
        redirect('auth/login');
    }

    public function login() {
        if (isLoggedIn()) {
            show_404(current_url(), FALSE);
        }

        $this->render('partials::auth/login');
    }

    public function authenticate() {
        if (isLoggedIn()) {
            show_404(current_url(), FALSE);
        }
        $user = $this->Pirate->get_by([
            'phone' => $this->input->post('login'),
            'admin' => '0',
            'password' => hash('sha512', $this->input->post('password')),
        ]);
        if ($user) {
            if ($this->Config->get_by(['key' => 'authorisation'])->value == '1') {
                if ($user->authorised == '1') {
                    $this->session->set_userdata('id', $user->id);
                    redirect('home');
                }
                else {
                    $this->session->set_flashdata('autherror', array('title' => 'Error', 'content' => 'Your Account Is Not Yet Authoriseed. <br />To Authorise Your Account Please Visit The ' . TEAMNAME . ' Booth And Ask To Get Your Device Activated'));
                    redirect('login');
                }
            }
            else {
                $this->session->set_userdata('id', $user->id);
                redirect('home');
            }
        }
        else {
            $this->session->set_flashdata('autherror', array('title' => 'Authentication Error', 'content' => 'Username/Password Not Found'));
            redirect('auth/login');
        }
    }

    public function register() {
        $this->render('partials::auth/register');
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
                'password' => hash('sha512', $this->input->post('password')),
                'signup' => time()
            );
            $newPirateID = $this->pirate_model->insert($newPirate);
            $this->session->set_userdata('id', $newPirateID);
            $this->session->set_flashdata('registerinfo', array('title' => 'Information', 'content' => 'Your account has been successfully created and you have been logged in.<br /> <a href="' . site_url('') . '" class="btn btn-large btn-success">Go To Dashboard (Redirecting in <span class="seconds"></span>) </a>'));
            redirect('auth/register');
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
