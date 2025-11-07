<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Member_model extends CI_Model
{
    protected $table = 'members';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function create($data){
        $this->db->insert('users', [
            'username' => $data['email'],
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'role_id' => 3, // member role
            'full_name' => $data['full_name'],
            'phone' => $data['phone']
        ]);

        $user_id = $this->db->insert_id();
        
        $this->db->insert('members', [
            'user_id'=>$user_id,
            'dob'=>$data['dob'],
            'gender'=>$data['gender'],
            'join_date'=>date('Y-m-d')
            ]);
        return $user_id;
    }

    public function get_all(){
        $this->db->select('members.*, users.email, users.full_name');
        $this->db->from('members');
        $this->db->join('users','users.id=members.user_id');
        return $this->db->get()->result();
    }
    
    public function get_by_id($id)
    {
        return $this->db->where('id', $id)->get($this->table)->row();
    }
    
    public function get_by_user_id($user_id)
    {
        return $this->db->where('user_id', $user_id)->get($this->table)->row();
    }
    
    public function count_all()
    {
        return $this->db->count_all($this->table);
    }
    
    public function count_active()
    {
        return $this->db->where('membership_end >=', date('Y-m-d'))->count_all_results($this->table);
    }
    
    public function get_recent($limit = 5)
    {
        $this->db->select('members.*, users.email, users.full_name');
        $this->db->from('members');
        $this->db->join('users','users.id=members.user_id');
        $this->db->order_by('members.created_at', 'DESC');
        $this->db->limit($limit);
        return $this->db->get()->result();
    }

}
