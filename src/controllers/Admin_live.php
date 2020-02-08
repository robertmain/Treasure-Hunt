<?php

use App\Core\Controller;

// phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
// phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
class Admin_live extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Mytreasure']);
    }

    public function index()
    {
        $this->render('partials::live/index', $this->data);
    }

    public function socket()
    {
        $since = $this->input->get('since');
        if ($since) {
            $response = $this->Mytreasure->getNewFound($since);
        } else {
            $response = $this->Mytreasure->getAllFound();
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
}
