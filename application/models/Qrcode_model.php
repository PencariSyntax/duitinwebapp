<?php
class Qrcode_model extends CI_Model
{
    function get_all_user()
    {
        $hasil = $this->db->get('tbl_user_qr');
        return $hasil;
    }

    function save_qruser($id_prim, $qr_link, $image_name, $level)
    {
        $data = array(
            'id_prim' => uniqid(),
            'id_user' => $id_prim,
            'qr_code' => $image_name,
            'qr_link' => $qr_link,
            'crtdate' => time(),
            'level_id' => $level,
            'active' => '1',
            'valid' => '0'
        );

        $this->db->insert('tbl_user_qr', $data);
    }
}
