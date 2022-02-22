<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    //Load model
    public function __construct()
    {
        parent::__construct();
        //load model menu
        $this->load->model('menu_model');
        $this->my_login->check_login();
    }

    //Data menu
    public function index()
    {
        $menu   = $this->menu_model->getAllMenu();
        $total  = $this->menu_model->countMenu();

        //Validasi input 
        $valid  = $this->form_validation;
        //Check nama menu
        $valid->set_rules(
            'menu',
            'Menu',
            'required',
            array('required'    => '$s must be filled')
        );
        //Check icon menu
        $valid->set_rules(
            'icon',
            'Icon',
            'required',
            array('required'    => '$s must be filled')
        );
        //Jika sudah dicek, dan error
        if ($valid->run() == FALSE) {
            //End validasi 
            $data   = array(
                'title'     =>  'Data Menu (' . $total->total . ')',
                'menu'      =>  $menu,
                'content'   =>  'menu/index'
            );
            $this->load->view('layout/wrapper', $data, False);
            //Jika validasi oke, maka masuk database
        } else {
            $inp    = $this->input;
            $data   = array(
                'menu'         => $inp->post('menu'),
                'icon'        => $inp->post('icon')
            );
            $menu = $inp->post('menu');
            //proses oleh model
            $this->menu_model->add($data);
            //Notifikas dan redirect 
            $this->session->set_flashdata('flash', 'data has been add');
            redirect(base_url('menu'), 'refresh');
        }
    }

    //Edit data user
    public function edit($id)
    {
        //Panggil data user yang akan diedit
        $menu   = $this->menu_model->detail($id);
        $total  = $this->menu_model->countMenu();
        //Validasi input 
        $valid  = $this->form_validation;
        //Check nama menu
        $valid->set_rules(
            'menu',
            'Menu',
            'required',
            array('required'    => '$s must be filled')
        );
        //Check icon menu
        $valid->set_rules(
            'icon',
            'Icon',
            'required',
            array('required'    => '$s must be filled')
        );
        //Jika sudah dicek, dan error
        if ($valid->run() == FALSE) {
            //End validasi 
            $data   = array(
                'title'     =>  'Data Menu (' . $total->total . ')',
                'menu'      =>  $menu,
                'content'   =>  'menu/edit'
            );
            $this->load->view('layout/wrapper', $data, False);
            //Jika validasi oke, maka masuk database
        } else {
            $inp    = $this->input;
            $data   = array(
                'id'          => $id,
                'menu'        => $inp->post('menu'),
                'icon'        => $inp->post('icon')
            );
            $menu = $inp->post('menu');
            //proses oleh model
            $this->menu_model->edit($data);
            //Notifikas dan redirect 
            $this->session->set_flashdata('flash', 'data has been add');
            redirect(base_url('menu'), 'refresh');
        }
    }

    //Hapus menu
    public function delete($id)
    {
        $data   = array('id'   => $id);
        //proses hapus
        $this->menu_model->delete($data);
        //Notifikas dan redirect
        $this->session->set_flashdata('flash', 'data has been delete');
        $this->session->set_flashdata('icon', 'error');
        redirect(base_url('menu'), 'refresh');
    }


    //Function untuk mengolah hak akses menu
    public function access($id)
    {
        $data   = array('id'   => $id);
        //Panggil data hak akses menu
        $AccessMenu     = $this->menu_model->showAccess($data);
        $menu           = $this->menu_model->detail($id);
        $role           = $this->menu_model->getAllRole();
        $data   = array(
            'title'      =>  'Access Menu ' . $menu->menu,
            'AccessMenu' =>  $AccessMenu,
            'roles'      => $role,
            'menu_id'    => $id,
            'content'    =>  'menu/access'
        );
        $this->load->view('layout/wrapper', $data, False);
        //Jika validasi oke, maka masuk database
    }

    //Function untuk menambah dan menghapus hak akses 
    public function changeaccess()
    {
        $menu_id    = $this->input->post('menuId');
        $role_id    = $this->input->post('roleId');

        $data = [
            'id_role' => $role_id,
            'id_menu' => $menu_id
        ];

        $result = $this->menu_model->getDetailAccess($data);

        if ($result->num_rows() < 1) {
            $this->menu_model->addAccess($data);
        } else {
            $this->menu_model->deleteAccess($data);
        }
    }
}
