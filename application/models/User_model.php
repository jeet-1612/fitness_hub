<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    protected $table = 'users';

    public function __construct()
    {
        parent::__construct();
    }

    // fetch user by email
    public function get_by_email($email)
    {
        return $this->db->where('email', $email)->get($this->table)->row();
    }

    // optional: create user (for seeding/register)
    public function create($data)
    {
        // $data should contain email, password (plain) etc.
        $insert = [
            'email' => $data['email'],
            'username' => isset($data['username']) ? $data['username'] : $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'role_id' => isset($data['role_id']) ? $data['role_id'] : 3,
            'full_name' => isset($data['full_name']) ? $data['full_name'] : null,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->db->insert($this->table, $insert);
        return $this->db->insert_id();
    }
    
    // update user
    public function update($id, $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        return $this->db->where('id', $id)->update($this->table, $data);
    }
}
