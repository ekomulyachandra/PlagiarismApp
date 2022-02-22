<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    //Hitung total journal berdasarkan user login
    public function countJournal()
    {
        $this->db->select('count(*) as total');
        $this->db->from('journal');
        $this->db->where('create_by', $this->session->userdata['email']);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->row();
    }
    //Hitung total semua journal yang ada disistem
    public function countAllJournal()
    {
        $this->db->select('count(*) as total');
        $this->db->from('journal');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->row();
    }
    //Hitung total user
    public function countUser()
    {
        $this->db->select('count(*) as total');
        $this->db->from('users');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->row();
    }
    //Hitung total history yang ada pada sistem
    public function countAllHistory()
    {
        $this->db->select('count(*) as total');
        $this->db->from('history');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->row();
    }
    //Hitung total history berdasarkan user login
    public function countHistory()
    {
        $this->db->select('count(*) as total');
        $this->db->from('history');
        $this->db->where('create_by', $this->session->userdata['email']);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->row();
    }
}
