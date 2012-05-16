<?php

class Pirate_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->after_get = array('resolve_name');
    }

    public function resolve_name($row) {
        $row->name = $row->forename . ' ' . $row->surname;
    }

}