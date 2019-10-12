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
        if ($this->uri->segment(4)) {
            $response = $this->Mytreasure->getNewFound($this->uri->segment(4));
        } else {
            $response = $this->Mytreasure->getAllFound();
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
}
