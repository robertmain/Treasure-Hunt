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
        $this->db->select('pirates.phone,pirates.signup,count(found.id) as treasures, pirates.id as p_id');
        $this->db->from('pirates');
        $this->db->join('found', 'found.pirate = pirates.id', 'left');
        $this->db->where('pirates.admin', '0');
        $this->db->group_by("pirates.id");
        return $this->db->get()->result();
    }

    public function get_all_found() {
        $this->db->select('found.id as f_id, found.treasure, treasure.title, pirates.phone');
        $this->db->from('found');
        $this->db->join('pirates', 'pirates.id = found.pirate');
        $this->db->join('treasure', 'treasure.id = found.treasure');
        $this->db->order_by('found.time');
        $results = array();
        foreach ($this->db->get()->result() as $Found) {
            $Found->phone = md5(PIRATESALT . $Found->phone);
            $results[] = $Found;
        }
        return $results;
    }

    public function get_new_found($id) {
        $this->db->select('found.id as f_id, found.treasure, treasure.title, pirates.phone');
        $this->db->from('found');
        $this->db->where('found.id >', $id);
        $this->db->join('pirates', 'pirates.id = found.pirate');
        $this->db->join('treasure', 'treasure.id = found.treasure');
        $this->db->order_by('found.time');
        $results = array();
        foreach ($this->db->get()->result() as $Found) {
            $Found->phone = md5(PIRATESALT . $Found->phone);
            $results[] = $Found;
        }
        return $results;
    }

    public function strip_treasure($pirateID) {
        $this->db->where('pirate', $pirateID);
        return $this->db->delete($this->_table);
    }

}