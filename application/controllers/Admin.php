<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model(['User_model', 'Member_model', 'Payment_model']);
        $this->load->library('session');
        // check admin login
        if (!$this->session->userdata('user_id') || $this->session->userdata('role_id') != 1) {
            redirect('auth/login');
        }
    }

    public function index(){
        redirect('admin/dashboard');
    }
    
    public function dashboard(){
        $data['title'] = 'Admin Dashboard';
        $data['total_members'] = $this->Member_model->count_all();
        $data['active_members'] = $this->Member_model->count_active();
        $data['total_revenue'] = $this->Payment_model->get_total_revenue();
        $data['recent_members'] = $this->Member_model->get_recent(5);
        
        $this->load->view('dashboard/admin_dashboard', $data);
    }
}