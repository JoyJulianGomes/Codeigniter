<?php
class Participant extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add_participant($data = null)
    {
        $this->db->insert('userinfo', $data['userinfo']);
        $reg_id = $this->db->insert_id();

        foreach ($data['guest'] as $guest) {
            $guest['reg_id'] = $reg_id;
            $this->db->insert("guests", $guest);
        }
        return $reg_id;
    }

    public function get_payable_and_paid_amount($regid)
    {
        $this->db->select('total_amount, paid_amount, status');
        $this->db->where('regid', $regid);
        $query = $this->db->get('userinfo');
        $rst = $query->result();
        return $rst[0];
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

    public function getParticipantInfo($rid)
    {
        $this->db->select("regid,name, contact, batch, total_amount, paid_amount, status");
        $this->db->where("regid", $rid);
        $this->db->from('userinfo');
        $query = $this->db->get();
        $rst = $query->result();
        return $rst[0];
    }
    
    public function getParticipantList($btch)
    {
        $this->db->select("regid, name, gender, batch, contact");
        $this->db->where("batch", $btch);
        $query = $this->db->get("userinfo");
        $rst = $query->result();
        return $rst;
    }
}
