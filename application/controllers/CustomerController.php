<?php
class CustomerController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$cek = $this->input->post('cek');
		if ($cek != null) {
			$data['data'] = $this->db->query("SELECT * FROM tb_arsip WHERE nomor_imb = '$cek' OR nama_pemilik = '$cek'")->result_array();
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
}
