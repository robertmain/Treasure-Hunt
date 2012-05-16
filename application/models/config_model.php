<?php

class Config_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->primary_key = 'key';
        $this->_table = 'config';
    }

}