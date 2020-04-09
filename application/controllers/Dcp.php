<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dcp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        //session();
        if (!$this->session->has_userdata('phone')) {
            $this->session->set_flashdata('message', '
					<div class="alert alert-danger" role="alert"> Sorry, You must login firstly !</div>
				');
            redirect('auth');
        } else {
            $level = $this->session->userdata('level_id');
            if ($level == 7) {
                return true;
            } else {
                redirect('dam');
            }
        }
    }



    public function index()
    {

        $sesi = $this->session->userdata('phone');

        $data['title'] = 'DUITIN Team Page';

        $now = date('Y m d');

        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();
        $data['orderNow'] = $this->db->get_where('tbl_orderan', ['status' => 1, 'crtdate' => $now])->result();
        //echo 'Hello ' . $data['name']['username'];

        $this->load->view('templates/cp_header', $data);
        $this->load->view('team/index', $data);
        $this->load->view('templates/footbar');
    }

    public function wakaf_barang()
    {
        $sesi = $this->session->userdata('phone');

        $data['title'] = 'DUITIN App - Sell The Wastes';

        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();

        $this->load->view('templates/cp_header', $data);
        $this->load->view('team/wakaf_barang', $data);
        $this->load->view('templates/footbar');
    }
    public function data_wakaf()
    {
        $this->form_validation->set_rules('penginput', 'Penginput', 'required|trim', [
            'required' => 'Maaf, Isi terlebih dahulu Nama Penginput'
        ]);

        $this->form_validation->set_rules('barang[]', 'Barang', 'required|trim', [
            'required' => 'Maaf, Silahkan isi salah satu barang !'
        ]);

        $this->form_validation->set_rules('jumlah[]', 'Jumlah', 'required|trim', [
            'required' => 'Maaf, Silahkan isi salah Jumlah berat barang !'
        ]);

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim', [
            'required' => 'Maaf, Keterangan Barang Harus Di Isi !'
        ]);

        if ($this->form_validation->run() == false) {
            $sesi = $this->session->userdata('phone');
            $data['title'] = 'DUITIN App - My Profile';

            $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();

            $this->load->view('templates/cp_header', $data);
            $this->load->view('team/data_kumpulan_sampah');
            $this->load->view('templates/footbar');
        } else {
            $this->_tambahdata();
        }
    }
    private function _tambahdata()
    {
        $penginput = $this->input->post('penginput');
        $id_team = $this->input->post('id'); // masuk ke tabel orderan
        $sellkey = $this->input->post('key'); // masuk ke tabel order detail & orderan
        $barang = $this->input->post('barang'); // masuk ke table order detail
        $jumlah = $this->input->post('jumlah'); // masuk ke table order detail
        $ketBarang = $this->input->post('keterangan'); // masuk ke tabel orderan

        $tgl1 = date('Y-m-d'); // pendefinisian tanggal awal
        $expire = date('Y-m-d', strtotime('+1 months', strtotime($tgl1))); //operasi penjumlahan tanggal sebanyak 6 hari
        //masukin dulu ke orderan
        $total_semua_barang = 0;
        $total_barang = 0;
        for ($i = 0; $i < sizeof($jumlah); $i++) {
            if ($jumlah[$i] == '') {
                $jumlahis = 0;
            } else {
                $jumlahis = $jumlah[$i];
            }
            $total_barang += $jumlahis;
        }
        $total_semua_barang = $total_barang;
        // cek apakah barang pernah di input ?
        $pernah = $this->db->get_where('tbl_wakaf_team', ['id_team' => $id_team])->row_array();
        //var_dump($barang, $jumlah);
        if ($pernah['status'] == 1) {
            # Update Data
            // jumlah berapakali input
            $times = $this->db->select('input_times')
                ->from('tbl_wakaf_team')
                ->where('wakaf_key', $sellkey)
                ->get()->result_array();
            $times = $times[0]['input_times'] + 1;
            $data = array(
                'total_barang' => $total_semua_barang,
                'up_date' => date('Y-m-d'),
                'input_times' => $times
            );
            //var_dump($data);
            $this->db->update('tbl_wakaf_team', $data);
            $insert_id = $this->db->insert_id();
            for ($i = 0; $i < sizeof($barang); $i++) {
                $data = array(
                    'id' => '',
                    'wakaf_key' => $sellkey,
                    'penginput' => $penginput,
                    'jns_barang' => $barang[$i],
                    'berat' => $jumlah[$i],
                    'note' => $ketBarang,
                    'input_date' => now(),
                    'status' => 1
                );
                //var_dump($barang);
                $this->db->insert('tbl_wakaf_detail', $data, ['wakaf_key' => $sellkey]);
            }
        } else {
            # Masukan Data Baru
            $data = [
                'id' => '',
                'wakaf_key' => $sellkey,
                'id_team' => $id_team,
                'total_barang' => $total_semua_barang,
                'status' => 1,
                'start_date' => date('Y-m-d'),
                'up_date' => '',
                'input_times' => 1,
                'expire_date' => $expire
            ];
            $this->db->insert('tbl_wakaf_team');
            for ($i = 0; $i < sizeof($barang); $i++) {
                $data = array(
                    'id' => '',
                    'wakaf_key' => $sellkey,
                    'penginput' => $penginput,
                    'jns_barang' => $barang[$i],
                    'berat' => $jumlah[$i],
                    'note' => $ketBarang,
                    'input_date' => now(),
                    'status' => 1
                );
                //var_dump($barang);
                $this->db->insert('tbl_wakaf_detail', $data);
            }
        }
        //Masukan Data kedalam Tabel Detail
        $this->session->set_flashdata('success', 'Data berhasil disimpan!');
        redirect(base_url('dcp/data_wakaf'));
    }
    public function profile()
    {
        $sesi = $this->session->userdata('phone');
        $data['title'] = 'DUITIN App - My Profile';

        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();

        $this->load->view('templates/cp_header', $data);
        $this->load->view('pages/profile');
        $this->load->view('templates/footbar');
    }
    public function riwayat_wakaf()
    {
        $sesi = $this->session->userdata('phone');
        $data['title'] = 'DUITIN App - Orders Logs';

        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();

        $this->load->view('templates/cp_header', $data);
        $this->load->view('team/histori_team', $data);
        $this->load->view('templates/footbar');
    }
    public function about()
    {
        $sesi = $this->session->userdata('phone');
        $data['title'] = 'DUITIN App - Orders Logs';

        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();

        $this->load->view('templates/cp_header', $data);
        $this->load->view('pages/about_app', $data);
        $this->load->view('templates/footbar');
    }
    public function repair()
    {
        $sesi = $this->session->userdata('phone');

        //var_dump($this->session->userdata('level_id'));
        $data['title'] = "Sorry DUITIN App";

        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();

        $this->load->view('templates/cp_header', $data);
        $this->load->view('pages/build', $data);
        $this->load->view('templates/footbar');
    }
    public function resetpassword()
    {
        $id = $this->input->post('id');
        $oldpass = $this->input->post('oldpass');
        $newpass = $this->input->post('newpass');
        $confpass = $this->input->post('confpass');

        $user = $this->db->get_where('tbl_user_qr', ['id_prim' => $id])->row_array();


        if (password_verify($oldpass, $user['password'])) {
            if ($newpass == $confpass) {
                $fixpass = password_hash($newpass, PASSWORD_DEFAULT);
                $data = [
                    'password' => $fixpass,
                    'upddate' => time()
                ];
                $this->db->update('tbl_user_qr', $data, ['id_prim' => $id]);
                echo "<script>
                alert('Kata Sandi Telah Di Ganti !');
                document.location.href = 'profile';
            </script>";
            } else {
                echo "<script>
                alert('Konfirmasi Kata Sandi tidak sesuai dengan yang pertama !');
                document.location.href = 'profile';
            </script>";
            }
        } else {
            echo "<script>
                alert('Kata Sandi lama tidak sesuai !');
                document.location.href = 'profile';
            </script>";
        }
    }
    public function report()
    {
        $sesi = $this->session->userdata('phone');
        $data['bugs'] = $this->db->get_where('bug_report', ['jenis_report' => 1])->result();
        $data['def'] = $this->db->get_where('bug_report', ['jenis_report' => 2])->result();
        $data['usr'] = $this->db->get_where('bug_report', ['jenis_report' => 3])->result();
        $data['qna'] = $this->db->get_where('bug_report', ['jenis_report' => 4])->result();


        //var_dump($this->session->userdata('level_id'));
        $data['title'] = "Report DUITIN App";

        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();


        $this->form_validation->set_rules('laporan', 'Laporan', 'required|trim', [
            'required' => 'Maaf Ini Wajib Di Isi !'
        ]);

        if ($this->form_validation->run() == false) {
            $data['danger'] = $this->db->get_where('bug_report', ['status' => 0])->result();
            $data['alert'] = $this->db->get_where('bug_report', ['status' => 0])->row_array();
            $this->load->view('templates/cp_header', $data);
            $this->load->view('pages/report_bug', $data);
            $this->load->view('templates/footbar');
        } else {
            $id = $this->input->post('id');
            $nama = $this->input->post('name');
            $bentuk_masalah = $this->input->post('tipe');
            $laporan = $this->input->post('laporan');

            $data = [
                'id' => '',
                'id_user' => $id,
                'nama_user' => $nama,
                'jenis_report' => $bentuk_masalah,
                'pesan' => $laporan,
                'crtdate' => date('Y-m-d'),
                'status' => FALSE
            ];

            //var_dump($data);
            $this->db->insert('bug_report', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Terima Kasih Atas Masukan Anda.</div>');
            redirect('dpc/report');
        }
    }
}
