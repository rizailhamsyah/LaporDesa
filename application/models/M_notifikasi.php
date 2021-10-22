<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_notifikasi extends CI_Model {
public function save($data){
        $this->db->insert('lapor_notifikasi',$data);
    }

}