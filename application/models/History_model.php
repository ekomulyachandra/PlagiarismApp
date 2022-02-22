<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    //Ambil data history berdasarkan user login
    public function getHistory()
    {
        $this->db->select(
            'a.title as title1,b.title as title2 , 
        c.title as title3, history.similarity as similarity,
        history.similarity2 as similarity2, 
        history.create_date as create_date,
        history.id as id,
        a.author as author1 ,b.author as author2, c.author as author3'
        );
        $this->db->from('history ');
        $this->db->join('journal as a', 'a.id=history.id_journal1');
        $this->db->join('journal as b', 'b.id=history.id_journal2');
        $this->db->join('journal as c', 'c.id=history.id_journal3');
        $this->db->where('history.create_by', $this->session->userdata('email'));
        $this->db->order_by('history.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //Ambil data semua history yang ada pada sistem
    public function getAllHistory()
    {
        $this->db->select(
            'a.title as title1,b.title as title2 , 
           c.title as title3, history.similarity as similarity,
           history.similarity2 as similarity2, 
           history.create_date as create_date,
           a.author as author1 ,b.author as author2, c.author as author3'
        );
        $this->db->from('history');
        $this->db->join('journal as a', 'a.id=history.id_journal1');
        $this->db->join('journal as b', 'b.id=history.id_journal2');
        $this->db->join('journal as c', 'c.id=history.id_journal3');
        $this->db->order_by('history.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //fungsi untuk menyimpan data history
    public function addHistory($data)
    {
        $this->db->insert('history', $data);
    }

    //fungsi untuk mengahapus data history
    public function delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('history', $data);
    }
}
