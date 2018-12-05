<?php
class BkashModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_bkash_no($type)
    {
        $query =  $this->db->get_where('bkash_no', array('status' => $type));
        return $query->result();
    }
    //jubileesjhsc
    //8850
    //sjhscjubilee
}
