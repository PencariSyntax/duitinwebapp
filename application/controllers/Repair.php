<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Repair extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'DUITIN Repair Pages';
        $this->load->view('templates/503_header', $data);
        $this->load->view('auth/503');
        $this->load->view('templates/auth_footer');
    }
}
