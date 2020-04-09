<?php

use Dompdf\Dompdf;

defined('BASEPATH') or exit('No direct script access allowed');

class Duitincode extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('qrcode/ciqrcode');
        $this->load->model('qrcode_model');
        $this->load->library('pdfgenerator');
    }

    public function index()
    {
        $data['title'] = "qrcode Generator";
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/auth_footer');
        $this->load->view('qrcode/qr-generator');
    }

    public function qrsave()
    {
        //$user = $this->input->post('user');
        //################################################
        for ($i = 0; $i < 1; $i++) {
            //$id_prim = $this->input->post('idprim');
            // $qr_link = $this->input->post('qrlink');
            // $level = $this->input->post('level');
            $id_prim = "022" . "01" . rand(1000, 9999);
            $qr_link = "https://duitindonesia.id/auth/link/" . $id_prim;
            $level = "01";
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

            $image_name = $id_prim . '.png'; //buat name dari qr code sesuai dengan nim

            $params['data'] = $qr_link; //data yang akan di jadikan QR CODE
            $params['level'] = 'H'; //H=High
            $params['size'] = 10;
            $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
            $params['black'] = array(255, 255, 255);
            $params['white'] = array(11, 83, 160);
            //echo $id_prim, $qr_link, $level, $user;
            $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

            //var_dump($this->ciqrcode->generate($params));

            $this->qrcode_model->save_qruser($id_prim, $qr_link, $image_name, $level); //simpan ke database
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">QR Codes has been Generated</div>');
            
            //$data['qruser'] = $image_name;
            
            // $this->load->view('print/qrcard', $data, true);
            // $this->pdfgenerator->generate($html, 'qrcard');
        }
        redirect('duitincode');
    }
}
