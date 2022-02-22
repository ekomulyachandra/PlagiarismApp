<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Sastrawi\Stemmer\StemmerFactory;

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //cek login
        $this->my_login->check_login();
        $this->load->model("dashboard_model");
    }

    //Halaman Main Page
    public function index()
    {
        $teks           = "ABCD";
        $pre1           = $this->rabinkarp->preprocess($teks);
        $teks1Gram      = $this->rabinkarp->kGram($pre1, 2);
        $teks1Hash      = $this->rabinkarp->hash($teks1Gram);
        $users     = $this->dashboard_model->countUser();
        $roleID    = $this->session->userdata['role_id'];
        if ($roleID == 1) {
            $history   = $this->dashboard_model->countAllHistory();
            $journals  = $this->dashboard_model->countAllJournal();
        } else {
            $history   = $this->dashboard_model->countHistory();
            $journals  = $this->dashboard_model->countJournal();
        }
        $data = array(
            'title'   => 'Dashboard',
            'journals' => $journals->total,
            'history'  => $history->total,
            'users'   => $users->total,
            'content' => 'dashboard/index'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}
