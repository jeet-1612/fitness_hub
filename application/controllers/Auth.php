<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['form_validation','session']);
        $this->load->helper(['url','form','security']);
        $this->load->model('User_model');
    }

    // show login form / handle login post
    public function login()
    {
        // If already logged in, redirect
        if ($this->session->userdata('user_id')) {
            redirect('dashboard');
        }

        // set validation rules
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() === FALSE) {
            // load view
            $this->load->view('templates/header'); // optional if you use header/footer
            $this->load->view('auth/login');
            $this->load->view('templates/footer');
            return;
        }

        // process login
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);

        $user = $this->User_model->get_by_email($email);

        if (!$user) {
            $this->session->set_flashdata('error', 'Invalid email or password.');
            redirect('auth/login');
        }

        // verify password (assumes password hashed with password_hash)
        if (! password_verify($password, $user->password) ) {
            $this->session->set_flashdata('error', 'Invalid email or password.');
            redirect('auth/login');
        }

        // check status if you have (optional)
        // if ($user->status !== 'active') { ... }

        // set session
        $userdata = [
            'user_id'   => (int)$user->id,
            'role_id'   => (int)$user->role_id,
            'email'     => $user->email,
            'full_name' => $user->full_name,
            'logged_in' => TRUE
        ];
        $this->session->set_userdata($userdata);

        // redirect based on role (adjust role ids/names as your DB uses)
        if ($user->role_id == 1) {
            redirect('admin'); // admin controller
        } elseif ($user->role_id == 2) {
            redirect('trainers/dashboard');
        } else {
            redirect('members/dashboard');
        }
    }

    // logout
    public function logout()
    {
        $this->session->unset_userdata(['user_id','role_id','email','full_name','logged_in']);
        $this->session->sess_destroy();
        redirect('auth/login');
    }

    public function register(){
        // Already logged in?
        if ($this->session->userdata('user_id')) {
            redirect('dashboard');
        }

        $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('auth/register');
            $this->load->view('templates/footer');
            return;
        }

        // prepare data
        $data = [
            'full_name' => $this->input->post('full_name', true),
            'email'     => $this->input->post('email', true),
            'password'  => $this->input->post('password', true),
            'role_id'   => 3 // 3 = member by default
        ];

        $user_id = $this->User_model->create($data);

        if ($user_id) {
            $this->session->set_flashdata('success', 'Registration successful! You can now login.');
            redirect('auth/login');
        } else {
            $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
            redirect('auth/register');
        }
    }


}
