<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_model extends Model {

    public function __construct(){
        parent::__construct();
        $this->call->database();
    }

    public function read_all() {
        return $this->db->table('rsm_users')->get_all(); // Fetch all users
    }
    public function read_one($id) {
        return $this->db->table('rsm_users')->where('id', $id)->get();
    }

    public function create($data){
        return $this->db->table('rsm_users')->insert($data);
    }

    public function update($id, $data){
        return $this->db->table('rsm_users')->where('id', $id)->update($data);
    }

    public function delete($id){
        return $this->db->table('rsm_users')->where('id', $id)->delete();
    }
}

?>
