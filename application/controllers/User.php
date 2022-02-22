<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    //Load model
    public function __construct()
    {
        parent::__construct();
        //load model user
        $this->load->model('user_model');
        $this->my_login->check_login();
    }

    //Data user
    public function index()
    {
        $user   = $this->user_model->getAllUser();
        $total  = $this->user_model->countUser();
        $role   = $this->user_model->getRole();

        //Validasi input 
        $valid  = $this->form_validation;

        //Check nama
        $valid->set_rules(
            'name',
            'Name',
            'required',
            array('required'    => '$s must be filled')
        );

        //Check email
        $valid->set_rules(
            'email',
            'Email',
            'required|valid_email',
            array(
                'required'    => '$s must be filled',
                'valid_email' => '$s not valid,enter the correct username'
            )
        );

        //Check password
        $valid->set_rules(
            'password',
            'Password ',
            'required|min_length[6]|max_length[32]',
            array(
                'required'      => '$s must be filled',
                'min_length'    => '$s minimum 6 characters',
                'max_length'    => '$s maximum 32 characters'
            )
        );

        //Jika sudah dicek, dan error
        if ($valid->run() == FALSE) {
            //End validasi 
            $data   = array(
                'title'     =>  'Data User (' . $total->total . ')',
                'user'      =>  $user,
                'role'      =>  $role,
                'content'   =>  'user/index'
            );
            $this->load->view('layout/wrapper', $data, False);
            //Jika validasi oke, maka masuk database
        } else {
            $inp    = $this->input;
            $data   = array(
                'name'         => $inp->post('name'),
                'email'        => $inp->post('email'),
                'password'     => SHA1($inp->post('password')),
                'role_id'      => $inp->post('role')
            );
            $name = $inp->post('name');
            //proses oleh model
            $this->user_model->add($data);
            //Notifikas dan redirect 
            $this->session->set_flashdata('flash', 'data has been add');
            redirect(base_url('user'), 'refresh');
        }
    }

    //Edit data user
    public function edit($id)
    {
        //Panggil data user yang akan diedit
        $user   = $this->user_model->detail($id);
        $role   = $this->user_model->getRole();

        //Validasi input 
        $valid  = $this->form_validation;

        //Check nama
        $valid->set_rules(
            'name',
            'Name',
            'required',
            array('required'    => '$s must be filled')
        );

        //Check email
        $valid->set_rules(
            'email',
            'Email',
            'required|valid_email',
            array(
                'required'    => '$s must be filled',
                'valid_email' => '$s not valid,enter the correct username'
            )
        );

        //Jika sudah dicek, dan error
        if ($valid->run() == FALSE) {
            //End validasi 
            $data   = array(
                'title'     =>  'Edit data User (' . $user->name . ')',
                'user'      =>  $user,
                'role'      =>  $role,
                'content'   =>  'user/edit'
            );
            $this->load->view('layout/wrapper', $data, False);
            //Jika validasi oke, maka masuk database
        } else {
            $inp    = $this->input;
            //Check panjang password, jika password lebih dari 6 karakter maka password diganti
            //Jika password lebih dari 32 karakter password juga diganti
            if (strlen($inp->post('password')) >= 6 || strlen($inp->post('password')) <= 32) {
                $data   = array(
                    'id'           => $id,
                    'name'         => $inp->post('name'),
                    'email'        => $inp->post('email'),
                    'password'     => SHA1($inp->post('password')),
                    'role_id'      => $inp->post('role')
                );
            } else {
                $data   = array(
                    'id'           => $id,
                    'name'         => $inp->post('name'),
                    'email'        => $inp->post('email'),
                    'role_id'      => $inp->post('role')
                );
            }
            //proses oleh model
            $this->user_model->edit($data);
            //Notifikas dan redirect 
            $this->session->set_flashdata('flash', 'data has been edited');
            redirect(base_url('user'), 'refresh');
        }
    }

    //Hapus user
    public function delete($id)
    {
        $data   = array('id'   => $id);
        //proses hapus
        $this->user_model->delete($data);
        //Notifikas dan redirect
        $this->session->set_flashdata('flash', 'data has been delete');
        redirect(base_url('user'), 'refresh');
    }
}
