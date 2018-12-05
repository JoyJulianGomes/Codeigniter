<?php
class BatchModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getBatchInfo()
    {
        $this->db->select("batch, rep_name, rep_phone");
        $this->db->from('batchrepresentative');
        $query = $this->db->get();
        $rst = $query->result();
        return $rst;
    }

    public function add($data)
    {
        return $this->db->insert("batchrepresentative", $data);
    }
}
