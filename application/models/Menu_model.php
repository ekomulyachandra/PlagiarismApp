<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    //Ambil data menu
    public function getAllMenu()
    {
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //Ambil detail data menu
    public function detail($id)
    {
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    //Hitung total menu
    public function countMenu()
    {
        $this->db->select('count(*) as total');
        $this->db->from('menu');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    //Hapus data menu
    public function delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('menu', $data);
    }


    //Tambah data user
    public function add($data)
    {
        $this->db->insert('menu', $data);
    }

    //Edit data user
    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('menu', $data);
    }

    //Mengambil data hak akses menu
    public function showAccess($data)
    {
        $this->db->select('*');
        $this->db->from('access_menu');
        $this->db->where('access_menu.id_menu', $data['id']);
        $this->db->join('menu', 'access_menu.id_menu = menu.id');
        $this->db->join('role', 'access_menu.id_role = role.id');
        $query = $this->db->get();
        return $query->result();
    }

    //Fungsi untuk mengambil semua role yang ada
    public function getAllRole()
    {
        $this->db->select('*');
        $this->db->from('role');
        $query = $this->db->get();
        return $query->result();
    }


    //Tambah data akses menu
    public function addAccess($data)
    {

        $this->db->insert('access_menu', $data);
    }

    //Hapus data akses menu
    public function deleteAccess($data)
    {
        $this->db->delete('access_menu', $data);
    }

    //mengambil data akses menu
    public function getDetailAccess($data)
    {
        $this->db->where('id_menu', $data['id_menu']);
        $this->db->where('id_role', $data['id_role']);
        $result = $this->db->get('access_menu');
        return $result;
    }
}
