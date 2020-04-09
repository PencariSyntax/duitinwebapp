<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Download extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('download');
    }

    public function qrcode()
    {
        $qrcode = $this->input->get('qrcode');
        $path = "assets/qrcode-user/";
        force_download($path . $qrcode, null);
    }
}
