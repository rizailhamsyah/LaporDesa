<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends AUTH_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_users');
        $this->load->library('upload');
    }

    public function index(){
        $data['title'] = 'Data Users';
        $data['template'] = $this->db->get('lapor_template')->row_array();
        $data['profile'] = $this->db->get('lapor_profile')->row_array();
        $data['hitung_usr'] = $this->M_users->hitung();
        $data['users'] = $this->db->get('lapor_users')->result_array();
        $this->load->view('Layout/header', $data);
        $this->load->view('Layout/sidebar', $data);
        $this->load->view('Users/index', $data);
        $this->load->view('Layout/footer', $data);
    }

    public function tambah_data(){
        $data['title'] = 'Tambah Data Users';
        $data['template'] = $this->db->get('lapor_template')->row_array();
        $data['profile'] = $this->db->get('lapor_profile')->row_array();
        $data['kode'] = $this->M_users->kode();
        $this->load->view('Layout/header', $data);
        $this->load->view('Layout/sidebar', $data);
        $this->load->view('Users/tambah_data', $data);
        $this->load->view('Layout/footer', $data);
    }

    public function edit_data($ID){
        $data['title'] = 'Edit Data Users';
        $data['template'] = $this->db->get('lapor_template')->row_array();
        $data['profile'] = $this->db->get('lapor_profile')->row_array();
        $data['users'] = $this->db->get_where('lapor_users', ['ID' => $ID])->row_array();
        $data['kode'] = $this->M_users->kode();
        $this->load->view('Layout/header', $data);
        $this->load->view('Layout/sidebar', $data);
        $this->load->view('Users/edit_data', $data);
        $this->load->view('Layout/footer', $data);
    }

    public function simpan(){
        $data = $this->input->post();
        $config['upload_path']      = './assets/images/uploads/Profile'; //path folder
        $config['allowed_types']    = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name']     = TRUE; //nama yang terupload nantinya
        $this->upload->initialize($config);
            
        if($this->upload->do_upload("Photo")){
            $image = $this->upload->data();
            $data['Photo'] =  $image['file_name'];
            
        }else{
            $data['Photo'] = 'default_profile.jpg';
        }

        $data = array(
            'ID'            => $data['ID'],
            'NIK'           => $data['NIK'],
            'Nama'          => $data['Nama'],
            'Photo'         => $data['Photo'],
            'Email'         => $data['Email'],
            'Password'      => md5($data['Password']),
            'Tempat_Lahir'  => $data['Tempat_Lahir'],
            'Tanggal_Lahir' => $data['Tanggal_Lahir'],
            'Status'        => $data['Status'],
            'Active'        => $data['Active']
        );

        $this->M_users->save($data,'lapor_users');

        //notifikasi success tambah data murid
        $this->session->set_flashdata('save', '<div class="alert bg-green alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Disimpan
        </div>');

        redirect('Users');
    }

    public function update(){
        $data = $this->input->post();
        $gambar = $this->db->get_where('sid_users', ['ID'=> $data['ID']])->row();
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
            'Nama'          => $data['Nama'],
            'Photo'         => $data['Photo'],
            'Email'         => $data['Email'],
            'Tempat_Lahir'  => $data['Tempat_Lahir'],
            'Tanggal_Lahir' => $data['Tanggal_Lahir'],
            'Status'        => $data['Status'],
            'Active'        => $data['Active']
        );

        $result = $this->db->where('ID', $data['ID'])->update('lapor_users', $arr);

        $this->session->set_flashdata('save', '<div class="alert bg-green alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Diupdate
        </div>');

        redirect('Users');
    }

    public function reset($ID){
        $data = $this->input->post();

        $arr = array(
            'Password' => md5(123456789)
        );

        $result = $this->db->where('ID', $data['ID'])->update('lapor_users', $arr);

        $this->session->set_flashdata('save', '<div class="alert bg-green alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Password Berhasil Direset
        </div>');

        redirect('Users');
    }

    public function delete($ID=null){
        if (!isset($ID)) show_404();
        if ($this->M_users->delete($ID)) {
      
        $this->session->set_flashdata('save', '<div class="alert bg-red alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Dihapus
        </div>');
        redirect('Users');
        }
    }
}
?>