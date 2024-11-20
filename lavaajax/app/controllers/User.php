<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->call->model('User_model');
    }
    public function showuser(){
        $this->call->view('/user/user');
    }

    public function read() {
        $users = $this->User_model->read_all();
        echo json_encode($users); // Return JSON data for AJAX
    }
    public function readone() {
        $id = $this->io->get('id');
        $users = $this->User_model->read_one($id);
        echo json_encode($users); // Return JSON data for AJAX
    }

    public function create() {
        $data = [
            'rsm_last_name' => $this->io->post('last_name'),
            'rsm_first_name' => $this->io->post('first_name'),
            'rsm_email' => $this->io->post('email'),
            'rsm_gender' => $this->io->post('gender'),
            'rsm_address' => $this->io->post('address')
        ];
        $result = $this->User_model->create($data);
        echo json_encode(['success' => $result]);
    }

    public function update() {
        $id = $this->io->post('id');
        $data = [
            'rsm_last_name' => $this->io->post('last_name'),
            'rsm_first_name' => $this->io->post('first_name'),
            'rsm_email' => $this->io->post('email'),
            'rsm_gender' => $this->io->post('gender'),
            'rsm_address' => $this->io->post('address')
        ];
        $result = $this->User_model->update($id, $data);
        echo json_encode(['success' => $result]);
    }

    public function delete() {
        $id = $this->io->post('id');
        $result = $this->User_model->delete($id);
        echo json_encode(['success' => $result]);
    }
}
?>
