<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //Halaman Main Page
    public function index()
    {

        //Load model register
        $this->load->model('Register_model', 'register');

        //validasi input untuk register
        $name       =   $this->input->post('name');
        $email      =   $this->input->post('email');


        //Check input
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|max_length[32]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        if ($this->form_validation->run() == FALSE) {
            $data = array('title' => 'Register ');
            $this->load->view('register/index', $data, FALSE);
        } else {
            //Memasukkan data inputan form ke dalam array
            $data = [
                'name' => $name,
                'email' => $email,
                'password' => sha1($this->input->post('password1')),
                'role_id' => 2,
                'create_date' => time()
            ];
            $this->register->insert($data);
            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">
            An account is already registered,Please login!
            </div>');
            redirect('login/index');
        }
    }
}
