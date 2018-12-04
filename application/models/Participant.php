<?php
class Participant extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    private function calculate_fee($guest_list)
    {
        $Fee = 500;
        foreach($guest_list as $guest){
            if($guest['relation'] == 'Spouse'){
                $Fee += 800;
            }
            else{
                $Fee += 300;
            }
        }

        return $Fee;
    }

    private function clean_guest_info($guest_list)
    {
        $new_guest = [];
        $spouse_count = 0;
        $child_count = 0;
        foreach ($guest_list as $guest) {
            if (!empty(($guest['relation']))) {
                if($guest['relation'] == 'Spouse'){
                    $spouse_count++;
                } elseif($guest['relation'] == 'Child'){
                    $child_count++;
                }
                array_push($new_guest, $guest);
            }
        }
        $data =['guests' => $new_guest, 'spouse_count'=>$spouse_count, 'child_count' => $child_count]; 
        return $data;
    }

    public function add_participant($data = null)
    {
        date_default_timezone_set('Asia/Dhaka');
        $date = date("Y-m-d H:i:s");

        $guest_info = $this->clean_guest_info($data['guest']);
        $guest_list = $guest_info['guests'];

        $user_data = [
            'batch' => $data['batch'],
            'name' => $data['name'],
            'photo' => $data['photo']['upload_data']['full_path'],
            'father' => $data['father'],
            'mother' => $data['mother'],
            'gender' => $data['gender'],
            'mstat' => $data['mstat'],
            'occupation' => $data['occupation'],
            'designation' => $data['designation'],
            'contact' => $data['contact'],
            'spouse_count' => $guest_info['spouse_count'],
            'child_count' => $guest_info['child_count'],
            'total_amount' => $this->calculate_fee($guest_list),
            'paid_amount' => 0,
            'date' => $date,
        ];

        $this->db->insert('userinfo', $user_data);
        $reg_id = $this->db->insert_id();

        foreach ($guest_list as $guest) {
            $guest['reg_id'] = $reg_id;
            $this->db->insert("guests", $guest);
        }
        $success = [
            'reg_id'=>$reg_id, 
            'spouse_count'=> $guest_info['spouse_count'],
            'child_count'=> $guest_info['child_count'],
        ];
        return $success;
    }
    public function getBatch()
    {
        $this->db->select("batch");
        $this->db->from('batchrepresentative');
        $query = $this->db->get();
        return $query->result();
    }
    public function getBatch()
    {
        $this->db->select("batch");
        $this->db->from('batchrepresentative');
        $query = $this->db->get();
        return $query->result();
    }
}
