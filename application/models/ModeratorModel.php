<?php
class ModeratorModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function can_login($username, $password)
    {
        $this->db->where('name', $username);
        $this->db->where('pass', $password);
        $query = $this->db->get('moderator');

        if($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function get_username($name)
    {
        $query = $this->db->get_where('moderator', array('name' => $name));
        $result = $query->result();
        return $result;
    }

    public function getModeratorList()
    {
        $this->db->select("name, contact");
        $this->db->from('moderator');
        $query = $this->db->get();
        $rst = $query->result();
        return $rst;
    }

    public function add($data)
    {
        $this->db->insert('moderator', $data);
        $id = $this->db->insert_id();
        return $id;
    }
}
