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

    public function get_all_bkash_no()
    {
        $query =  $this->db->get('bkash_no');
        return $query->result();
    }

    public function add($data) 
    {
        $this->db->insert('bkash_no', $data);
        $id = $this->db->insert_id();
        return $id;
    }
    
    public function update_status($number, $update_data)
    {
        print_r($update_data);
        print_r($number);

        $this->db->where('number', $number);
        return $this->db->update('bkash_no', $update_data);
    }

    //jubileesjhsc
    //8850
    //sjhscjubilee
}
