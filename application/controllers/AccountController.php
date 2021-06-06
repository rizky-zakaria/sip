<?php
class AccountController extends CI_Controller
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
		$data['judul'] = 'Account Page';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/footer');
	}
}
