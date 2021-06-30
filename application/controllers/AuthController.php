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
			'id' => $cek['id'],
			'username' => $cek['username'],
			'role' => $cek['role'],
			'isLoged' => TRUE
		);
		if ($cek['role'] == 1) {
			$this->session->set_userdata($session);
			redirect(base_url("BaseController"));
		} else if ($cek['role'] == 2) {
			$this->session->set_userdata($session);
			redirect(base_url("BaseController"));
		} else if ($cek['role'] == 3) {
			$this->session->set_userdata($session);
			redirect(base_url("CustomerController"));
		} else {
			redirect(base_url("AuthController"));
		}
	}

	public function register()
	{
		$this->load->view('auth/register');
	}

	public function act_register()
	{
		$post = $this->input->post();

		$user = array(
			'username' => $post['user'],
			'password' => md5($post['password']),
			'role' => 3
		);
		$this->db->insert('tb_user', $user);
		$getId = $this->db->get_where('tb_user', array('username' => $post['user']))->row_array();
		// var_dump($getId);
		// die;
		$insert = array(
			'nama' => $post['nama'],
			'tempta_lahir' => $post['tanggal_lahir'],
			'tanggal_lahir' => $post['tempat_lahir'],
			'alamat'  => $post['alamat'],
			'jenis_kelamin' => $post['jenis_kelamin'],
			'pekerjan' => $post['pekerjaan'],
			'no_hp' => $post['no_hp'],
			'email' => $post['email'],
			'id_user' => $getId['id']
		);
		// var_dump($post);
		$this->db->insert('tb_biodata', $insert);
		redirect(base_url());
	}
}
