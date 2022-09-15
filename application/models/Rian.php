<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rian extends CI_Model
{
    private $table = 'datapembeli';
    private $daftar = 'datatiket';

    //validasi form, method ini akan mengembailkan data berupa rules validasi form       
    public function rules()
    {
        return [
            [
                'field' => 'nama',  //samakan dengan atribute name pada tags input
                'label' => 'nama',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'nik',
                'label' => 'nik',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'alamat',
                'label' => 'alamat',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'noHP',
                'label' => 'noHP',
                'rules' => 'trim|required|numeric|min_length[9]|max_length[15]'
            ],
            [
                'field' => 'email',
                'label' => 'email',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'stasAsal',
                'label' => 'stasAsal',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'stasTujuan',
                'label' => 'stasTujuan',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'JadwalPesanan',
                'label' => 'JadwalPesanan',
                'rules' => 'trim|required'
            ]
        ];
    }

    //menampilkan data pesanan berdasarkan id pemesan
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["idBooking" => $id])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from datapembeli where idBooking='$id'
    }

    //menampilkan semua data pesanan
    public function getAll()
    {
        $this->db->from($this->table);
        $this->db->order_by("idBooking", "desc");
        $query = $this->db->get();
        return $query->result();
        //fungsi diatas seperti halnya query 
        //select * from datapembeli order by idBooking desc
    }

        //menampilkan semua data tiket
        public function getAllTiket()
        {
            $this->db->from($this->daftar);
            $this->db->order_by("noTiket", "desc");
            $query = $this->db->get();
            return $query->result();
            //fungsi diatas seperti halnya query 
            //select * from datatiket order by noTiket desc
        }

    //menyimpan data pesanan
    public function save()
    {
        $data = array(
            "nama" => $this->input->post('nama'),
            "nik" => $this->input->post('nik'),
            "noHP" => $this->input->post('noHP'),
            "email" => $this->input->post('email'),
            "alamat" => $this->input->post('alamat'),
            "stasAsal" => $this->input->post('stasAsal'),
            "stasTujuan" => $this->input->post('stasTujuan'),
            "JadwalPesanan" => $this->input->post('JadwalPesanan')
        );
        return $this->db->insert($this->table, $data);
    }

    //edit data pesanan
    public function update()
    {
        $data = array(
            "nama" => $this->input->post('nama'),
            "nik" => $this->input->post('nik'),
            "noHP" => $this->input->post('noHP'),
            "email" => $this->input->post('email'),
            "alamat" => $this->input->post('alamat'),
            "stasAsal" => $this->input->post('stasAsal'),
            "stasTujuan" => $this->input->post('stasTujuan'),
            "JadwalPesanan" => $this->input->post('JadwalPesanan')
        );
        return $this->db->update($this->table, $data, array('idBooking' => $this->input->post('idBooking')));
    }

    //hapus data pesanan
    public function delete($id)
    {
        return $this->db->delete($this->table, array("idBooking" => $id));
    }
}