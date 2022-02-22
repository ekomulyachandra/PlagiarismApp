<?php (defined('BASEPATH')) or exit('No direct script access allowed');


class Plagiarism_journal_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    //fungsi untuk mengambil data journal sesuai user login
    public function getJournalUser()
    {
        $this->db->select('*');
        $this->db->from('journal');
        $this->db->where('create_by', $this->session->userdata('email'));
        $query = $this->db->get();
        return $query->result();
    }

    //fungsi untuk mengambil semua data user
    public function getAllJournal()
    {
        $this->db->select('*');
        $this->db->from('journal');
        $this->db->where('create_by != ', $this->session->userdata('email'));
        $query = $this->db->get();
        return $query->result();
    }

    //fungsi untuk mengambil data journal sesuai user login
    public function getJournalUser2($searchTerm = "")
    {
        $this->db->select('*');
        $this->db->from('journal');
        $this->db->where('create_by', $this->session->userdata('email'));
        $this->db->where("title like '%" . $searchTerm . "%'");
        $fetched_records = $this->db->get('journal');
        $dataJournal    = $fetched_records->result_array();

        $data = array();
        foreach ($dataJournal as $j) {
            $data[] = array("id" => $j['id'], "title" => $j['title']);
        }
        return $data;
    }

    //fungsi untuk mengambil content jurnal 
    public function getDetailJournal($id)
    {
        $this->db->select("*");
        $this->db->from('journal');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    //fungsi untuk mengambil title jurnal
    public function getTitleJournal($id)
    {
        $this->db->select('title');
        $this->db->from('journal');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }
}
