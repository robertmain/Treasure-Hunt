<?php

class Treasure_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->_table = 'treasure';
        $this->before_delete = array('delete_found');
    }

    public function delete_found($id) {
        $this->db->delete('found', array('treasure' => $id));
    }

}