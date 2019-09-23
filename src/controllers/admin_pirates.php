<?php

class Admin_pirates extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('mytreasure_model', 'pirate_model', 'config_model'));
    }

    /* =======NON-AJAX ACTIONS======= */

    public function index() {
        $this->data['registeredUsers'] = $this->pirate_model->get_all();
        $this->data['mytreasures'] = $this->mytreasure_model->get_treasure_per_user();
        $this->template->write_view('content', 'views/admin/pirates/index', $this->data);
        $this->template->render();
    }

    public function manage() {
        $this->data['authorisationEnabled'] = $this->config_model->get_by('key', 'authorisation');
        $this->data['Pirate'] = $this->pirate_model->get($this->uri->segment(4));
        $this->template->write_view('content', 'views/admin/pirates/manage', $this->data);
        $this->template->render();
    }
    
    public function update(){
        $updatedPirate = array(
            'phone'=>$this->input->post('phone')
        );
        
        if($this->input->post('password')){
            $updatedPirate['password'] = hash('sha512', $this->input->post('password'));
        }
        
        $this->pirate_model->update_by('id', $this->input->post('id'), $updatedPirate);
        redirect('admin/pirates');
    }

    /* =======END NON-AJAX ACTIONS======= */



    /* =======AJAX ACTIONS======= */

    public function get() {
        if ($this->input->is_ajax_request()) {
            if ($this->uri->segment(4)) {
                $pirate = $this->pirate_model->get($this->uri->segment(4));
                unset($pirate->admin, $pirate->authorised, $pirate->email, $pirate->forename, $pirate->password, $pirate->phone, $pirate->signup, $pirate->surname, $pirate->username, $pirate->banned);
                $this->output->set_content_type('application/json')->set_output(json_encode($pirate));
            }
            else {
                show_error(400, FALSE);
            }
        }
        else {
            show_404(current_url(), FALSE);
        }
    }

    public function ban() {
        if ($this->input->is_ajax_request()) {
            if ($this->uri->segment(4)) {
                $this->pirate_model->update_by('id', $this->uri->segment(4), array('banned' => '1'));
            }
            else {
                show_error(400, FALSE);
            }
        }
        else {
            show_404(current_url(), FALSE);
        }
    }

    public function unban() {
        if ($this->input->is_ajax_request()) {
            if ($this->uri->segment(4)) {
                $this->pirate_model->update_by('id', $this->uri->segment(4), array('banned' => '0'));
            }
            else {
                show_error(400, FALSE);
            }
        }
        else {
            show_404(current_url(), FALSE);
        }
    }

    public function authorise() {
        if ($this->input->is_ajax_request()) {
            if ($this->uri->segment(4)) {
                $this->pirate_model->update_by('id', $this->uri->segment(4), array('authorised' => '1'));
            }
            else {
                show_error(400, FALSE);
            }
        }
        else {
            show_404(current_url(), FALSE);
        }
    }
    
    public function deauthorise() {
        if ($this->input->is_ajax_request()) {
            if ($this->uri->segment(4)) {
                $this->pirate_model->update_by('id', $this->uri->segment(4), array('authorised' => '0'));
            }
            else {
                show_error(400, FALSE);
            }
        }
        else {
            show_404(current_url(), FALSE);
        }
    }

    public function strip_treasure() {
        if ($this->input->is_ajax_request()) {
            if ($this->uri->segment(4)) {
                $this->mytreasure_model->strip_treasure($this->uri->segment(4));
                $pirate = $this->pirate_model->get($this->uri->segment(4));
                $this->output->set_content_type('application/json')->set_output(json_encode($pirate));
            }
            else {
                show_error(400, FALSE);
            }
        }
        else {
            show_404(current_url(), FALSE);
        }
    }

    /* =======END AJAX ACTIONS======= */
}

?>
