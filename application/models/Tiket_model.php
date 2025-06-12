<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiket_model extends CI_Model {

    public function __construct() {
        parent::__construct(); // INI PENTING agar $this->db dikenali
    }

    public function simpan($data) {
        $this->db->insert('tiket', $data);
        return $this->db->insert_id();
    }


    public function get_by_id($id) {
        return $this->db->get_where('tiket', array('id' => $id))->row_array();
    }

}
