<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {
	public function select($ID = ''){
		if ($ID != ''){
			$this->db->where('lapor_kategori.ID', $ID);
		}
		$data = $this->db->get('lapor_kategori');
		return $data;
	}
public function save($data){
        $this->db->insert('lapor_kategori',$data);
    }

public function hitung()
		{
 		$query = $this->db->query('SELECT * FROM lapor_kategori');
 		$negatif=$query->num_rows();
 		return $negatif;
 		}
public function delete($ID){
        return $this->db->delete('lapor_kategori', array("ID" => $ID));
    	}
}