<?php

class MY_PirateController extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if (!isLoggedIn()) {
            show_404(current_url(), FALSE);
        }
    }

}