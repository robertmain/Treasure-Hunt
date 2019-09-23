<?php

use App\Core\Controller;

/**
 * Starter controller to give a basic introduction and example of how controlelrs work in CodeIgniter
 */
class Home extends Controller
{
    /**
     * Display the index page
     */
    public function index() : void
    {
        $this->load->model(['Mytreasure', 'Treasure']);
        $this->data['amountOfTreasure'] = count($this->Treasure->get_all());
        $this->render('partials::landing/index', $this->data);
    }
}
