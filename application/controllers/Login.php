<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    //Halaman login administrator
    public function index()
    {
        //validasi input untuk login 
        $email      =   $this->input->post('email');
        $password   =   $this->input->post('password');

        //Check input
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required',
            array('required' => '%s harus diisi')
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required',
            array('required' => '%s harus diisi')
        );

        //Proses ke library My_Login
        if ($this->form_validation->run()) {
            $this->my_login->login($email, $password);
        }
        $data = array('title' => 'Login ');
        $this->load->view('login/index', $data, FALSE);
    }

    public function logout()
    {
        //Memanggil fungsi logout pada library My_login
        $this->my_login->logout();
    }
}
