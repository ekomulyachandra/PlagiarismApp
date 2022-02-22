<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submenu_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    //Ambil data Sub menu
    public function getAllSubMenu()
    {
        $this->db->select('*,sub_menu.id as id, menu.icon as menu_icon, sub_menu.icon as icon');
        $this->db->from('sub_menu');
        $this->db->join('menu', 'menu.id = sub_menu.menu_id');
        $this->db->order_by('sub_menu.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }


    //Ambil menu
    public function getMenu()
    {
        $this->db->select('*');
        $this->db->from('menu');
        $query = $this->db->get();
        return $query->result();
    }

    //Ambil detail data Sub Menu 
    public function detail($id)
    {
        $this->db->select('*,sub_menu.id as id, menu.icon as menu_icon, sub_menu.icon as icon');
        $this->db->from('sub_menu');
        $this->db->where('sub_menu.id', $id);
        $this->db->join('menu', 'menu.id = sub_menu.menu_id');
        $query = $this->db->get();
        return $query->row();
    }

    //Hitung total Sub menu
    public function countSubMenu()
    {
        $this->db->select('count(*) as total');
        $this->db->from('sub_menu');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    //Hapus data Sub menu
    public function delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('sub_menu', $data);
    }


    //Tambah data Sub Menu
    public function add($data)
    {
        $this->db->insert('sub_menu', $data);
    }

    //Edit data Sub Menu
    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('sub_menu', $data);
    }
}
