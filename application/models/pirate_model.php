<?php

class Pirate_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->before_delete = array('delete_found');
    }
    
    public function delete_found($id) {
        $this->db->delete('found', array('pirate' => $id));
    }

}