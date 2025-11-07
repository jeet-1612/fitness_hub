<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		// If user is logged in, redirect to appropriate dashboard
		if ($this->session->userdata('user_id')) {
			$role_id = $this->session->userdata('role_id');
			if ($role_id == 1) {
				redirect('admin/dashboard');
			} elseif ($role_id == 2) {
				redirect('trainers/dashboard');
			} else {
				redirect('members/dashboard');
			}
		}
		
		// Show homepage for non-logged in users
		$this->load->view('home');
	}
}
