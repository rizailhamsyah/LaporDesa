<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_auth', 'Auth');
		if ($this->session->userdata('login')) {
			redirect('home');
		}
	}

	public function index(){
		$this->form_validation->set_rules('email','Email','required|valid_email');
		if ($this->form_validation->run() != true) {
			$data['title'] = 'Login';
			$data['template'] = $this->db->get('lapor_template')->row_array();
			$data['profile'] = $this->db->get('lapor_profile')->row_array();
			$this->load->view('Auth/index', $data);
		} else {
			$this->Auth->login();
		}			
	}

}
?>