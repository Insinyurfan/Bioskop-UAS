<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiket extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Tiket_model');
        $this->load->helper('url');
    }

    public function index() {
        $this->load->view('form_pemesanan');
    }

    public function pesan() {
        $data = array(
            'nama' => $this->input->post('nama'),
            'judul_film' => $this->input->post('judul_film'),
            'jumlah' => $this->input->post('jumlah'),
            'tanggal' => $this->input->post('tanggal'),
            'jam' => $this->input->post('jam'),
            'studio' => $this->input->post('studio'),
            'kursi' => implode(',', $this->input->post('kursi'))



        );

        $insert_id = $this->Tiket_model->simpan($data);
        $data['id'] = $insert_id;

        $this->load->view('hasil_pemesanan', $data);
    }

    public function cetak_struk($id) {
        $data['tiket'] = $this->Tiket_model->get_by_id($id);
        $this->load->view('struk', $data);
    }
}
