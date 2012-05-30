<?php

class Admin_settings extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('config_model', 'treasure_model'));
    }

    public function index() {
        $this->data['config'] = $this->config_model->get_all();
        $this->data['amountoftreasure'] = sizeof($this->treasure_model->get_all());
        $this->template->write_view('content', 'views/admin/settings/index', $this->data);
        $this->template->render();
    }

    public function update() {
        if ($this->input->is_ajax_request()) {
            $this->config_model->update_by('key', $this->input->post('key'), array('value' => $this->input->post('value')));
        }
        else {
            show_404(current_url(), FALSE);
        }
    }

}