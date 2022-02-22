<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    //Fungsi untuk login 
    public function login($email, $password)
    {
        $this->db->select('*');
        $this->db->from('users');

        //where
        $this->db->where(array(
            'email'  =>  $email,
            'password'  =>  sha1($password)
        ));
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->row();
    }

    //Ambil data user 
    public function getAllUser()
    {
        $this->db->select('*,users.id as id');
        $this->db->from('users');
        $this->db->join('role', 'role.id = users.role_id');
        $this->db->order_by('users.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //Ambil detail data user 
    public function detail($id)
    {
        $this->db->select('*,users.id as id');
        $this->db->from('users');
        $this->db->where('users.id', $id);
        $this->db->join('role', 'role.id = users.role_id');
        $this->db->order_by('users.id', 'desc');
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

    //Hapus data user
    public function delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('users', $data);
    }

    //Ambil role
    public function getRole()
    {
        $this->db->select('*');
        $this->db->from('role');
        $query = $this->db->get();
        return $query->result();
    }

    //Tambah data user
    public function add($data)
    {
        $this->db->insert('users', $data);
    }

    //Edit data user
    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('users', $data);
    }
}
