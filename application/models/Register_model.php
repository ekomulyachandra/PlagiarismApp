<?php (defined('BASEPATH')) or exit('No direct script access allowed');


class Register_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $this->db->insert('users', $data);
    }
}
