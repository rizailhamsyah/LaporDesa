<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends AUTH_Controller {
	public function __construct()
    {
        parent::__construct();
        
		$this->load->model('M_users');
		$this->load->library('upload');
        $this->load->model('M_postingan');
    }

	public function index(){
		$data['title'] = 'Dashboard';
		$data['template'] = $this->db->get('lapor_template')->row_array();
		$data['profile'] = $this->db->get('lapor_profile')->row_array();
        $data['hitung_post'] = $this->M_postingan->hitung();
		$data['hitung_usr'] = $this->M_users->hitung();
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		$this->load->view('Home/index', $data);
		$this->load->view('Layout/footer', $data);
	}

	public function profile(){
		$data['title'] = 'Profile User';
		$data['template'] = $this->db->get('lapor_template')->row_array();
		$data['profile'] = $this->db->get('lapor_profile')->row_array();
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		$this->load->view('Home/profile', $data);
		$this->load->view('Layout/footer', $data);
	}

	public function update($ID){
        $data = $this->input->post();
        $gambar = $this->db->get_where('lapor_users', ['ID'=> $data['ID']])->row();
        $Photo = $gambar->Photo;
        $config['upload_path']      = './assets/images/uploads/Profile'; //path folder
        $config['allowed_types']    = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name']     = TRUE; //nama yang terupload nantinya
        $this->upload->initialize($config);
            
        if($this->upload->do_upload("Photo")){
            $image = $this->upload->data();
            $data['Photo'] =  $image['file_name'];
            
        }else{
            $data['Photo'] = $Photo;
        }

        $arr = array(
            'Nama_Depan' => $data['Nama_Depan'],
            'Nama_Belakang' => $data['Nama_Belakang'],
            'Photo' => $data['Photo'],
            'Email' => $data['Email'],
            'Keterangan' => $data['Keterangan'],
            'Status' => $data['Status'],
            'Deskripsi' => $data['Deskripsi'],
        );

        $result = $this->db->where('ID', $data['ID'])->update('lapor_users', $arr);

        $this->session->set_flashdata('save', '<div class="alert bg-green alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Diupdate
        </div>');

        redirect('home/profile');
    }

    public function prosesProfile(){
        $data = $this->input->post();

        
    }
}
?>