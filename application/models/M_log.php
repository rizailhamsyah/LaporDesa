<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_log extends CI_Model {
public function kode(){
		$this->db->select('RIGHT(sid_log.ID,2) as ID', FALSE);
		$this->db->order_by('ID','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('lapor_log');  //cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0){      
		//cek kode jika telah tersedia    
			$data = $query->row();      
				$kode = intval($data->ID) + 1; 
			}
			else{      
				$kode = 1;  //cek jika kode belum terdapat pada table
			}
				$tgl=date('dmY'); 
				$batas = str_pad($kode, 8, "0", STR_PAD_LEFT);    
				$kodetampil = "LOG".$tgl.$batas;  //format kode
				return $kodetampil;  
			}
public function save($data){
        $this->db->insert('lapor_log',$data);
    }

public function hitung()
		{
 		$query = $this->db->query('SELECT * FROM lapor_log');
 		$negatif=$query->num_rows();
 		return $negatif;
 		}
}