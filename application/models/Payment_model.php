<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends CI_Model {

    protected $table = 'payments';

    public function __construct()
    {
        parent::__construct();
    }

    // get all payments
    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    // get payment by id
    public function get_by_id($id)
    {
        return $this->db->where('id', $id)->get($this->table)->row();
    }

    // create payment
    public function create($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    // update payment
    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    // delete payment
    public function delete($id)
    {
        return $this->db->where('id', $id)->delete($this->table);
    }
    
    // get total revenue
    public function get_total_revenue()
    {
        $result = $this->db->select('SUM(amount) as total')
                          ->where('payment_status', 'completed')
                          ->get($this->table)->row();
        return $result ? $result->total : 0;
    }
    
    // get monthly revenue
    public function get_monthly_revenue($year, $month)
    {
        $result = $this->db->select('SUM(amount) as total')
                          ->where('payment_status', 'completed')
                          ->where('YEAR(payment_date)', $year)
                          ->where('MONTH(payment_date)', $month)
                          ->get($this->table)->row();
        return $result ? $result->total : 0;
    }
}