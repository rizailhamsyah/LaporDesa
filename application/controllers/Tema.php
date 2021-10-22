<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class tema extends AUTH_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
    }

	public function index(){
		$data['title'] = 'Tema';
		$data['template'] = $this->db->get('lapor_template')->row_array();
		$data['profile'] = $this->db->get('lapor_profile')->row_array();
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		$this->load->view('Tema/index', $data);
		$this->load->view('Layout/footer', $data);
	}

	public function edit(){
		$data = $this->input->post();
         
        $gambar = $this->db->get_where('lapor_template', ['id'=> 1])->row();

        $Background_Login_lama = $gambar->login;
        $Icon = $gambar->icon;
        $profile = $gambar->profile;
        $logo = $gambar->logo;

        $config['upload_path']      = './assets/images/uploads/Tema'; //path folder
        $config['allowed_types']    = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name']     = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);

        if ($this->upload->do_upload("Background_Login")) {
            $image = $this->upload->data();
            $data['Background_Login'] =  $image['file_name'];
        } else {
            $data['Background_Login'] = $Background_Login_lama;
        }
            
        if($this->upload->do_upload("Icon")){
            $image = $this->upload->data();
            $data['Icon'] =  $image['file_name'];
        }else{
            $data['Icon'] = $Icon;
        }

        if($this->upload->do_upload("Logo_Desa")){
            $image = $this->upload->data();
            $data['Logo_Desa'] =  $image['file_name'];
        }else{
             $data['Logo_Desa'] = $logo;
        }

        if($this->upload->do_upload("Background_Profile")){
            $image = $this->upload->data();
            $data['Background_Profile'] =  $image['file_name'];
        }else{
            $data['Background_Profile'] = $profile;
        }
        
        $arr = array(
            'icon'		=> $data['Icon'],
            'logo'		=> $data['Logo_Desa'],
            'profile'	=> $data['Background_Profile'],
            'login'		=> $data['Background_Login'],
            'warna'		=> $data['Warna_Tema']
        );
        
        $result = $this->db->where('id', '1')->update('lapor_template', $arr);        
        if ($result){            
            if ($gambar){
                if (file_exists($config['upload_path'].$gambar)){
                    unlink($config['upload_path'].$gambar);
                }
            }
        }

        $this->session->set_flashdata('save', '<div class="alert bg-green alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Diupdate
        </div>');
        redirect('Tema');
	}

}
?>