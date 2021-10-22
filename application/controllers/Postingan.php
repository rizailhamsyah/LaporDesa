<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Postingan extends AUTH_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_postingan');
    }

	public function index(){
		$data['title'] = 'Postingan';
		$data['template'] = $this->db->get('lapor_template')->row_array();
		$data['profile'] = $this->db->get('lapor_profile')->row_array();
        $data['hitung'] = $this->M_postingan->hitung();
        $data['postingan'] = $this->db->get('lapor_postingan')->result_array();
		$this->load->view('Layout/header', $data);
		$this->load->view('Layout/sidebar', $data);
		$this->load->view('Postingan/index', $data);
		$this->load->view('Layout/footer', $data);
	}

	public function Verifikasi($ID){
        $data = $this->input->post();

        $arr = array(
            'Validasi' => 1
        );

        $result = $this->db->where('ID', $data['ID'])->update('lapor_postingan', $arr);

        $this->session->set_flashdata('save', '<div class="alert bg-green alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Postingan Berhasil Diverifikasi
        </div>');

        redirect('Postingan');
    }

    public function Blokir($ID){
        $data = $this->input->post();

        $arr = array(
            'Aktif' => 0
        );

        $result = $this->db->where('ID', $data['ID'])->update('lapor_postingan', $arr);

        $this->session->set_flashdata('save', '<div class="alert bg-red alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Postingan Berhasil Diblokir
        </div>');

        redirect('Postingan');
    }

}
?>