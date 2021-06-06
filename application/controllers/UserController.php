<?php
class UserController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('isLoged') != TRUE) {
			redirect(base_url("AuthController"));
		}
	}

	public function index()
	{
		$data['judul'] = 'User Page';
		$data['data'] = $this->db->get('tb_user')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('users/index');
		$this->load->view('templates/footer');
	}

	public function form_edit($id)
	{
		$data['user'] = $this->db->query("SELECT * FROM tb_user WHERE id = '$id'")->row_array();
		$data['judul'] = "Form Edit";
		$this->load->view('templates/header', $data);
		$this->load->view('users/edit', $data);
		$this->load->view('templates/footer');
	}

	public function proses_edit()
	{
		$post = $this->input->post();
		$this->username = $post['username'];
		$this->password = md5($post['password']);
		$id = $post['id'];
		$this->db->where('id', $id);
		$this->db->update('tb_user', $this);
		redirect(base_url("UserController"));
	}
}
