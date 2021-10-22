 <?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';  
require APPPATH . '/libraries/php-jwt/src/JWT.php';

// use namespace
use Restserver\Libraries\REST_Controller;
use Firebase\JWT\JWT;

class Kategori extends REST_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('upload');
        $this->load->model('M_kategori');
        date_default_timezone_set("Asia/Jakarta");
    }
    public function Index_get(){
        if (@$_GET['api_key'] == $this->config->item('api_key')) {
            $value = $this->M_kategori->select()->result();
            for($x=0;$x<count($value);$x++){
                $kategori[] = array(
                                'ID'            => $value[$x]->ID,
                                'Kategori'      => $value[$x]->Nama_Kategori,
                                'Count'         => $this->db->get_where('lapor_postingan',  ['Jenis_Laporan' => $value[$x]->ID])->num_rows()
                            );
            }
            $this->response([
                'status'    => TRUE,
                'message'   => 'success',
                'data'      => $kategori
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