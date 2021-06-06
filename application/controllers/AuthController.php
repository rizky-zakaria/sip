<?php
class AuthController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('isLoged') == TRUE) {
			redirect(base_url("BaseController"));
		}
	}

	public function index()
	{
		// $this->load->view('templates/header');
		$this->load->view('auth/index');
		// $this->load->view('templates/footer');
	}

	public function cekLogin()
	{
		$user = $this->input->post('user');
		$password = md5($this->input->post('password'));

		$cek  = $this->db->query("SELECT * FROM tb_user WHERE username ='$user' AND password ='$password' LIMIT 1")->row_array();
		$session = array(
			'username' => $cek['username'],
			'role' => $cek['role'],
			'isLoged' => TRUE
		);
		if ($cek) {
			$this->session->set_userdata($session);
			redirect(base_url("BaseController"));
		} else {
			redirect(base_url("AuthController"));
		}
	}
}
