<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_postingan extends CI_Model {
	public function select($ID = ''){
		if ($ID != ''){
			$this->db->where('lapor_postingan.ID', $ID);
		}
		$data = $this->db->get('lapor_postingan');
		return $data;
	}
public function save($data){
        $this->db->insert('lapor_postingan',$data);
    }

public function save_like($data){
        $this->db->insert('lapor_likes',$data);
    }

public function kode(){
		  $this->db->select('RIGHT(lapor_postingan.ID,8) as ID', FALSE);
		  $this->db->order_by('ID','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('lapor_postingan');  //cek dulu apakah ada sudah ada kode di tabel.    
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
			  $kodetampil = "POS".$tgl.$batas;  //format kode
			  return $kodetampil;  
		 }

public function hitung()
		{
 		$query = $this->db->query('SELECT * FROM lapor_postingan');
 		$negatif=$query->num_rows();
 		return $negatif;
 		}
public function delete($ID){
        return $this->db->delete('lapor_postingan', array("ID" => $ID));
    	}

public function delete_like($ID_Users, $ID_Postingan){
        return $this->db->delete('lapor_likes', array("ID_Users" => $ID_Users, "ID_Postingan" => $ID_Postingan));
    	}
public function select_posting(){
		$this->db->where('Aktif', 1);
		$this->db->select('*');
		$this->db->from('lapor_postingan');
		$this->db->order_by('Tanggal', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
public function select_profile($Email){
		$this->db->where('Aktif', 1);
		$this->db->where('Email', $Email);
		$this->db->select('*');
		$this->db->from('lapor_postingan');
		$this->db->order_by('Tanggal', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
public function select_detail($ID){
		$this->db->where('Aktif', 1);
		$this->db->where('ID', $ID);
		$this->db->select('*');
		$this->db->from('lapor_postingan');
		$query = $this->db->get();
		return $query->row();
	}
}