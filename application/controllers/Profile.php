<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class profile extends AUTH_Controller {
    public function __construct()
    {
        parent::__construct();
    }

	public function index(){
		$data['title'] = 'Profile Desa';
		$data['template'] = $this->db->get('lapor_template')->row_array();
		$data['profile'] = $this->db->get_where('lapor_profile', ['ID' => 1])->row_array();
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		$this->load->view('Profile/index', $data);
		$this->load->view('Layout/footer', $data);
	}

	public function edit($ID){
        $data = $this->input->post();
        
        $arr = array(
            'Nama_Desa' => $data['Nama_Desa'],
            'Sejarah' => $data['Sejarah'],
            'Visi' => $data['Visi'],
            'Misi' => $data['Misi'],
            'Program_Kerja' => $data['Program_Kerja'],
            'Alamat_Desa' => $data['Alamat_Desa'],
            'Kecamatan' => $data['Kecamatan'],
            'Kabupaten' => $data['Kabupaten'],
            'Provinsi' => $data['Provinsi'],
            'Negara' => $data['Negara'],
            'Kode_Pos' => $data['Kode_Pos'],
            'No_Whatsapp' => $data['No_Whatsapp'],
            'Email' => $data['Email'],
            'Instagram' => $data['Instagram'],
            'Embed_Peta' => $data['Embed_Peta']
        );
        
        $result = $this->db->where('ID', $data['ID'])->update('lapor_profile', $arr);        

        $this->session->set_flashdata('save', '<div class="alert bg-green alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Diupdate
        </div>');
        redirect('profile');
    }

}
?>