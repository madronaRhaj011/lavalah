<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_model extends Model {
	
    public function read() {
        return $this->db->table('rsm_users')->get_all();
    }
    public function create($lastName, $firstName, $email, $gender, $address) {
        $data = array(
            'rsm_last_name' => $lastName,
            'rsm_first_name' => $firstName,
            'rsm_email' => $email,
            'rsm_gender' => $gender,
            'rsm_address' => $address
        );
        return $this->db->table('rsm_users')->insert($data);
    }
    public function get_one($id){
       return $this->db->table('rsm_users')->where('id', $id)->get();
    }
    public function update($lastName, $firstName, $email, $gender, $address, $id) {
        $data = array(
            'rsm_last_name' => $lastName,
            'rsm_first_name' => $firstName,
            'rsm_email' => $email,
            'rsm_gender' => $gender,
            'rsm_address' => $address
        );
        return $this->db->table('rsm_users')->where('id', $id)->update($data);
    }
    public function delete($id){
        return $this->db->table('rsm_users')->where('id', $id)->delete();
    }
}
?>
