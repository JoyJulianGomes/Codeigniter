<?php
class Participant extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function add()
    {
        $data = array(
            'guest_name' => "someone",
            'relation' => "spouse",
            'age' => 32,
            'reg_id' => 2,
        );

        return $this->db->insert("guests", $data);
    }
    public function getBatch()
    {
        $this->db->select("batch");
        $this->db->from('batchrepresentative');
        $query = $this->db->get();
        return $query->result();
    }
}
