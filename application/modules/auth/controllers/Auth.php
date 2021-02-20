<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_master');
	}

	public function index()
	{
		$this->load->view('index');
	}

	function validasi()
	{
		$order = [
			'kolom'		=> 'created_date',
			'urutan'	=> 'desc'
		];

		$username 	= $this->input->post('username');
		$password	= md5($this->input->post('password'));

		//cek by usernmae
		$cek = $this->M_master->getWhere('tb_user',['username' => $username,'password' => $password],$order)->row();
		if ($cek) {
			$session = array(
				'ses_id' 		=> $cek->id_user,
				'ses_username' 	=> $cek->username,
				'ses_level' 	=> $cek->level,
				'ses_pangkalan'	=> $cek->id_pangkalan,
				'ses_kwaran' 	=> $cek->id_kwaran,
				'ses_display'	=> $cek->display_name,
				'ses_email'		=> $cek->email
			);
			
			$this->session->set_userdata( $session );

			echo json_encode(array(
				'success'		=> 1,
				'message'		=> 'selamat datang '.$cek->display_name
			));
		}
		else
		{
			//cek by email
			$cek = $this->M_master->getWhere('tb_user',['email' => $username, 'password' => $password],$order)->row();
			if ($cek) {
				$session = array(
					'ses_id' 		=> $cek->id_user,
					'ses_username' 	=> $cek->username,
					'ses_level' 	=> $cek->level,
					'ses_kwaran' 	=> $cek->id_kwaran,
					'ses_pangkalan'	=> $cek->id_pangkalan,
					'ses_display'	=> $cek->display_name,
					'ses_email'		=> $cek->email
				);

				$this->session->set_userdata( $session );

				echo json_encode(array(
					'success'		=> 1,
					'message'		=> 'selamat datang '.$cek->display_name
				));
			}
			else
			{
				//cek by kta
				$cek = $this->M_master->getWhere('tb_anggota',['kta' => $username, 'password' => $password],$order)->row();

				if ($cek) {
					$session = array(
						'ses_id' 		=> $cek->id_anggota,
						'ses_username' 	=> $cek->kta,
						'ses_level' 	=> '4',
						'ses_kwaran' 	=> '',
						'ses_gudep' 	=> '',
						'ses_display'	=> $cek->nama,
						'ses_email'		=> 'anggota'
					);

					$this->session->set_userdata( $session );

					echo json_encode(array(
						'success'		=> 1,
						'message'		=> 'selamat datang '.$cek->nama
					));
				}
				else
				{
					echo json_encode(array(
						'success'		=> 0,
						'message'		=> 'data login tidak sesuai'
					));
				}	
			}
		}
	}

	function logout()
	{
		session_destroy();
		redirect('auth','refresh');
	}

	function lupa()
	{
		$this->load->view('lupa');
	}

	function aksilupa()
	{
		$order = [
			'kolom'		=> 'created_date',
			'urutan'	=> 'desc'
		];
		$email = $this->input->post('email');
		$token = base64_encode(random_bytes(32));

		$cek = $this->M_master->getWhere('tb_user',['email' => $email],$order)->row();
		if ($cek) {
			$user_token = [
				'email'		=> $email,
				'token'		=> $token
			];

			$this->M_master->input('user_token',$user_token);
			$this->_send_email($email,$token);
			$this->session->set_flashdata('success', 'reset password dikirim ke email anda, silahkan cek..');
			redirect('auth','refresh');
		}
		else
		{
			$this->session->set_flashdata('error', 'email tidak terdaftar');
			redirect('auth/lupa','refresh');
		}
	}

	private function _send_email($email,$token)
	{

		$dat['email']	= $email;
		$dat['token']	= $token;
		$message = $this->load->view('view_email', $dat, true);

		$config = [
			'protocol'		=> 'smtp',
			'smtp_host'		=> 'ssl://smtp.googlemail.com',
			'smtp_user'		=> 'kwarcabjepara1120@gmail.com',
			'smtp_pass'		=> 'Indonesia1945',
			'smtp_port'		=> 	465,
			'mailtype'		=> 'html',
			'charset'		=> 'utf-8',
		];

		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");  
		
		$this->email->from('kwarcabjepara1120@gmail.com', 'Pramuka Kwarcab Jepara');
		$this->email->to($email);		
		$this->email->subject('reset password');
		$this->email->message($message);
		
		if ($this->email->send()) {
			return true;
		}
		else
		{
			echo $this->email->print_debugger();
			die;
		}

	}


	function reset()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$where = [
			'email'		=> $email,
			'token'		=> $token
		];

		$cek = $this->db->get_where('user_token', $where)->row();
		if ($cek) {
			$this->M_master->delete('user_token',$where);
			$data = ['email' => $email];
			$this->load->view('form_reset',$data);
		}
		else
		{
			$this->session->set_flashdata('error', 'maaf terjadi kesalahan, coba ulangi');
			redirect('lupa','refresh');
		}
	}

	function aksireset()
	{
		$email 		= $this->input->post('email');
		$password 	= md5($this->input->post('password'));
		$cek = $this->M_master->update('tb_user',['email' => $email],['password' => $password]);
		if (!$cek) {
			echo json_encode(array(
				'success' 	=> 1,
				'message'	=> 'password berhasil di reset, silahkan login ulang'
			));
		}
		else
		{
			echo json_encode(array(
				'success' 	=> 0,
				'message'	=> 'gagal, silahkan ulangi'
			));
		}
	}

	function v_email()
	{
		$this->load->view('view_email');
	}
}

/* End of file Auth.php */
/* Location: ./application/modules/auth/controllers/Auth.php */