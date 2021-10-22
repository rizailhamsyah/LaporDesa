<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kategori extends AUTH_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kategori');
    }

    public function index(){
        $data['title'] = 'Data Kategori';
        $data['template'] = $this->db->get('lapor_template')->row_array();
        $data['profile'] = $this->db->get('lapor_profile')->row_array();
        $data['hitung_kategori'] = $this->M_kategori->hitung();
        $data['kategori'] = $this->db->get('lapor_kategori')->result_array();
        $this->load->view('Layout/header', $data);
        $this->load->view('Layout/sidebar', $data);
        $this->load->view('Kategori/Index', $data);
        $this->load->view('Layout/footer', $data);
    }


    public function simpan(){
        $data = $this->input->post();

        $ketegori = ucwords($data['Nama_Kategori']);

        $count = $this->db->get_where('lapor_kategori', ['Nama_Kategori' => $kategori])->num_rows();

        if ($count > 0) {
            $this->session->set_flashdata('save', '<div class="alert bg-red alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Data Gagal Disimpan, Kategori Telah Terdaftar!
            </div>');
        }else{
            $arr = array(
            'ID'                => '',
            'Nama_Kategori'     => $kategori
            );

            $this->M_kategori->save($data,'lapor_kategori');

            //notifikasi success tambah data murid
            $this->session->set_flashdata('save', '<div class="alert bg-green alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Data Berhasil Disimpan
            </div>');
        }  

        redirect('Kategori');
    }

    public function update($ID){
        $data = $this->input->post();

        // $ketegori = ucwords($data['Nama_Kategori']);

        // $count = $this->db->get_where('lapor_kategori', ['Nama_Kategori' => $kategori])->num_rows();

            $arr = array(
            'Nama_Kategori'          => $data['Nama_Kategori']
            );

            $result = $this->db->where('ID', $ID)->update('lapor_kategori', $arr);

            $this->session->set_flashdata('save', '<div class="alert bg-green alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Data Berhasil Diupdate
            </div>');
        redirect('Kategori');
    }


    public function delete($ID=null){
        if (!isset($ID)) show_404();
        if ($this->M_kategori->delete($ID)) {
      
        $this->session->set_flashdata('save', '<div class="alert bg-red alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Dihapus
        </div>');
        redirect('Kategori');
        }
    }
}
?>