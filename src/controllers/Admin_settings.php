<?php

use App\Core\Admin_Controller;

// phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
// phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
class Admin_settings extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Config', 'Treasure']);
    }

    public function index()
    {
        $this->data['config'] = $this->Config->get_all();
        $this->data['amountoftreasure'] = sizeof($this->Treasure->get_all());

        $this->render('partials::admin/settings/index', $this->data);
    }

    public function update()
    {
        if ($this->input->is_ajax_request()) {
            $jsondata = json_decode($this->input->raw_input_stream, true);
            $this->Config->save([
                'value' => $jsondata['value'],
            ], $jsondata['key']);
        } else {
            show_404(current_url(), false);
        }
    }
}
