<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_model extends Model {
    
    public function __construct(){
        parent::__construct();
        $this->call->database();
    }

    public function read_with_pagination($perPage, $offset) {
        return $this->db->table('rsm_users')->limit($perPage, $offset)->get_all();
    }

    public function create($rsm_last_name, $rsm_first_name, $rsm_email,
    $rsm_gender, $rsm_address){
        $data = array(
            'rsm_last_name' => $rsm_last_name,
            'rsm_first_name' => $rsm_first_name,
            'rsm_email' => $rsm_email,
            'rsm_gender' => $rsm_gender,
            'rsm_address' => $rsm_address
        );

        return $this->db->table('rsm_users')->insert($data);
    }

    public function get_one($id){
        return $this->db->table('rsm_users')->where('id', $id)->get();
    }

    public function update($rsm_last_name, $rsm_first_name, $rsm_email,
    $rsm_gender, $rsm_address, $id){
        $data = array(
            'rsm_last_name' => $rsm_last_name,
            'rsm_first_name' => $rsm_first_name,
            'rsm_email' => $rsm_email,
            'rsm_gender' => $rsm_gender,
            'rsm_address' => $rsm_address
        );

        return $this->db->table('rsm_users')->where('id', $id)->update($data);
    }

    public function delete($id){
        return $this->db->table('rsm_users')->where('id', $id)->delete();
    }

    // Corrected count_users method using select()
    public function count_users() {
        $result = $this->db->table('rsm_users')
                           ->select('COUNT(*) as total')
                           ->get();

        return isset($result['total']) ? $result['total'] : 0;
    }

    public function search($query) {
        return $this->db->table('rsm_users')
                        ->like('rsm_last_name', '%' . $query . '%')
                        ->or_like('rsm_first_name', '%' . $query . '%')
                        ->or_like('rsm_email', '%' . $query . '%')
                        ->or_like('rsm_address', '%' . $query . '%')
                        ->get_all();
    }
}

?>
