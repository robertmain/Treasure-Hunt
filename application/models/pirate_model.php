<?php

class Pirate_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->before_delete = array('delete_found');
        //$this->after_get = array('resolve_timestamp');
    }

    public function delete_found($id) {
        $this->db->delete('found', array('pirate' => $id));
    }

    public function resolve_timestamp($row) {
        $row->signup = DateTime::createFromFormat('U', $row->signup);
    }

}