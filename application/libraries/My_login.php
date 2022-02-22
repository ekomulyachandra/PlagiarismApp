<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_login
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        //Load model user
        $this->CI->load->model('user_model');
    }


    //Fungsi untuk login 
    public function login($email, $password)
    {
        //Check username dan password ke model
        $check = $this->CI->user_model->login($email, $password);
        //Jika ada data check, maka login berhasil
        if ($check) {
            $id         =   $check->id;
            $nama       =   $check->name;
            $role_id    =   $check->role_id;
            $email      =   $check->email;
            //Proses create session untuk login
            $this->CI->session->set_userdata('id', $id);
            $this->CI->session->set_userdata('nama', $nama);
            $this->CI->session->set_userdata('role_id', $role_id);
            $this->CI->session->set_userdata('email', $email);
            //end proses create session untuk login 
            //redirect ke halaman dashboard
            $this->CI->session->set_flashdata('success', '
            you have successfully logged in');
            redirect(base_url('dashboard'));
        } else {
            //Jika data user gak ada , maka login lagi
            $this->CI->session->set_flashdata('failed', '
            Username or Password invalid');
            redirect(base_url('login'));
        }
    }

    //Fungsi cek login : untuk mengecek status login user 
    public function check_login()
    {
        if (
            $this->CI->session->userdata('email') == "" &&
            $this->CI->session->userdata('role_id') == ""
        ) {
            //kalau username atau role_id kosong maka login lagi 
            $this->CI->session->set_flashdata('warning', '
            your arent  login yet');
            redirect(base_url('login'));
        }
    }

    //Fungsi untuk logout 
    public function logout()
    {
        //Proses UNSET session untuk login
        $this->CI->session->unset_userdata('id');
        $this->CI->session->unset_userdata('nama');
        $this->CI->session->unset_userdata('role_id');
        $this->CI->session->unset_userdata('email');
        //end proses create session untuk login 
        //redirect ke halaman dashboard
        $this->CI->session->set_flashdata('success', '
         you have successfully logout');
        redirect(base_url('login'));
    }
}
