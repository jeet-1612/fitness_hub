<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Member_model');
        if (!$this->session->userdata('user_id')) redirect('login');
    }

    public function dashboard(){
        // user info session se
        $data['title'] = 'Member Dashboard';
        $data['user']  = $this->session->userdata('full_name') ?: $this->session->userdata('email');
        $this->load->view('members/dashboard', $data);
    }
    
    public function profile(){
        $data['title'] = 'Member Profile';
        $data['user'] = [
            'full_name' => $this->session->userdata('full_name'),
            'email' => $this->session->userdata('email')
        ];
        
        // Get member profile data
        $member_data = $this->Member_model->get_by_user_id($this->session->userdata('user_id'));
        if (!$member_data) {
            // Create basic member record if doesn't exist
            $this->Member_model->create([
                'user_id' => $this->session->userdata('user_id')
            ]);
            $member_data = $this->Member_model->get_by_user_id($this->session->userdata('user_id'));
        }
        
        $data['member'] = $member_data;
        $this->load->view('members/profile', $data);
    }
    
    public function update_profile(){
        $this->form_validation->set_rules('full_name', 'Full Name', 'required|trim');
        
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('members/profile');
        }
        
        $update_data = [
            'phone' => $this->input->post('phone'),
            'date_of_birth' => $this->input->post('date_of_birth'),
            'gender' => $this->input->post('gender'),
            'height' => $this->input->post('height'),
            'weight' => $this->input->post('weight'),
            'fitness_goal' => $this->input->post('fitness_goal'),
            'emergency_contact' => $this->input->post('emergency_contact'),
            'emergency_phone' => $this->input->post('emergency_phone')
        ];
        
        $member = $this->Member_model->get_by_user_id($this->session->userdata('user_id'));
        if ($member) {
            $this->Member_model->update($member->id, $update_data);
        }
        
        // Update user table
        $this->User_model->update($this->session->userdata('user_id'), [
            'full_name' => $this->input->post('full_name')
        ]);
        
        $this->session->set_flashdata('success', 'Profile updated successfully!');
        redirect('members/profile');
    }

}