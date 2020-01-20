<?php

use App\Core\Controller;

// phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
// phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
class Auth extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pirate');
    }

    public function index()
    {
        $this->render('partials::auth/get-started');
    }

    public function authenticate()
    {
        if (isLoggedIn()) {
            show_404(current_url(), false);
        }

        $authError = [
            'title' => 'Authentication Error',
            'content' => 'Username/Password Not Found',
        ];

        $authenticated = $this->Pirate->password_verify($this->input->post('login'), $this->input->post('password'));
        if ($authenticated) {
            $user = $this->Pirate->get_by(['phone' => $this->input->post('login')]);
            $requireAuthorization = $this->Config->get('authorisation')->value;
            if ($requireAuthorization) {
                if ($user->authorised) {
                    $this->session->set_userdata('id', $user->id);
                    redirect('home');
                } else {
                    $this->session->set_flashdata('autherror', [
                        'title' => 'Error',
                        'content' => 'Your Account Is Not Yet Authoriseed.<br />' .
                            'To Authorise Your Account Please Contact a Member ' .
                            ' Of ' . APP_OWNER . ', And Ask To Get Your' .
                            ' Device Activated',
                    ]);
                    redirect('login');
                }
            } else {
                $this->session->set_userdata('id', $user->id);
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('autherror', $authError);
            redirect('auth');
        }
    }

    public function create()
    {
        $this->form_validation->set_rules('phone', 'Mobile No', 'trim|required|callback_mobile_check|is_numeric');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirmpassword]');
        $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
        if ($this->form_validation->run() == false) {
            $this->render('partials::auth/register');
        } else {
            $newPirateID = $this->Pirate->save([
                'phone' => $this->input->post('phone'),
                'password' => $this->input->post('password'),
            ]);
            $this->session->set_userdata('id', $newPirateID);
            $this->session->set_flashdata('registerinfo', [
                'title' => 'Information',
                'content' =>
                    'Your account has been successfully created and you have
                    been logged in.<br /> <a href="' . site_url('') . '"
                    class="btn btn-large btn-success">Go To Dashboard (
                    Redirecting in <span class="seconds"></span>)</a>'
            ]);
            redirect('auth/register');
        }
    }

    // phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    public function mobile_check($str)
    {
        if (strlen($str) != 11) {
            $this->form_validation->set_message('mobile_check', 'Please enter a valid 11 digit mobile number.');
            return false;
        } else {
            if ($this->Pirate->get_by(['phone' => $str])) {
                $this->form_validation->set_message(
                    'mobile_check',
                    'Mobile number is already in use, please enter another mobile number.'
                );
                return false;
            } else {
                return true;
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
    }
}
