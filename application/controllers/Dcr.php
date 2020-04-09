<?php

use SebastianBergmann\Environment\Console;

defined('BASEPATH') or exit('No direct script access allowed');

class Dcr extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->library('qrcode/ciqrcode');
        $this->load->library('form_validation');
        if (!$this->session->has_userdata('phone')) {
            $this->session->set_flashdata('message', '
					<div class="alert alert-danger" role="alert"> Sorry, You must login firstly !</div>
				');
            redirect('auth');
        } else {
            $level = $this->session->userdata('level_id');
            if ($level != 4) {
                $this->session->set_flashdata('message', '
				<div class="alert alert-danger" role="alert"> Sorry, You must login firstly !</div>
				');
                redirect('auth/logout');
            }
        }
    }

    public function index()
    {

        $sesi = $this->session->userdata('phone');

        //var_dump($this->session->userdata('level_id'));
        $data['title'] = "Laman Pengurus DUITIN";

        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();
        // count data from tables
        $data['user'] = $this->db->get_where('tbl_user_qr', ['level_id' => 6])->result();
        $data['picker'] = $this->db->get_where('tbl_user_qr', ['level_id' => 5])->result();
        $data['dev'] = $this->db->get_where('tbl_user_qr', ['level_id' => 1])->result();
        $data['order'] = $this->db->get_where('tbl_orderan', ['status' => 1])->result();

        $this->load->view('templates/dcr_head', $data);
        $this->load->view('pages/dcr', $data);
        $this->load->view('templates/footbar');
    }

    public function register()
    {
        $sesi = $this->session->userdata('phone');

        //var_dump($this->session->userdata('level_id'));
        $data['title'] = "Laman Pendaftaran Akun DUITIN";

        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();
        ///////////////////////
        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'Maaf, Nama Lengkap Wajib Di Isi !'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Maaf, Nama Lengkap Wajib Di Isi !',
            'valid_email' => 'Maaf, Gunakan Format Email'
        ]);
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim|numeric', [
            'required' => 'Maaf, No Telephone Wajib Di Isi !'
        ]);
        $this->form_validation->set_rules('pass1', 'Password', 'required|trim|min_length[8]|matches[pass2]', [
            'matches' => 'Maaf, Password Anda Tidak Sama !',
            'required' => 'Maaf, Password Wajib Di Isi !',
            'min_length' => 'Maaf, Password Anda Terlalu Pendek ! (Min 8 Char)'
        ]);
        $this->form_validation->set_rules('pass2', 'Password', 'required|trim|matches[pass1]');
        $this->form_validation->set_rules('level', 'Level', 'required', [
            'required' => 'Maaf, Level User Wajib Di Atur !'
        ]);



        if ($this->form_validation->run() == false) {
            $data['order'] = $this->db->get_where('tbl_orderan', ['status' => 1])->result();
            $data['title'] = 'Register Page';
            $this->load->view('templates/dcr_head', $data);
            $this->load->view('pages/regs2');
            $this->load->view('templates/footbar');
        } else {
            $this->_regs();
        }
    }

    private function _regs()
    {
        //ambil data dari form register
        $username = $this->input->post('name');
        $email = $this->input->post('email');
        $no_ponsel = $this->input->post('phone');
        $password = password_hash($this->input->post('pass1'), PASSWORD_DEFAULT); // password terenkripsi
        $level = $this->input->post('level');
        //generate qrcode user
        $id_user = "022" . "0" . $level . rand(1000, 9999);
        $qr_link = "https://duitindonesia.id/auth/link/" . $id_user;
        ///////////////////////////////////////////////
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = 'assets/'; //string, the default is application/cache/
        $config['errorlog']     = 'assets/'; //string, the default is application/logs/
        $config['imagedir']     = 'assets/qrcode-user/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(11, 83, 160); // array, default is array(255,255,255)
        $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $image_name = $id_user . '.png'; //buat name dari qr code sesuai dengan NAD

        $params['data'] = $qr_link; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
        $params['black'] = array(255, 255, 255);
        $params['white'] = array(11, 83, 160);
        //echo $id_prim, $qr_link, $level, $user;
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
        //input ke database

        $data = [
            'id_prim' => uniqid(),
            'id_user' => $id_user,
            'username' => htmlspecialchars($username),
            'password' => $password,
            'email' => $email,
            'phone' => $no_ponsel,
            'photo' => 'default.png',
            'qr_code' => $image_name,
            'qr_link' => $qr_link,
            'crtdate' => time(),
            'level_id' => $level,
            'active' => '1',
            'valid' => '1'
        ];

        $this->db->insert('tbl_user_qr', $data);
        $this->session->set_flashdata('message', '
			<div class="alert alert-success" role="alert"> Selamat, Akun Anda Berhasil Dibuat</div>
			');
        redirect('dcr/register');
    }

    public function orderlist()
    {
        $this->form_validation->set_rules('picker', 'Picker', 'required|trim', [
            'required' => 'Maaf, ID Picker Harus Di isi Untuk Pengambilan Barang.'
        ]);
        $this->form_validation->set_rules('sellkey', 'Sellkey', 'required|trim', [
            'required' => 'Maaf, No Order Harus Di Isi.'
        ]);

        if ($this->form_validation->run() == false) {
            $sesi = $this->session->userdata('phone');
            //var_dump($this->session->userdata('level_id'));
            $data['title'] = "DUITIN Order Request";
            $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();
            $data['picker'] = $this->db->get_where('tbl_user_qr', ['level_id' => 5, 'valid' => 1, 'active' => 1])->result();
            $data['order'] = $this->db->get_where('tbl_orderan', ['status' => 1])->result();
            $this->load->view('templates/dcr_head', $data);
            $this->load->view('pages/order_request', $data);
            $this->load->view('templates/footbar');
        } else {
            $this->_setpicker();
        }
    }
    public function u_waste()
    {
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
            $data['order'] = $this->db->get_where('tbl_orderan', ['status' => 1])->result();
            $this->load->view('templates/dcr_head', $data);
            $this->load->view('pages/sellwastes', $data);
            $this->load->view('templates/footbar');
        } else {
            $id_penjual = $this->input->post('id'); // masuk ke tabel orderan
            $sellkey = $this->input->post('key'); // masuk ke tabel order detail & orderan
            $barang = $this->input->post('barang'); // masuk ke table order detail
            $jumlah = $this->input->post('jumlah'); // masuk ke table order detail
            $total = $this->input->post('total'); // masuk ke table order detail
            $ketBarang = $this->input->post('keterangan'); // masuk ke tabel orderan

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
                'crtdate' => date('Y-m-d')
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
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
            redirect(base_url('dcr/u_waste'));
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
        $data['order'] = $this->db->get_where('tbl_orderan', ['status' => 1])->result();

        $sesi = $this->session->userdata('phone');
        $data['title'] = "DUITIN Order Detail";
        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();
        $this->load->view('templates/dcr_head', $data);
        $this->load->view('pages/ord_detail', $data);
        $this->load->view('templates/footbar');
    }
    public function profile()
    {
        $sesi = $this->session->userdata('phone');

        //var_dump($this->session->userdata('level_id'));
        $data['title'] = "DUITIN Profile Menu";

        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();
        $data['order'] = $this->db->get_where('tbl_orderan', ['status' => 1])->result();
        $data['prov'] = $this->db->get('m_ipropinsi')->result();
        $data['kota'] = $this->db->get('m_ikabkota')->result();
        $data['camat'] = $this->db->get('m_ikecamatan')->result();

        $this->load->view('templates/dcr_head', $data);
        $this->load->view('pages/profile', $data);
        $this->load->view('templates/footbar');
    }
    public function about()
    {
        $sesi = $this->session->userdata('phone');

        //var_dump($this->session->userdata('level_id'));
        $data['title'] = "About DUITIN App";

        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();
        $data['order'] = $this->db->get_where('tbl_orderan', ['status' => 1])->result();

        $this->load->view('templates/dcr_head', $data);
        $this->load->view('pages/about_app', $data);
        $this->load->view('templates/footbar');
    }

    public function repair()
    {
        $sesi = $this->session->userdata('phone');

        //var_dump($this->session->userdata('level_id'));
        $data['title'] = "Sorry DUITIN App";

        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();
        $data['order'] = $this->db->get_where('tbl_orderan', ['status' => 1])->result();

        $this->load->view('templates/dcr_head', $data);
        $this->load->view('pages/build', $data);
        $this->load->view('templates/footbar');
    }
    public function report()
    {
        $sesi = $this->session->userdata('phone');

        //var_dump($this->session->userdata('level_id'));
        $data['title'] = "Sorry DUITIN App";

        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();
        $data['order'] = $this->db->get_where('tbl_orderan', ['status' => 1])->result();


        $this->form_validation->set_rules('laporan', 'Laporan', 'required|trim', [
            'required' => 'Maaf Ini Wajib Di Isi !',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/dcr_head', $data);
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
            redirect('dcr/report');
        }
    }

    public function tbl_picker()
    {
        $sesi = $this->session->userdata('phone');

        //var_dump($this->session->userdata('level_id'));
        $data['title'] = "DBase Picker - DUITIN App";

        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();

        $data['valid'] = $this->db->get_where('tbl_user_qr', ['level_id' => 5, 'valid' => 1])->result();
        $data['none'] = $this->db->get_where('tbl_user_qr', ['level_id' => 5, 'active' => 0])->result();
        $data['invalid'] = $this->db->get_where('tbl_user_qr', ['level_id' => 5, 'valid' => 0])->result();
        $data['picker'] = $this->db->get_where('tbl_user_qr', ['level_id' => 5])->result();
        $data['order'] = $this->db->get_where('tbl_orderan', ['status' => 1])->result();

        $this->load->view('templates/dcr_head', $data);
        $this->load->view('pages/tbl_picker', $data);
        $this->load->view('templates/footbar');
    }
    public function tbl_user()
    {
        $sesi = $this->session->userdata('phone');

        //var_dump($this->session->userdata('level_id'));
        $data['title'] = "DBase Picker - DUITIN App";

        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();

        $data['picker'] = $this->db->get_where('tbl_user_qr', ['level_id' => 6])->result();

        $data['valid'] = $this->db->get_where('tbl_user_qr', ['level_id' => 6, 'valid' => 1])->result();
        $data['user'] = $this->db->get_where('tbl_user_qr', ['level_id' => 6])->result();
        $data['none'] = $this->db->get_where('tbl_user_qr', ['level_id' => 6, 'active' => 0])->result();
        $data['order'] = $this->db->get_where('tbl_orderan', ['status' => 1])->result();
        $data['invalid'] = $this->db->get_where('tbl_user_qr', ['level_id' => 6,  'valid' => 0])->result();


        $this->load->view('templates/dcr_head', $data);
        $this->load->view('pages/tbl_user', $data);
        $this->load->view('templates/footbar');
    }
    public function tbl_harga()
    {
        $sesi = $this->session->userdata('phone');

        //var_dump($this->session->userdata('level_id'));
        $data['title'] = "DBase Picker - DUITIN App";

        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();
        $data['order'] = $this->db->get_where('tbl_orderan', ['status' => 1])->result();

        $data['harga'] = $this->db->get('tbl_barang')->result();

        $this->load->view('templates/dcr_head', $data);
        $this->load->view('pages/tbl_harga', $data);
        $this->load->view('templates/footbar');
    }

    private function _setpicker()
    {
        $id_picker = $this->input->post('picker');
        $sell_key = $this->input->post('sellkey');
        $id_admin = $this->input->post('admin');
        // update field
        $data = [
            'id_picker' => $id_picker,
            'status' => 2,
            'id_upd_user' => $id_admin
        ];
        $this->db->update('tbl_orderan', $data, ['sell_key' => $sell_key]);
        $this->session->set_flashdata('message', '
			<div class="alert alert-success" role="alert">Order Telah di Konfirmasi</div>
			');
        redirect('dcr/orderlist');
    }

    public function user_detail()
    {
        $sesi = $this->session->userdata('phone');

        //var_dump($this->session->userdata('level_id'));
        $data['title'] = "User Detail - DUITIN App";

        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();

        $picker = $this->uri->segment(3);

        $data['user'] = $this->db->get_where('tbl_user_qr', ['id_user' => $picker])->result();
        $data['order'] = $this->db->get_where('tbl_orderan', ['status' => 1])->result();

        $this->load->view('templates/dcr_head', $data);
        $this->load->view('pages/user_detail', $data);
        $this->load->view('templates/footbar');
    }
    public function barang_picker()
    {
        $this->form_validation->set_rules('idpicker', 'Idpicker', 'required|trim', [
            'required' => 'Maaf, ID Picker Harus Di isi Untuk Pengambilan Barang.'
        ]);
        $this->form_validation->set_rules('sellkey', 'Sellkey', 'required|trim', [
            'required' => 'Maaf, No Order Harus Di Isi.'
        ]);

        if ($this->form_validation->run() == false) {
            $sesi = $this->session->userdata('phone');
            //var_dump($this->session->userdata('level_id'));
            $data['title'] = "DUITIN Order Request";
            $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();
            $data['order'] = $this->db->get_where('tbl_orderan', ['status' => 1])->result();
            //$data['picker'] = $this->db->get_where('tbl_user_qr', ['level_id' => 5, 'valid' => 1, 'active' => 1])->result();
            $data['brgpicker'] = $this->db->get_where('tbl_orderan', ['status' => 2])->result();
            $this->load->view('templates/dcr_head', $data);
            $this->load->view('pages/barang_picker', $data);
            $this->load->view('templates/footbar');
        } else {
            $sell_key = $this->input->post('sellkey');
            $id_admin = $this->input->post('admin');
            $status = $this->input->post('status');
            // update field
            $data = [
                'status' => $status,
                'id_upd_user' => $id_admin
            ];
            $this->db->update('tbl_orderan', $data, ['sell_key' => $sell_key]);
            $this->session->set_flashdata('message', '
			<div class="alert alert-success" role="alert">Info Order Telah di Konfirmasi</div>
			');
            redirect('dcr/barang_picker');
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
