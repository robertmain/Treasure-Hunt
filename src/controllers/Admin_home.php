<?php

use App\Core\Admin_Controller;

//phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
//phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
class Admin_home extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!isLoggedIn()) {
            redirect('admin/login');
        }
        $this->load->model(['Mytreasure', 'Pirate', 'Treasure']);
        $this->load->helper(['analytics']);
    }

    public function index()
    {
        $this->data['registeredUsers'] = $this->Pirate->get_many_by('admin', false);
        $this->data['totalCodesInDatabase'] = $this->Treasure->get_all();
        $this->data['totalFoundCodes'] = $this->Mytreasure->get_all();
        $this->data['treasure_per_pirate'] = $this->Mytreasure->treasurePerPirate();
        $this->data['treasureFoundData'] = $this->Mytreasure->getTreasureFoundAnalytics();
        $this->data['signupData'] = $this->Pirate->getSignupAnalytics();
        $this->render('partials::admin/home/index', $this->data);
    }
}
