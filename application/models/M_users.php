<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_Model {
	public function select($ID = ''){
		if ($ID != ''){
			$this->db->where('lapor_users.ID', $ID);
		}
		$data = $this->db->get('lapor_users');
		return $data;
	}
public function save($data){
        $this->db->insert('lapor_users',$data);
    }

public function kode(){
		  $this->db->select('RIGHT(lapor_users.ID,2) as ID', FALSE);
		  $this->db->order_by('ID','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('lapor_users');  //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
			   //cek kode jika telah tersedia    
			   $data = $query->row();      
			   $kode = intval($data->ID) + 1; 
		  }
		  else{      
			   $kode = 1;  //cek jika kode belum terdapat pada table
		  }
			  $tgl=date('Y'); 
			  $batas = str_pad($kode, 8, "0", STR_PAD_LEFT);    
			  $kodetampil = "USR".$tgl.$batas;  //format kode
			  return $kodetampil;  
		 }

public function hitung()
		{
 		$query = $this->db->query('SELECT * FROM lapor_users');
 		$negatif=$query->num_rows();
 		return $negatif;
 		}
public function delete($ID){
        return $this->db->delete('lapor_users', array("ID" => $ID));
    	}
public function search($Nama){
	$this->db->like('Nama', $Nama);
	$result = $this->db->get('lapor_users');
	return $result;
	}
}