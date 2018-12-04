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
        foreach ($guest_list as $guest) {
            if (!empty(($guest['relation']))) {
                array_push($new_guest, $guest);
            }
        }
        return $new_guest;
    }

    public function add_participant($data = null)
    {
        date_default_timezone_set('Asia/Dhaka');
        $date = date("Y-m-d H:i:s");

        $guest_list = $this->clean_guest_info($data['guest']);

        // print_r($data);
        // print_r($guest_list);

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
            'total_amount' => $this->calculate_fee($guest_list),
            'paid_amount' => 0,
            'date' => $date,
        ];
        // print_r($user_data);

        $this->db->insert('userinfo', $user_data);
        $reg_id = $this->db->insert_id();

        foreach ($guest_list as $guest) {
            $guest['reg_id'] = $reg_id;
            $this->db->insert("guests", $guest);
        }
        return $reg_id;
    }
}
