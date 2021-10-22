 <?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';  
require APPPATH . '/libraries/php-jwt/src/JWT.php';

// use namespace
use Restserver\Libraries\REST_Controller;
use Firebase\JWT\JWT;

class Profile extends REST_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_postingan');
        $this->load->model('M_users');
        date_default_timezone_set("Asia/Jakarta");
    }

    public function Index_get()
    {
        if (@$_GET['api_key'] == $this->config->item('api_key')) {
            $post = $this->input->post();
            $key = $this->config->item('jwt_key');
            $jwt = JWT::decode($_GET['token'], $key, array('HS256'));
            $arr = json_encode($jwt);
            $decode = json_decode($arr, true);
            $value = $this->M_postingan->select_profile($decode['Email']);
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
                'message'   => 'Success',
                'data'      => array(
                                'Profile'   => $decode,
                                'Postingan' => $posting
                                )
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Api Key tidak valid'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function Search_get()
    {
        if (@$_GET['api_key'] == $this->config->item('api_key')) {
            // $post = $this->input->post();
            // var_dump($post); die();
            $Nama = $_GET['nama'];
            $value = $this->M_users->search($Nama)->result();
            for($x=0;$x<count($value);$x++){
                $search[] = array(
                                'ID'            => $value[$x]->ID,
                                'Photo'         => base_url().'assets/images/uploads/Postingan/'.$value[$x]->Photo,
                                'Nama'          => $value[$x]->Nama,
                                'Email'         => $value[$x]->Email
                            );
            }

            if ($this->M_users->search($Nama)->num_rows() == 0) {
                  $this->response([
                    'status'    => FALSE,
                    'message'   => 'User Tidak Ditemukan!'
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
             }else{ 
                $this->response([
                    'status'    => TRUE,
                    'message'   => 'Success',
                    'data'      => $search
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Api Key tidak valid'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }
}
?>