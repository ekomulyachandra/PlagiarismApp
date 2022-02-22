<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Journal_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    //Ambil data menu
    public function getAllJournal()
    {
        $this->db->select('*');
        $this->db->from('journal');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //Ambil data menu
    public function getAllJournalUser()
    {
        $this->db->select('*');
        $this->db->from('journal');
        $this->db->where('create_by', $this->session->userdata['email']);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //Ambil detail data journal
    public function detail($id)
    {
        $this->db->select('*');
        $this->db->from('journal');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    //Hitung total journal
    public function countJournal()
    {
        $this->db->select('count(*) as total');
        $this->db->from('journal');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    //Hapus data menu
    public function delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('journal', $data);
    }

    //Mengambil filename 
    public function getfilename($data)
    {
        $this->db->select('filename');
        $this->db->from('journal');
        $this->db->where('id', $data['id']);
        $query  = $this->db->get();
        return $query->row();
    }
    //Tambah data journal
    public function add($data)
    {
        $this->db->insert('journal', $data);
    }
}
