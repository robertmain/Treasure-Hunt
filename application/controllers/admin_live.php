<?php

class Admin_live extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('mytreasure_model'));
    }

    public function index() {
        $this->template->set_template('live');
        $this->template->write_view('content', 'views/live/index');
        $this->template->render();
    }

    public function socket() {
        if ($this->input->is_ajax_request()) {
            if ($this->uri->segment(4)) {
                $response = $this->mytreasure_model->get_new_found($this->uri->segment(4));
            }
            else {
                $response = $this->mytreasure_model->get_all_found();
            }
            $this->output->set_content_type('application/json')->set_output(json_encode($response));
        }
        else {
            show_404(current_url(), FALSE);
        }
    }

}