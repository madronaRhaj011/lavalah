<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User extends Controller {
	
    public function __construct()
    {
        parent:: __construct();
        $this->call->model('User_model');
    }

    public function read() {
        // Safely retrieve 'page' from URL parameters, defaulting to 1 if not set
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        
        // Set number of records per page
        $perPage = 10;
        
        // Calculate offset for the query
        $offset = ($page - 1) * $perPage;
        
        // Fetch users with pagination from the model
        $data['user'] = $this->User_model->read_with_pagination($perPage, $offset);
        
        // Get the total number of users to calculate total pages
        $totalUsers = $this->User_model->count_users();
        
        // Calculate total pages
        if ($totalUsers > 0) {
            $data['total_pages'] = ceil($totalUsers / $perPage);
        } else {
            $data['total_pages'] = 1; // Default to 1 if no users found
        }
    
        // Pass the current page to the view
        $data['current_page'] = $page;
        
        // Render the view
        $this->call->view('/user/display', $data);
    }
    
    
    

    public function create(){
        if($this->form_validation->submitted()) {
            $this->form_validation
                ->name('rsm_last_name')
                    ->required()
                    ->alpha()
                ->name('rsm_first_name')
                    ->required()
                    ->alpha()
                ->name('rsm_email')
                    ->required()
                    ->valid_email()
                ->name('rsm_gender')
                    ->required()
                    ->alpha()
                ->name('rsm_address')
                    ->required()
                    ->max_length(200);
            if($this->form_validation->run()){
                $rsm_last_name = $this->io->post('rsm_last_name');
                $rsm_first_name = $this->io->post('rsm_first_name');
                $rsm_email = $this->io->post('rsm_email');
                $rsm_gender = $this->io->post('rsm_gender');
                $rsm_address = $this->io->post('rsm_address');
            
                if($this->User_model->create($rsm_last_name, $rsm_first_name, $rsm_email,
                $rsm_gender, $rsm_address)){
                    set_flash_alert('success', 'User was added successfully');
                    redirect('/user/add');
                }
            }else{
                set_flash_alert('danger', $this->form_validation->errors());
                redirect('/user/add');
            }
        }
        $this->call->view('/user/create');
    }

    public function update($id){
        $data['user'] = $this->User_model->get_one($id);

        if($this->form_validation->submitted()) {
            $this->form_validation
                ->name('rsm_last_name')
                    ->required()
                    ->alpha()
                ->name('rsm_first_name')
                    ->required()
                    ->alpha()
                ->name('rsm_email')
                    ->required()
                    ->valid_email()
                ->name('rsm_gender')
                    ->required()
                    ->alpha()
                ->name('rsm_address')
                    ->required()
                    ->max_length(200);
            if($this->form_validation->run()){
                $rsm_last_name = $this->io->post('rsm_last_name');
                $rsm_first_name = $this->io->post('rsm_first_name');
                $rsm_email = $this->io->post('rsm_email');
                $rsm_gender = $this->io->post('rsm_gender');
                $rsm_address = $this->io->post('rsm_address');
            
                if($this->User_model->update($rsm_last_name, $rsm_first_name, $rsm_email,
                $rsm_gender, $rsm_address, $id)){
                    set_flash_alert('success', 'User was updated successfully');
                    redirect('/user/display');
                }
            }else{
                set_flash_alert('danger', $this->form_validation->errors());
                redirect('/user/display');
            }
        }
        
        $this->call->view('/user/update', $data);
    }

    public function delete($id){
        if($this->User_model->delete($id)){
            set_flash_alert('success', 'User was deleted successfully');
            redirect('/user/display');
        }else{
            set_flash_alert('danger', 'Something went wrong');
            redirect('/user/display');
        }
    }

    // Check for misplaced semicolon or incomplete function here
    public function search() {
        $query = $this->io->get('query'); // Assuming 'query' is the name of the search input field

        if (empty($query)) {
            $data['user'] = $this->User_model->read(); // Fetch all users
        } else {
            $data['user'] = $this->User_model->search($query); // Fetch filtered users
        }

        $this->call->view('/user/display', $data);
    } // Make sure the function ends here correctly

}
?>
