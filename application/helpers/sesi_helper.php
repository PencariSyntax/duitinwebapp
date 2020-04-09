<?php



function session()
{
    //cek apakah user ada sesi
    $that = get_instance();

    if (!$that->session->userdata('phone')) {
        $that->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Sorry, You must sign in firstly ! </div>');
        redirect('auth');
    } else {
        $level = $that->session->userdata('level_id'); //1
        if ($level == 1) {
            redirect('dam');
        } elseif ($level == 2) {
            redirect('dco');
        } elseif ($level == 3) {
            redirect('dac');
        } elseif ($level == 4) {
            redirect('dcr');
        } elseif ($level == 5) {
            redirect('dpc');
        } else {
            redirect('dus');
        }
    }
}
