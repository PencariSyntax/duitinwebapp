<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dus extends CI_Controller
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
            if ($level == 6) {
                return true;
            } else {
                redirect('auth/logout');
            }
        }
    }



    public function index()
    {

        $sesi = $this->session->userdata('phone');

        $data['title'] = 'DUITIN User Page';

        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();
        //echo 'Hello ' . $data['name']['username'];

        $this->load->view('templates/header', $data);
        $this->load->view('pages/dus', $data);
        $this->load->view('templates/footbar');
    }

    public function profile()
    {
        $sesi = $this->session->userdata('phone');
        $data['title'] = 'DUITIN App - My Profile';

        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();
        $data['prov'] = $this->db->get('m_ipropinsi')->result();
        $data['kota'] = $this->db->get('m_ikabkota')->result();
        $data['camat'] = $this->db->get('m_ikecamatan')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('pages/profile');
        $this->load->view('templates/footbar');
    }
    public function order_logs()
    {
        $sesi = $this->session->userdata('phone');
        $data['title'] = 'DUITIN App - Orders Logs';

        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('pages/order_log', $data);
        $this->load->view('templates/footbar');
    }
    public function about()
    {
        $sesi = $this->session->userdata('phone');
        $data['title'] = 'DUITIN App - Orders Logs';

        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('pages/about_app', $data);
        $this->load->view('templates/footbar');
    }
    public function repair()
    {
        $sesi = $this->session->userdata('phone');

        //var_dump($this->session->userdata('level_id'));
        $data['title'] = "Sorry DUITIN App";

        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('pages/build', $data);
        $this->load->view('templates/footbar');
    }
    public function sellwastes()
    {
        $this->load->library('form_validation');
        if (empty($this->input->post('barang'))) {
            $this->form_validation->set_rules('barang[]', 'Barang', 'required|trim', [
                'required' => 'Maaf, Silahkan isi salah satu barang !'
            ]);
        }
        if (empty($this->input->post('jumlah'))) {
            $this->form_validation->set_rules('jumlah[]', 'Jumlah', 'required|trim', [
                'required' => 'Maaf, Silahkan isi salah Jumlah berat barang !'
            ]);
        }
        if (empty($this->input->post('total'))) {
            $this->form_validation->set_rules('total[]', 'Total', 'required|trim', [
                'required' => 'Maaf, Silahkan isi salah Total barang !'
            ]);
        }
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim', [
            'required' => 'Maaf, Keterangan Barang Harus Di Isi !'
        ]);

        if ($this->form_validation->run() == false) {
            $sesi = $this->session->userdata('phone');
            $data['title'] = "DUITIN Order Request";
            $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();
            $this->load->view('templates/header', $data);
            $this->load->view('pages/jualsampah', $data);
            $this->load->view('templates/footbar');
        } else {
            $id_penjual = $this->input->post('id'); // masuk ke tabel orderan
            $sellkey = $this->input->post('key'); // masuk ke tabel order detail & orderan
            $barang = $this->input->post('barang'); // masuk ke table order detail
            $jumlah = $this->input->post('jumlah'); // masuk ke table order detail
            $total = $this->input->post('total'); // masuk ke table order detail
            $ketBarang = $this->input->post('keterangan'); // masuk ke tabel orderan
            $alamat = $this->input->post('alamat');

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

            $total_semua_harga = 0;
            $total_harga = 0;
            for ($i = 0; $i < sizeof($total); $i++) {
                if ($total[$i] == '') {
                    $totalis = 0;
                } else {
                    $totalis = $total[$i];
                }
                $total_harga += $totalis;
            }
            $total_semua_harga = $total_harga;
            $data = array(
                'sell_key' => $sellkey,
                'id_user' => $id_penjual,
                'total_barang' => $total_semua_barang,
                'total_income' => $total_semua_harga,
                'ketbarang' => $ketBarang,
                'status' => 1,
                'crtdate' => date('Y-m-d'),
                'alamat' => $alamat
            );
            $this->db->insert('tbl_orderan', $data);
            $insert_id = $this->db->insert_id();

            //masukin kedetail
            for ($i = 0; $i < sizeof($total); $i++) {
                $data = array(
                    'sell_key' => $sellkey,
                    'id_barang' => $barang[$i],
                    'jml_berat' => $jumlah[$i],
                    'harga_barang' => $total[$i],
                );
                $this->db->insert('tbl_order_detail', $data);
            }
            $this->session->set_flashdata('success', 'Orderan anda telah kami simpan, kami akan segera menghubungi PICKER kami untuk mengambil barang anda.');
            redirect(base_url('dus/sellwastes'));
        }
    }

    private function _jualbarang()
    {
        // Get All Things
        $id_penjual = $this->input->post('id'); // masuk ke tabel orderan
        $sellkey = $this->input->post('key'); // masuk ke tabel order detail & orderan
        $barang = $this->input->post('barang'); // masuk ke table order detail
        $jumlah = $this->input->post('jumlah'); // masuk ke table order detail
        $total = $this->input->post('total'); // masuk ke table order detail
        $ketBarang = $this->input->post('keterangan'); // masuk ke tabel orderan
        if ($total) {
            $total_berat = 0;
            $total_harga = 0;
            for ($i = 0; $i < sizeof($jumlah); $i++) {
                $total_berat += $jumlah[$i];
            }
            for ($i = 0; $i < sizeof($total); $i++) {
                $total_harga += $total[$i];
            }
            for ($i = 0; $i < sizeof($total); $i++) {
                $data = array(
                    'id_order' => $sellkey,
                    'id_user' => $id_penjual,
                    'keterangan' => $ketBarang,
                    'total_barang' => $total_berat,
                    'total_harga' => $total_harga,
                    'status' => 1,
                    'crtdate' => date('Y-m-d')
                );
            }
        }
    }

    public function hargabarangsatu()
    {
        $jumlah = 0;
        $jumlah = $this->input->get('jumlah');
        $barangnya = $this->input->get('barangnya');

        $this->db->where('id_barang', $barangnya);
        $dataHarga = $this->db->get('tbl_barang');
        if ($dataHarga->num_rows() > 0) {
            $d = $dataHarga->row();
            $harga = $d->harga;
            $total = $harga * $jumlah;
            echo $total;
        } else {
            // $harga = 2000;
            // $total = $harga * $jumlah;
            // echo $total;
            echo "alert('Master Data Harga Barang Belum Di Update');";
            return FALSE;
        }
    }
    public function view_order()
    {
        $order = $this->uri->segment(3);

        $data['detail'] = $this->db->get_where('view_order_detail', ['sell_key' => $order])->result();
        $data['penjual'] = $this->db->get_where('tbl_orderan', ['sell_key' => $order])->row_array();

        $sesi = $this->session->userdata('phone');
        $data['title'] = "DUITIN Order Detail";
        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/ord_detail', $data);
        $this->load->view('templates/footbar');
    }
    public function report()
    {
        $sesi = $this->session->userdata('phone');

        //var_dump($this->session->userdata('level_id'));
        $data['title'] = "Report DUITIN App";

        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();


        $this->form_validation->set_rules('laporan', 'Laporan', 'required|trim', [
            'required' => 'Maaf Ini Wajib Di Isi !'
        ]);

        if ($this->form_validation->run() == false) {
            $data['danger'] = $this->db->get_where('bug_report', ['status' => 0])->result();
            $data['alert'] = $this->db->get_where('bug_report', ['status' => 0])->row_array();
            $this->load->view('templates/header', $data);
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
            redirect('dus/report');
        }
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
}
