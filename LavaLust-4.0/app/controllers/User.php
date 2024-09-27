<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User extends Controller {

    public function __construct() {
        parent:: __construct();
        $this->call->model('User_model');
    }
	
    public function read() {
        $data['user'] = $this->User_model->read();
        //var_dump($prod);
        $this->call->view('user/display', $data);
	}

    public function create() {  
        if($this->form_validation->submitted()) {
            $this->form_validation
                ->name('lastName')
                    ->required()
                    ->alpha()
                ->name('firstName')
                    ->required()
                    ->alpha()
                ->name('email')
                    ->required()
                    ->valid_email()
                ->name('gender')
                    ->required()
                    ->alpha()
                ->name('address')
                    ->required()
                    ->alpha();
                    
			        
            if($this->form_validation->run()) {

                $user_lastName = $this->io->post('lastName');
                $user_firstName = $this->io->post('firstName');
                $user_email = $this->io->post('email');
                $user_gender = $this->io->post('gender');
                $user_address = $this->io->post('address');

                $this->User_model->create($user_lastName, $user_firstName, $user_email, $user_gender, $user_address);
            }  else {

            }
        }
        $this->call->view('user/create');
    }
    public function update($id){

        if($this->form_validation->submitted()) {
            $this->form_validation
                ->name('lastName')
                    ->required()
                    ->alpha()
                ->name('firstName')
                    ->required()
                    ->alpha()
                ->name('email')
                    ->required()
                    ->valid_email()
                ->name('gender')
                    ->required()
                    ->alpha()
                ->name('address')
                    ->required()
                    ->alpha();
                    
			        
            if($this->form_validation->run()) {

                $user_lastName = $this->io->post('lastName');
                $user_firstName = $this->io->post('firstName');
                $user_email = $this->io->post('email');
                $user_gender = $this->io->post('gender');
                $user_address = $this->io->post('address');

                $this->User_model->update($user_lastName, $user_firstName, $user_email, $user_gender, $user_address);
                $data['danso'] = $this->User_model->get_one($id);
                $this->call->view('user/update', $data);
            }
        
       
    }
    
}
    public function delete($id){
        if($this->User_model->delete($id)){
            echo '<div class="alert alert-success" role="alert">Deleted successfully</div>';
            redirect('user/display');
        } 
    }
}
?>
