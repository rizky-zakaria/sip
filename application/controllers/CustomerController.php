<?php
class CustomerController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('isLoged') == FALSE) {
			redirect(base_url("AuthController"));
		} else if ($this->session->userdata('role') != 3) {
			redirect(base_url("BaseController"));
		}
	}

	public function index()
	{
		$cek = $this->input->post('cek');
		if ($cek != null) {
			$data['data'] = $this->db->query("SELECT * FROM tb_arsip WHERE nomor_arsip = '$cek' OR nama_pemilik = '$cek'")->result_array();
			// var_dump($data);
			// die;
			$this->load->view('customer/index', $data);
		} else {
			$this->load->view('customer/index');
		}
	}

	public function preview($arsip)
	{
		$data['arsip'] = $arsip;
		// $this->load->view('templates/header');
		$this->load->view('customer/preview', $data);
		// $this->load->view('templates/footer');
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('isLoged');
		redirect(base_url());
	}

	public function pinjam($id)
	{
		$getId = $id;
		$insert = array(
			'id_arsip' => $getId,
			'id_peminjam' => $this->session->userdata('id'),
			'status' => "diajukan"
		);
		$this->db->insert('tb_pinjam', $insert);
		redirect(base_url("CustomerController"));
	}
}
