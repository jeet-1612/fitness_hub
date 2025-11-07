<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trainers extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Trainer_model');
        $this->load->library('session');
        if (!$this->session->userdata('user_id')) redirect('auth/login');
    }

    public function dashboard(){
        // Check if user is trainer
        if ($this->session->userdata('role_id') != 2) {
            redirect('members/dashboard');
        }
        
        $data['title'] = 'Trainer Dashboard';
        $data['user'] = $this->session->userdata('full_name') ?: $this->session->userdata('email');
        $this->load->view('trainers/dashboard', $data);
    }

    public function profile(){
        $data['title'] = 'Trainer Profile';
        $data['trainer'] = $this->Trainer_model->get_by_user_id($this->session->userdata('user_id'));
        $this->load->view('trainers/profile', $data);
    }
}