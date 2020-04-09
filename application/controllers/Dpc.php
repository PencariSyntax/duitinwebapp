<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dpc extends CI_Controller
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
            if ($level == 5) {
                return true;
            } else {
                redirect('dam');
            }
        }
    }



    public function index()
    {

        $sesi = $this->session->userdata('phone');

        $data['title'] = 'DUITIN Picker Page';

        $now = date('Y m d');

        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();

        //echo 'Hello ' . $data['name']['username'];

        $this->load->view('templates/pcheader', $data);
        $this->load->view('pages/dpc', $data);
        $this->load->view('templates/footbar');
    }

    public function sellwastes()
    {
        $sesi = $this->session->userdata('phone');

        $picker = $this->input->get('picker');

        $data['title'] = 'DUITIN App - Sell The Wastes';

        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();

        $data['hasil'] = $this->db->get_where('tbl_orderan', ['id_picker' => $picker, 'status' => 3])->result();

        $this->load->view('templates/pcheader', $data);
        $this->load->view('pages/jualhasilpc', $data);
        $this->load->view('templates/footbar');
    }
    public function profile()
    {
        $sesi = $this->session->userdata('phone');
        $data['title'] = 'DUITIN App - My Profile';

        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();

        $this->load->view('templates/pcheader', $data);
        $this->load->view('pages/profile');
        $this->load->view('templates/footbar');
    }
    public function riwayat_pengambilan()
    {
        $sesi = $this->session->userdata('phone');
        $data['title'] = 'DUITIN App - Orders Logs';

        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();

        $this->load->view('templates/pcheader', $data);
        $this->load->view('pages/histori_picker', $data);
        $this->load->view('templates/footbar');
    }
    public function about()
    {
        $sesi = $this->session->userdata('phone');
        $data['title'] = 'DUITIN App - Orders Logs';

        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();

        $this->load->view('templates/pcheader', $data);
        $this->load->view('pages/about_app', $data);
        $this->load->view('templates/footbar');
    }
    public function repair()
    {
        $sesi = $this->session->userdata('phone');

        //var_dump($this->session->userdata('level_id'));
        $data['title'] = "Sorry DUITIN App";

        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();

        $this->load->view('templates/pcheader', $data);
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
            $this->load->view('templates/pcheader', $data);
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

    public function acceptorder()
    {
        $orderkey = $this->input->get('orderkey');

        $accept = $this->db->get_where('tbl_orderan', ['sell_key' => $orderkey]);

        $date = date('Y') . '-' . date('m') . '-' . date('d');

        if ($accept) {
            $data = [
                'status' => 3,
                'upddate' => $date
            ];
            $this->db->update('tbl_orderan', $data, ['sell_key' => $orderkey]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Orderan telah di terima, silahkan ambil barangnya !</div>');
            redirect('dpc/routing?session=');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Orderan tidak kami temukan, silahkan hubungi DUITIN !</div>');
            redirect('dpc');
        }
    }

    public function routing()
    {
        $curl = curl_init(); // Mendeteksi kebaradaan Picker

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://freegeoip.app/json/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "accept: application/json",
                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $response = json_decode($response, true);

        $data['geoip'] = $response['ip'];
        $data['lat'] = $response['latitude'];
        $data['long'] = $response['longitude'];

        $data['title'] = "Rute Picker - DUITIN App";
        $sesi = $this->session->userdata('phone');
        $data['name'] = $this->db->get_where('tbl_user_qr', ['phone' => $sesi])->row_array();
        $data['danger'] = $this->db->get_where('bug_report', ['status' => 0])->result();
        $data['alert'] = $this->db->get_where('bug_report', ['status' => 0])->row_array();
        $this->load->view('maps/pc_maps_head', $data);
        $this->load->view('maps/route_maps', $data);
        $this->load->view('maps/maps_footer');
    }

    private function _geoip()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://freegeoip.app/json/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "accept: application/json",
                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $response = json_decode($response, true);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            //echo $response;
            $lat = $response['latitude'];
            $long = $response['longitude'];
            $geooip = $response['ip'];
            // send data to function routing
            $this->routing($lat, $long, $geooip);

            //echo $lat . ' ' . $long;
            //$data = [];
        }
    }
}
