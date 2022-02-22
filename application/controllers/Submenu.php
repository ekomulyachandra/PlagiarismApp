<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submenu extends CI_Controller
{
    //Load model
    public function __construct()
    {
        parent::__construct();
        //load model user
        $this->load->model('submenu_model');
        $this->my_login->check_login();
    }

    //Data SubMenu
    public function index()
    {
        $submenu   = $this->submenu_model->getAllSubMenu();
        $total     = $this->submenu_model->countSubMenu();
        $menu      = $this->submenu_model->getMenu();

        //Validasi input 
        $valid  = $this->form_validation;
        //Check submenu
        $valid->set_rules(
            'sub_menu',
            'Sub Menu',
            'required',
            array('required'    => '$s must be filled')
        );
        //Check icon submenu
        $valid->set_rules(
            'icon',
            'Icon',
            'required',
            array('required'    => '$s must be filled')
        );
        //Check url
        $valid->set_rules(
            'url',
            'Url',
            'required',
            array('required'    => '$s must be filled')
        );
        //Jika sudah dicek, dan error
        if ($valid->run() == FALSE) {
            //End validasi 
            $data   = array(
                'title'     =>  'Data Sub Menu (' . $total->total . ')',
                'submenu'   =>  $submenu,
                'menu'      =>  $menu,
                'content'   =>  'submenu/index'
            );
            $this->load->view('layout/wrapper', $data, False);
            //Jika validasi oke, maka masuk database
        } else {
            $inp    = $this->input;
            $data   = array(
                'menu_id'     => $inp->post('menu'),
                'sub_menu'    => $inp->post('sub_menu'),
                'url'         => $inp->post('url'),
                'icon'        => $inp->post('icon')
            );
            //proses oleh model
            $this->submenu_model->add($data);
            //Notifikas dan redirect 
            $this->session->set_flashdata('flash', 'data has been add');
            redirect(base_url('submenu'), 'refresh');
        }
    }

    //Edit data submenu
    public function edit($id)
    {
        $submenu   = $this->submenu_model->detail($id);
        $total     = $this->submenu_model->countSubMenu();
        $menu      = $this->submenu_model->getMenu();

        //Validasi input 
        $valid  = $this->form_validation;
        //Check submenu
        $valid->set_rules(
            'sub_menu',
            'Sub Menu',
            'required',
            array('required'    => '$s must be filled')
        );
        //Check icon submenu
        $valid->set_rules(
            'icon',
            'Icon',
            'required',
            array('required'    => '$s must be filled')
        );
        //Check url
        $valid->set_rules(
            'url',
            'Url',
            'required',
            array('required'    => '$s must be filled')
        );
        //Jika sudah dicek, dan error
        if ($valid->run() == FALSE) {
            //End validasi 
            $data   = array(
                'title'     =>  'Edit data Sub Menu ',
                'submenu'   =>  $submenu,
                'menu'      =>  $menu,
                'content'   =>  'submenu/edit'
            );
            $this->load->view('layout/wrapper', $data, False);
            //Jika validasi oke, maka masuk database
        } else {
            $inp    = $this->input;
            $data   = array(
                'id'          => $id,
                'menu_id'     => $inp->post('menu'),
                'sub_menu'    => $inp->post('sub_menu'),
                'url'         => $inp->post('url'),
                'icon'        => $inp->post('icon')
            );
            //proses oleh model
            $this->submenu_model->edit($data);
            //Notifikas dan redirect 
            $this->session->set_flashdata('flash', 'data has been add');
            redirect(base_url('submenu'), 'refresh');
        }
    }

    //Hapus user
    public function delete($id)
    {
        $data   = array('id'   => $id);
        //proses hapus
        $this->submenu_model->delete($data);
        //Notifikas dan redirect
        $this->session->set_flashdata('flash', 'data has been delete');
        redirect(base_url('submenu'), 'refresh');
    }
}
