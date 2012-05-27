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
    public function get_all_and_last() {
        $query='
SELECT * 
FROM (SELECT treasure.title, found.pirate, treasure.location, treasure.clue, treasure.id AS treasure_id, found.id AS found_id, treasure.text, treasure.md5
FROM treasure
LEFT JOIN found ON found.treasure = treasure.id
ORDER BY found.time DESC
) AS temp_table
LEFT JOIN pirates ON pirates.id = temp_table.pirate
GROUP BY temp_table.treasure_id';
        
        return $this->db->query($query)->result();
    }

}