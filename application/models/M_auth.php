 <?php 


/**
 * 
 */
class M_auth extends CI_Model
{
	public function login(){
		$email = $this->input->post('email');
		$pass = md5($this->input->post('pass'));
		$cek = $this->db->get_where('lapor_users',['email' => $email]);

		if ($cek->num_rows() > 0) {
			if ($cek->row()->Active == 1) {
				if ($cek->row()->Password == $pass) {
					//siapkan session setelah login, bisa dirubah apapun
					$data = [
						'id' => $cek->row()->ID,
						'photo' => $cek->row()->Photo,
						'nama_lengkap' => $cek->row()->Nama,
						'nama' => $cek->row()->Nama,
						'email' => $cek->row()->Email,
						'status' => $cek->row()->Status,
						'active' => $cek->row()->Active
					];

					$this->session->set_userdata(array('login' => $data));
					$this->session->set_flashdata('save', '<div class="alert bg-red alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Email / Password Salah!
        </div>');
					redirect('home');
				} else {
					$this->session->set_flashdata('save', '<div class="alert bg-red alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Email / Password Salah!
        </div>');

					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('save', '<div class="alert bg-red alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Akun Anda Sudah Tidak Aktif!
        </div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('save', '<div class="alert bg-red alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Email / Password Salah!
        </div>');
			redirect('auth');
		}
	}
}