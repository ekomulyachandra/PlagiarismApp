<?php
defined('BASEPATH') or exit('No direct script access allowed');

use  Smalot\PdfParser\Parser;

require_once(APPPATH . 'libraries/Doc2txt.php');



class Journal extends CI_Controller
{
    //Load model
    public function __construct()
    {
        parent::__construct();
        $this->my_login->check_login();
        //load model journal
        $this->load->model('journal_model');
    }

    //Data journal
    public function index()
    {
        $journal    = $this->journal_model->getAllJournal();
        $total      = $this->journal_model->countJournal();
        $journaluser = $this->journal_model->getAllJournalUser();

        $data   = array(
            'title'         =>  'Data Journal (' . $total->total . ')',
            'journal'       =>   $journal,
            'journaluser'   =>   $journaluser,
            'content'       =>  'journal/index'
        );
        $this->load->view('layout/wrapper', $data, False);
        //Jika validasi oke, maka masuk database

    }

    //Upload journal

    public function upload()
    {
        $journal        = $this->journal_model->getAllJournal();
        $total          = $this->journal_model->countJournal();
        $journaluser    = $this->journal_model->getAllJournalUser();
        $filename       = $_FILES['journal']['name'];
        $user           = $this->session->userdata('email');
        if ($filename) {
            $new_name                       = time() . $_FILES['journal']['name'];
            $config['file_name']            = str_replace(' ', '', $new_name);
            $filename_new                   = str_replace(' ', '', $new_name);
            $config['upload_path']          =  './file/journals/';
            $config['allowed_types']        = 'doc|docx|pdf';
            $config['max_size']             = 50024; // 5MB
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('journal')) {
                $error  = $this->upload->display_errors();
                $data   = array(
                    'title'         =>  'Data Journal (' . $total->total . ')',
                    'journal'       =>   $journal,
                    'journaluser'   =>   $journaluser,
                    'content'       =>  'journal/index',
                    'error'         =>  $error
                );
                $this->load->view('layout/wrapper', $data, False);
                $this->session->set_flashdata('failed', 'Fail to upload file');
                //Jika validasi oke, maka masuk database
            } else {
                $extension      = pathinfo($_FILES["journal"]["name"], PATHINFO_EXTENSION);
                if ($extension == 'pdf') {
                    $parser = new Parser();
                    $pdf    = $parser->parseFile('./file/journals/' . $filename_new);
                    if ($pdf != "") {
                        $original_text = $pdf->getText();
                        if ($original_text != "") {
                            $text = nl2br($original_text); // Paragraphs and line break formatting
                            $text = $this->clean_ascii_characters($text); // Check special characters
                            $text = str_replace(array("<br /> <br /> <br />", "<br> <br> <br>"), "<br /> <br />", $text); // Optional
                            $text = addslashes($text); // Backslashes for single quotes     
                            $text = stripslashes($text);
                            $text = strip_tags($text);

                            /**********************************************/
                            /* Additional step to check formatting issues */
                            // There may be some PDF formatting issues. I'm trying to check if the words are:
                            // (a) Join. E.g., HelloWorld!Thereisnospacingbetweenwords
                            // (b) splitted. E.g., H e l l o W o r l d ! E x c e s s i v e s p a c i n g
                            $check_text = preg_split('/\s+/', $text, -1, PREG_SPLIT_NO_EMPTY);

                            $no_spacing_error = 0;
                            $excessive_spacing_error = 0;
                            foreach ($check_text as $word_key => $word) {
                                if (strlen($word) >= 30) { // 30 is a limit that I set for a word length, assuming that no word would be 30 length long
                                    $no_spacing_error++;
                                } else if (strlen($word) == 1) { // To check if the word is 1 word length
                                    if (preg_match('/^[A-Za-z]+$/', $word)) { // Only consider alphabetical words and ignore numbers.
                                        $excessive_spacing_error++;
                                    }
                                }
                            }
                            // Set the boundaries of errors you can accept
                            // E.g., we reject the change if there are 30 or more $no_spacing_error or 150 or more $excessive_spacing_error issues
                            if ($no_spacing_error >= 30 || $excessive_spacing_error >= 150) {
                            } else {
                            }
                            /* End of additional step */
                            /**************************/
                        } else {
                            echo "No text extracted from PDF.";
                        }
                    } else {
                        echo "parseFile fns failed. Not a PDF.";
                    }
                    $data   = array(
                        'title'     =>  'Process Upload Journal',
                        'content'   =>  'journal/upload',
                        'text'      =>  $text,
                        'filename'  =>  $filename_new,
                        'user'      =>  $user
                    );
                    $this->load->view('layout/wrapper', $data, False);
                    //Jika validasi oke, maka masuk database
                } else if ($extension == 'doc' || $extension == 'docx') {
                    $doc    = new Doc2txt('./file/journals/' . $filename_new);
                    $text   = $doc->convertToText();
                    $data   = array(
                        'title'     =>  'Process Upload Journal',
                        'content'   =>  'journal/upload',
                        'text'      =>  $text,
                        'user'      =>  $user,
                        'filename'  =>  $filename_new
                    );
                    $this->load->view('layout/wrapper', $data, False);
                    //Jika validasi oke, maka masuk database
                } else {
                    $data   = array(
                        'title'         =>  'Data Journal (' . $total->total . ')',
                        'journal'       =>   $journal,
                        'journaluser'   =>   $journaluser,
                        'content'       =>  'journal/index'
                    );
                    $this->load->view('layout/wrapper', $data, False);
                    //Jika validasi oke, maka masuk database
                    $this->session->set_flashdata('failed', 'Fail to upload file');
                }
            }
        } else {
            $data   = array(
                'title'         =>  'Data Journal (' . $total->total . ')',
                'journal'       =>   $journal,
                'journaluser'   =>   $journaluser,
                'content'       =>  'journal/index'
            );
            $this->load->view('layout/wrapper', $data, False);
            $this->session->set_flashdata('failed', 'Fail to upload file');
            //Jika validasi oke, maka masuk database
        }
    }


    //Hapus journal
    public function delete($id)
    {

        $data   = array('id'   => $id);
        //proses hapus
        $this->journal_model->delete($data);
        $filename = $this->journal_model->getfilename($data);
        $path = './file/journals/' . $filename;
        delete_files($path);
        //Notifikasi dan redirect 
        $this->session->set_flashdata('flash', 'data has been delete');
        redirect(base_url('journal'), 'refresh');
    }

    //Function simpan journal
    public function save()
    {
        $journal        = $this->journal_model->getAllJournal();
        $total          = $this->journal_model->countJournal();
        //Validasi input 
        $valid  = $this->form_validation;
        //Check title
        $valid->set_rules(
            'title',
            'Title',
            'required',
            array('required'    => '$s must be filled')
        );
        //Check author
        $valid->set_rules(
            'author',
            'Author',
            'required',
            array('required'    => '$s must be filled')
        );

        //Jika sudah dicek, dan error
        if ($valid->run() == FALSE) {
            //End validasi 
            $data   = array(
                'title'     =>  'Data Journal (' . $total->total . ')',
                'journal'   =>   $journal,
                'content'   =>  'journal/index'
            );
            $this->load->view('layout/wrapper', $data, False);
            //Jika validasi oke, maka masuk database
        } else {
            $inp    = $this->input;
            $data   = array(
                'title'         => $inp->post('title'),
                'author'        => $inp->post('author'),
                'filename'      => $inp->post('filename'),
                'content'       => $inp->post('content'),
                'create_by'     => $inp->post('user'),

            );
            $title = $inp->post('title');
            //proses oleh model
            $this->journal_model->add($data);
            //Notifikas dan redirect 
            $this->session->set_flashdata('flash', 'data has been add');
            redirect(base_url('journal'), 'refresh');
        }
    }

    //function untuk cancel upload journal
    public function cancel()
    {
        $inp            = $this->input;
        $filename       = $inp->post('filename');

        $path = './file/journals/' . $filename;
        delete_files($path);
        redirect(base_url('journal'), 'refresh');
    }

    // Common function
    function clean_ascii_characters($string)
    {
        $string = str_replace(array('-', '–'), '-', $string);
        $string = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $string);
        return $string;
    }
}
