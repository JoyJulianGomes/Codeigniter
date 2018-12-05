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

    public function get_payable_and_paid_amount($regid)
    {
        $this->db->select('total_amount, paid_amount, status');
        $this->db->where('regid', $regid);
        $query = $this->db->get('userinfo');
        return $query->result();
    }

    public function update_paid_amount($regid, $amount)
    {
        $this->db->where('regid', $regid);
        return $this->db->update('userinfo', ['paid_amount'=>$amount]);
    }

    public function update_status($regid)
    {
        $this->db->where('regid', $regid);
        return $this->db->update('userinfo', ['status'=>true]);
    }
}
