<?php
class PaymentModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add($data)
    {
        return $this->db->insert("payments", $data);
    }
}
