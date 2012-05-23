<?php

class Mytreasure_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->_table = 'found';
        $this->load->model(array('treasure_model', 'pirate_model'));
        $this->after_get = array('get_treasure', 'get_pirate');
    }

    public function get_treasure($row) {
        @$row->treasure = $this->treasure_model->get($row->treasure);
    }

    public function get_pirate($row) {
        @$row->pirate = $this->pirate_model->get($row->pirate);
    }

    public function get_treasure_per_user() {
               
        $this->db->select('pirates.phone,pirates.signup,count(found.id) as treasures');
        $this->db->from('pirates');
        $this->db->join('found', 'found.pirate = pirates.id', 'left');
        $this->db->group_by("pirates.id");
             
        return $this->db->get()->result();
    }
    

}