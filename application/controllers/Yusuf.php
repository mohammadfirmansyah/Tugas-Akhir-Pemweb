<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Yusuf extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Rian"); //load model Rian
    }

    //method pertama yang akan di eksekusi
    public function index()
    {

        $data["title"] = "Daftar Tiket Kereta Api";
        //ambil fungsi getAllTiket untuk menampilkan semua data tiket
        $data["data_tiket"] = $this->Rian->getAllTiket();
        //ambil fungsi getAll untuk menampilkan semua data pesanan
        $data["data_pesanan"] = $this->Rian->getAll();
        //load view header.php pada folder views/templates
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        //load view index.php pada folder views/tiket
        $this->load->view('Rahman/index', $data);
        $this->load->view('templates/footer');
    }

    //method add digunakan untuk menampilkan form tambah pesanan tiket
    public function add()
    {
        $Yusuf = $this->Rian; //objek model
        $validation = $this->form_validation; //objek form validation
        $validation->set_rules($Yusuf->rules()); //menerapkan rules validasi pada Rian
        //kondisi jika semua kolom telah divalidasi, maka akan menjalankan method save pada Rian
        if ($validation->run()) {
            $Yusuf->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Tiket berhasil disimpan. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("yusuf");
        }
        $data["title"] = "Tambah Pesanan Tiket Kereta";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('Rahman/add', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('yusuf');

        $Yusuf = $this->Rian;
        $validation = $this->form_validation;
        $validation->set_rules($Yusuf->rules());

        if ($validation->run()) {
            $Yusuf->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Tiket berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("yusuf");
        }
        $data["title"] = "Ubah Pesanan Tiket";
        $data["data_pesanan"] = $Yusuf->getById($id);
        if (!$data["data_pesanan"]) show_404();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('Rahman/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();
        $Yusuf = $this->Rian;
        $Yusuf->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Tiket berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
        redirect("yusuf");
    }
}