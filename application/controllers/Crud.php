<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('crud_model');
    }

    public function dlt_user()
    {
        // Ambil ID User

        $id = $this->input->get('user');
        $admin = $this->input->get('admin');

        //cek apakah ada usernya di DBase

        $check = $this->db->get_where('tbl_user_qr', ['id-user' => $id]);

        if ($check->num_rows() > 0) {
            $data = [
                'upddate' => date('Y m f'),
                'usrupd' => $admin,
                'active' => 0
            ];
            $this->db->update('tbl_user_qr', $data, ['id_user' => $id]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User Telah Di NonAktifkan</div>');
            redirect('dam');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User Tidak Ditemukan</div>');
            redirect('dam');
        }
    }

    public function dlt_order()
    {
        // Ambil ID User

        $key = $this->input->get('key');
        $admin = $this->input->get('admin');

        //cek apakah ada ordernya di DBase

        $check = $this->db->get_where('tbl_orderan', ['sell_key' => $key]);

        if ($check->num_rows() > 0) {
            $data = [
                'status' => 5,
                'id_upd_user' => $admin,
            ];
            $this->db->update('tbl_orderan', $data, ['sell_key' => $key]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Order Telah Di NonAktifkan</div>');
            redirect('dam/orderlist');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Order Tidak Ditemukan</div>');
            redirect('dam/orderlist');
        }
    }

    public function upd_profile()
    {
        // Ambil Isi Field 
        $id = $this->input->post('id'); // Id
        $nama = $this->input->post('name'); // Username
        $email = $this->input->post('email'); // Email
        $phone = $this->input->post('phone'); // Phone Number
        $alamat = $this->input->post('address'); // Alamat
        $rt = $this->input->post('rt');
        $rw = $this->input->post('rw');
        $pos = $this->input->post('pos');
        $prov = $this->input->post('prov');
        $kota = $this->input->post('kota');
        $camat = $this->input->post('camat');
        //$photo = $this->input->post('photo'); // Photo

        //Konfigurasi Photo
        // $config = [
        //     'upload_path' => './assets/img_user/',
        //     'allowed_types' => 'jpg|png',
        //     'filename' => substr($id, 3) . rand(100, 999),
        //     'overwrite' => true,
        //     'max_size' => '2048' // 2 MB
        // ];
        // $this->load->library('upload', $config); // load plugin upload\

        $data = [
            'username' => $nama,
            'email' => $email,
            'phone' => $phone,
            'upddate' => date('Y m f'),
            'usrupd' => $id,
        ];

        $this->db->update('tbl_user_qr', $data, ['id' => $id]);

        $data = [];

        $this->db->insert('tbl_alamat_usr', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Profile Telah Di Update</div>');
        redirect('dus');
    }
}
