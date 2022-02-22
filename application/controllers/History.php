<?php
defined('BASEPATH') or exit('No direct script access allowed');


class History extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //cek login
        $this->my_login->check_login();
        $this->load->model("history_model");
    }

    //Halaman Main Page
    public function index()
    {
        $roleID  = $this->session->userdata['role_id'];
        if ($roleID == 1) {
            $history = $this->history_model->getAllHistory();
        } else {
            $history = $this->history_model->getHistory();
        }

        $data = array(
            'title'   => 'History',
            'history' => $history,
            'content' => 'history/index'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    //fungsi untuk menyimpan history
    public function history()
    {
        $id_journal1   = $this->input->post('id_journal1');
        $id_journal2   = $this->input->post('id_journal2');
        $id_journal3   = $this->input->post('id_journal3');
        $similarity    = $this->input->post('similarity');
        $similarity2   = $this->input->post('similarity2');
        $create_by     = $this->input->post('create_by');

        $data = [
            'id_journal1' => $id_journal1,
            'id_journal2' => $id_journal2,
            'id_journal3' => $id_journal3,
            'similarity'  => $similarity,
            'similarity2' => $similarity2,
            'create_by'   => $create_by
        ];
        $this->history_model->addHistory($data);
    }

    //Hapus user
    public function delete($id)
    {
        $data   = array('id'   => $id);
        //proses hapus
        $this->history_model->delete($data);
        //Notifikas dan redirect
        $this->session->set_flashdata('icon', 'delete');
        $this->session->set_flashdata('title', 'Data Delete');
        $this->session->set_flashdata('text', 'data has been delete');
        redirect(base_url('history'), 'refresh');
    }
}
