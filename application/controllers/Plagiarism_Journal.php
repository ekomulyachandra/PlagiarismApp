<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PlagiarismJournal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //cek login
        $this->my_login->check_login();
        $this->load->model('Plagiarism_journal_model');
    }

    //Halaman Main Page
    public function index()
    {
        $journaluser    = $this->Plagiarism_journal_model->getJournalUser();
        $journals       = $this->Plagiarism_journal_model->getAllJournal();
        $data = array(
            'journaluser'   =>  $journaluser,
            'journals'      =>  $journals,
            'title'         => 'Check Plagiarism Journal',
            'content'       => 'plagiarism_journal/index'
        );
        $this->load->view('layout/wrapper', $data, False);
        //Jika validasi oke, maka masuk database
    }

    public function process()
    {
        $id_journal1     = $this->input->post('journal1');
        $id_journal2     = $this->input->post('journal2');
        $id_journal3     = $this->input->post('journal3');
        if ($id_journal1 != "0" || $id_journal2 != "0" || $id_journal3 != "0") {
            $journal1        = $this->Plagiarism_journal_model->getDetailJournal($id_journal1);
            $journal2        = $this->Plagiarism_journal_model->getDetailJournal($id_journal2);
            $journal3        = $this->Plagiarism_journal_model->getDetailJournal($id_journal3);
            //Proses pengolahan journal 1
            $pre1           = $this->rabinkarp->preprocess($journal1->content);
            $teks1Gram      = $this->rabinkarp->kGram($pre1, 5);
            $teks1Hash      = $this->rabinkarp->hash($teks1Gram);
            //Proses pengecekkan dengan journal 2
            $pre2           = $this->rabinkarp->preprocess($journal2->content);
            $teks2Gram      = $this->rabinkarp->kGram($pre2, 5);
            $teks2Hash      = $this->rabinkarp->hash($teks2Gram);
            $fingerprint    = $this->rabinkarp->fingerprint($teks1Hash, $teks2Hash);
            $unique         = $this->rabinkarp->unique($fingerprint);
            $hasiluniq      = $this->rabinkarp->fingerprint($unique, $teks1Hash);
            $similarity     = $this->rabinkarp->similarityCoefficient(
                $hasiluniq,
                $teks1Hash,
                $teks2Hash
            );
            //Proses pengecekkan dengan journal 3
            $pre3           = $this->rabinkarp->preprocess($journal3->content);
            $teks3Gram      = $this->rabinkarp->kGram($pre3, 5);
            $teks3Hash      = $this->rabinkarp->hash($teks3Gram);
            $fingerprint2   = $this->rabinkarp->fingerprint($teks1Hash, $teks3Hash);
            $unique2        = $this->rabinkarp->unique($fingerprint2);
            $hasiluniq2     = $this->rabinkarp->fingerprint($unique2, $teks1Hash);
            $similarity2    = $this->rabinkarp->similarityCoefficient(
                $hasiluniq2,
                $teks1Hash,
                $teks3Hash
            );
            $data = array(
                'id_journal1'    => $id_journal1,
                'id_journal2'    => $id_journal2,
                'id_journal3'    => $id_journal3,
                'title'          => 'Check Plagiarism Journal',
                'title_journal1' => $journal1->title,
                'title_journal2' => $journal2->title,
                'title_journal3' => $journal3->title,
                'text1'         =>  $journal1->content,
                'text2'         =>  $journal2->content,
                'text3'         =>  $journal3->content,
                'pre1'          =>  $pre1,
                'pre2'          =>  $pre2,
                'pre3'          =>  $pre3,
                'teks1gram'     =>  $teks1Gram,
                'teks2gram'     =>  $teks2Gram,
                'teks3gram'     =>  $teks3Gram,
                'teks1hash'     =>  $teks1Hash,
                'teks2hash'     =>  $teks2Hash,
                'teks3hash'     =>  $teks3Hash,
                'fingerprint'   =>  $hasiluniq,
                'fingerprint2'  =>  $hasiluniq2,
                'similarity'    =>  $similarity,
                'similarity2'   =>  $similarity2,
                'content'        => 'plagiarism_journal/process'
            );
            $this->load->view('layout/wrapper', $data, False);
        } else {
            redirect(base_url('plagiarism_journal'), 'refresh');
        }
    }
}
