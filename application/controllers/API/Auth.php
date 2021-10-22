 <?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';  
require APPPATH . '/libraries/php-jwt/src/JWT.php';

// use namespace
use Restserver\Libraries\REST_Controller;
use Firebase\JWT\JWT;

class Auth extends REST_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('upload');
        $this->load->model('M_users');
        date_default_timezone_set("Asia/Jakarta");
    }
    public function Login_post()
    {
        if (@$_GET['api_key'] == $this->config->item('api_key')) {
            $post = $this->input->post();

            $email = $post['email'];
            $pass = md5($post['password']);
            $cek = $this->db->get_where('lapor_users',['email' => $email]);

            if ($cek->num_rows() > 0) {
                if ($cek->row()->Status == "User") {
                if ($cek->row()->Active == 1) {
                    if ($cek->row()->Password == $pass) {
                        //siapkan session setelah login, bisa dirubah apapun
                        $Token = $cek->row()->Token;

                        $this->response([
                            'status'    => TRUE,
                            'message'   => 'Berhasil Login!',
                            'data'      => $Token
                        ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
                    } else {
                        $this->response([
                            'status' => FALSE,
                            'message' => 'Gagal Login, Email / Password Salah!'
                        ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
                    }
                } 
                else {
                        $this->response([
                            'status' => FALSE,
                            'message' => 'Gagal Login, Akun Anda Sudah Tidak Aktif!'
                        ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
                }
                }else{
                        $this->response([
                            'status' => FALSE,
                            'message' => 'Gagal Login, Anda Bukan User!'
                        ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
                }
                } else {
                        $this->response([
                            'status' => FALSE,
                            'message' => 'Gagal Login, Email / Password Salah!'
                        ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
                }
            }else{
                $this->response([
                    'status' => FALSE,
                    'message' => 'Api Key tidak valid'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
    }

    public function Register_post()
    {
        if (@$_GET['api_key'] == $this->config->item('api_key')) {
            $post = $this->input->post();
            $kode = $this->M_users->kode();
            $key = $this->config->item('jwt_key');
            $count = $this->db->get_where('lapor_users', ['Email' => $post['Email']])->num_rows();
            $count2 = $this->db->get_where('lapor_users', ['NIK' => $post['NIK']])->num_rows();
            $config['upload_path']      = './assets/images/uploads/Profile'; //path folder
            $config['allowed_types']    = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name']     = TRUE; //nama yang terupload nantinya

            $this->upload->initialize($config);

            if ($this->upload->do_upload("Photo")) {
                $image = $this->upload->data();
                $post['Photo'] =  $image['file_name'];
            } else {
                $post['Photo'] = NULL;
            }
            $arr = array(
                        'ID'            => $kode,
                        'NIK'           => $post['NIK'],
                        'Photo'         => $post['Photo'],
                        'Nama'          => $post['Nama'],
                        'Email'         => $post['Email'],
                        'Password'      => md5($post['Password']),
                        'Tempat_Lahir'  => $post['Tempat_Lahir'],
                        'Tanggal_Lahir' => $post['Tanggal_Lahir'],
                        'Status'        => "User",
                        'Active'        => 1
                    );

            $token = JWT::encode($arr, $key);

            if ($count > 0 || $count2 > 0) {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Registrasi Gagal, Email / NIK Sudah Terdaftar!'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }else{

            $array = array(
                        'ID'            => $kode,
                        'NIK'           => $post['NIK'],
                        'Photo'         => $post['Photo'],
                        'Nama'          => $post['Nama'],
                        'Email'         => $post['Email'],
                        'Password'      => md5($post['Password']),
                        'Tempat_Lahir'  => $post['Tempat_Lahir'],
                        'Tanggal_Lahir' => $post['Tanggal_Lahir'],
                        'Status'        => "User",
                        'Active'        => 1,
                        'Token'         => $token
                    );
            $this->M_users->save($array,'lapor_users');
            $this->response([
                'status'    => TRUE,
                'message'   => 'User Berhasil Register!',
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

    public function Password_post()
    {
        if (@$_GET['api_key'] == $this->config->item('api_key')) {
            $post = $this->input->post();
            $ID = $_GET['id'];
            $old = $this->db->get_where('lapor_users', ['ID' => $ID])->row();

            if ($post['password1'] == $post['password2']) {
                $password1 = md5($post['password1']);
                $password = md5($post['password']);
                if ($old->Password == $password) {
                    $array = array(
                                'Password' => $password1
                            );
                    $result = $this->db->where('ID', $ID)->update('lapor_users', $array);
                    $this->response([
                        'status' => TRUE,
                        'message' => 'Password Berhasil Diubah!'
                    ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
                }else{
                    $this->response([
                    'status' => FALSE,
                    'message' => 'Ubah Password Gagal, Password Lama Harus Sama!'
                    ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
                }
            }else{
                $this->response([
                'status' => FALSE,
                'message' => 'Ubah Password Gagal, Password Baru dan Validasi Password Harus Sama!'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
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