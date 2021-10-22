 <?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';  
require APPPATH . '/libraries/php-jwt/src/JWT.php';

// use namespace
use Restserver\Libraries\REST_Controller;
use Firebase\JWT\JWT;

class Postingan extends REST_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('upload');
        $this->load->model('M_postingan');
        $this->load->model('M_notifikasi');
        date_default_timezone_set("Asia/Jakarta");
    }
    public function Index_get(){
        if (@$_GET['api_key'] == $this->config->item('api_key')) {
            $value = $this->M_postingan->select_posting();
            for($x=0;$x<count($value);$x++){
                $posting[] = array(
                                'ID'            => $value[$x]->ID,
                                'Email'         => $value[$x]->Email,
                                'Tanggal'       => $value[$x]->Tanggal,
                                'Status'        => $value[$x]->Status,
                                'Gambar'        => base_url().'assets/images/uploads/Postingan/'.$value[$x]->Gambar,
                                'Size_Gambar'   => $value[$x]->Size_Gambar,
                                'Lokasi'        => $value[$x]->Lokasi,
                                'Jenis_Laporan' => $value[$x]->Jenis_Laporan,
                                'Validasi'      => $value[$x]->Validasi,
                                'Aktif'         => $value[$x]->Aktif,
                                'Like'          => $this->db->get_where('lapor_likes', ['ID_Postingan' => $value[$x]->ID])->num_rows()
                            );
            }
            $this->response([
                'status'    => TRUE,
                'message'   => 'success',
                'data'      => $posting
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Api Key tidak valid'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function Profile_get(){
        $Email = $_GET['email'];
        $value = $this->M_postingan->select_profile($Email);
            for($x=0;$x<count($value);$x++){
                $posting[] = array(
                                'ID'            => $value[$x]->ID,
                                'Email'         => $value[$x]->Email,
                                'Tanggal'       => $value[$x]->Tanggal,
                                'Status'        => $value[$x]->Status,
                                'Gambar'        => base_url().'assets/images/uploads/Postingan/'.$value[$x]->Gambar,
                                'Size_Gambar'   => $value[$x]->Size_Gambar,
                                'Lokasi'        => $value[$x]->Lokasi,
                                'Jenis_Laporan' => $value[$x]->Jenis_Laporan,
                                'Validasi'      => $value[$x]->Validasi,
                                'Aktif'         => $value[$x]->Aktif,
                                'Like'          => $this->db->get_where('lapor_likes', ['ID_Postingan' => $value[$x]->ID])->num_rows()
                            );
            }
        if (@$_GET['api_key'] == $this->config->item('api_key')) {
            $this->response([
                'status' => TRUE,
                'message' => 'success',
                'data' => $posting
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Api Key tidak valid'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function Detail_get(){
        $ID = $_GET['id'];
        $value = $this->M_postingan->select_detail($ID);
        $like = $this->db->get_where('lapor_likes', ['ID_Postingan' => $ID])->num_rows();
        if (@$_GET['api_key'] == $this->config->item('api_key')) {
            $this->response([
                'status' => TRUE,
                'message' => 'success',
                'data' => array(
                                'ID'            => $value->ID,
                                'Email'         => $value->Email,
                                'Tanggal'       => $value->Tanggal,
                                'Status'        => $value->Status,
                                'Gambar'        => base_url().'assets/images/uploads/Postingan/'.$value->Gambar,
                                'Size_Gambar'   => $value->Size_Gambar,
                                'Lokasi'        => $value->Lokasi,
                                'Jenis_Laporan' => $value->Jenis_Laporan,
                                'Validasi'      => $value->Validasi,
                                'Aktif'         => $value->Aktif,
                                'Like'          => $like
                            )
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Api Key tidak valid'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function Posting_post()
    {
        if (@$_GET['api_key'] == $this->config->item('api_key')) {
            $post = $this->input->post();
            $key = $this->config->item('jwt_key');
            $jwt = JWT::decode($_GET['token'], $key, array('HS256'));
            $arr = json_encode($jwt);
            $decode = json_decode($arr, true);
            $config['upload_path']      = './assets/images/uploads/Postingan'; //path folder
            $config['allowed_types']    = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name']     = TRUE; //nama yang terupload nantinya

            $this->upload->initialize($config);

            if ($this->upload->do_upload("Gambar")) {
                $image = $this->upload->data();
                $post['Gambar'] =  $image['file_name'];
            } else {
                $post['Gambar'] = NULL;
            }
            $array = array(
                        'ID'            => $this->M_postingan->kode(),
                        'Email'         => $decode['Email'],
                        'Tanggal'       => date('Y-m-d H:i:s'),
                        'Status'        => $post['Status'],
                        'Gambar'        => $post['Gambar'],
                        'Size_Gambar'   => $post['Size_Gambar'],
                        'Lokasi'        => $post['Lokasi'],
                        'Jenis_Laporan' => $post['Jenis_Laporan'],
                        'Validasi'      => 0,
                        'Aktif'         => 1
                    );
            $this->M_postingan->save($array,'lapor_postingan');
            $this->response([
                'status'    => TRUE,
                'message'   => 'Postingan Berhasil Disimpan!',
                'data'      => $array
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Api Key tidak valid'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function Posting_put()
    {
        if (@$_GET['api_key'] == $this->config->item('api_key')) {
            $put = $this->put();
            $ID = $_GET['id'];
            $array = array(
                        'Status'        => $put['Status'],
                        'Jenis_Laporan' => $put['Jenis_Laporan'],
                    );
            $result = $this->db->where('ID', $ID)->update('lapor_postingan', $array);
            $this->response([
                'status'    => TRUE,
                'message'   => 'Postingan Berhasil Diupdate!',
                'data'      => $array
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Api Key tidak valid'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function Posting_delete()
    {
        if (@$_GET['api_key'] == $this->config->item('api_key')) {
            $put = $this->put();
            $ID = $_GET['id'];
            $this->M_postingan->delete($ID);
            $this->response([
                'status'    => TRUE,
                'message'   => 'Postingan Berhasil Dihapus!'
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Api Key tidak valid'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function Like_post()
    {
        if (@$_GET['api_key'] == $this->config->item('api_key')) {
            $post = $this->input->post();
            $key = $this->config->item('jwt_key');
            $jwt = JWT::decode($_GET['token'], $key, array('HS256'));
            $arr = json_encode($jwt);
            $decode = json_decode($arr, true);
            // var_dump($decode); die();
            $count = $this->db->get_where('lapor_likes', ['ID_Users' => $decode['ID'], 'ID_Postingan' => $_GET['id']])->num_rows();

            if ($count > 0) {
                $this->response([
                    'status' => FALSE,
                    'message' => 'User Telah Menyukai Postingan Ini!'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }else{
            $array = array(
                        'ID_Users'      => $decode['ID'],
                        'ID_Postingan'  => $_GET['id']
                    );

            $notif = array(
                        'ID_Postingan'  => $_GET['id'],
                        'ID_Users'      => $decode['ID'],
                        'Nama'          => $decode['Nama'],
                        'Pesan'         => $decode['Nama']." Menyukai Postingan Anda",
                        'Tanggal'       => date('Y-m-d H:i:s'),
                        'Status'        => 0
                    );
            $this->M_notifikasi->save($notif,'lapor_notifikasi');
            $this->M_postingan->save_like($array,'lapor_likes');
            $this->response([
                'status'    => TRUE,
                'message'   => 'Like Postingan Berhasil Disimpan!',
                'data'      => $array
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Api Key tidak valid'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function Like_delete()
    {
        if (@$_GET['api_key'] == $this->config->item('api_key')) {
            $post = $this->input->post();
            $key = $this->config->item('jwt_key');
            $jwt = JWT::decode($_GET['token'], $key, array('HS256'));
            $arr = json_encode($jwt);
            $decode = json_decode($arr, true);
            $ID_Users = $decode['ID'];
            $ID_Postingan = $_GET['id'];

            $this->M_postingan->delete_like($ID_Users, $ID_Postingan);
            $this->response([
                'status'    => TRUE,
                'message'   => 'Like Postingan Berhasil Dihapus!'
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Api Key tidak valid'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }
}
?>