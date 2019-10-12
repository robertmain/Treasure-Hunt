<?php

use App\Core\Admin_Controller;

class Admin_settings extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('Config', 'Treasure'));
    }

    public function index() {
        $this->data['config'] = $this->Config->get_all();
        $this->data['amountoftreasure'] = sizeof($this->Treasure->get_all());

        $this->render('partials::admin/settings/index', $this->data);
    }

    public function update() {
        if ($this->input->is_ajax_request()) {
            $config_item = $this->Config->get_by([
                'key' => $this->input->post('key')
            ]);
            $this->Config->save([
                'value' => $this->input->post('value'),
            ], $config_item->id);
        }
        else {
            show_404(current_url(), FALSE);
        }
    }

}
