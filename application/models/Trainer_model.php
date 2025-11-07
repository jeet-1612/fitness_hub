<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trainer_model extends CI_Model {

    protected $table = 'trainers';

    public function __construct()
    {
        parent::__construct();
    }

    // get all trainers
    public function get_all()
    {
        return $this->db->select('t.*, u.full_name, u.email')
                       ->from('trainers t')
                       ->join('users u', 'u.id = t.user_id')
                       ->get()->result();
    }

    // get trainer by id
    public function get_by_id($id)
    {
        return $this->db->where('id', $id)->get($this->table)->row();
    }
    
    // get trainer by user_id
    public function get_by_user_id($user_id)
    {
        return $this->db->select('t.*, u.full_name, u.email')
                       ->from('trainers t')
                       ->join('users u', 'u.id = t.user_id')
                       ->where('t.user_id', $user_id)
                       ->get()->row();
    }

    // create trainer
    public function create($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    // update trainer
    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    // delete trainer
    public function delete($id)
    {
        return $this->db->where('id', $id)->delete($this->table);
    }
}