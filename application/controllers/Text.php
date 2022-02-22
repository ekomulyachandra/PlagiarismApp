<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Text extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //cek login
        $this->my_login->check_login();
    }

    //Halaman Main Page
    public function index()
    {
        $data = array(
            'title'   => 'Check Plagiarism Text',
            'content' => 'text/index'
        );
        $this->load->view('layout/wrapper', $data, False);
        //Jika validasi oke, maka masuk database
    }

    public function process()
    {
        $text1 = $this->input->post('text1');
        $text2 = $this->input->post('text2');
        $kgram = $this->input->post('kgram');

        //Validasi input 
        $valid  = $this->form_validation;
        //Check sentence 1
        $valid->set_rules(
            'text1',
            'Text 1',
            'required',
            array('required'    => '$s must be filled')
        );
        //Check sentence 2
        $valid->set_rules(
            'text2',
            'Text 2',
            'required',
            array('required'    => '$s must be filled')
        );
        //Check K-Gram
        $valid->set_rules(
            'kgram',
            'K Gram',
            'required',
            array('required'    => '$s must be filled')
        );
        //Jika sudah dicek, dan error
        if ($valid->run() == FALSE) {
            $data   = array(
                'title'     =>  'Check Plagiarism Text',
                'content'   =>  'text/index'
            );
            $this->load->view('layout/wrapper', $data, False);
            //Jika validasi oke, maka masuk database
        } else {
            $pre1           = $this->rabinkarp->preprocess($text1);
            $pre2           = $this->rabinkarp->preprocess($text2);
            $teks1Gram      = $this->rabinkarp->kGram($pre1, $kgram);
            $teks2Gram      = $this->rabinkarp->kGram($pre2, $kgram);
            $teks1Hash      = $this->rabinkarp->hash($teks1Gram);
            $teks2Hash      = $this->rabinkarp->hash($teks2Gram);
            $fingerprint    = $this->rabinkarp->fingerprint($teks1Hash, $teks2Hash);
            $similarity     = $this->rabinkarp->similarityCoefficient(
                $fingerprint,
                $teks1Hash,
                $teks2Hash
            );
            $data = array(
                'title'         => 'Check Plagiarism Text',
                'text1'         =>  $text1,
                'text2'         =>  $text2,
                'pre1'          =>  $pre1,
                'pre2'          =>  $pre2,
                'teks1gram'     =>  $teks1Gram,
                'teks2gram'     =>  $teks2Gram,
                'teks1hash'     =>  $teks1Hash,
                'teks2hash'     =>  $teks2Hash,
                'fingerprint'   =>  $fingerprint,
                'similarity'    =>  $similarity,
                'content'       => 'text/process'
            );
            $this->load->view('layout/wrapper', $data, False);
        } //Jika validasi oke, maka masuk database 
    }
}
