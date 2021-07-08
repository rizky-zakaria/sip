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
		// var_dump($cek);
		// die;
		$user = $this->session->userdata('id');
		$data['setuju'] = $this->db->query("SELECT tb_user.username, tb_arsip.nomor_arsip, tb_arsip.arsip, tb_arsip.nama_pemilik, tb_pinjam.status, tb_arsip.tanggal_arsip, tb_arsip.jenis_arsip FROM tb_pinjam JOIN tb_arsip JOIN tb_user ON tb_pinjam.id_arsip = tb_arsip.id AND tb_pinjam.id_peminjam = tb_user.id WHERE tb_pinjam.status = 'disetujui' AND tb_pinjam.id_peminjam = $user OR tb_pinjam.status='diajukan' ")->result_array();
		// var_dump($cek);
		if ($cek != null) {
			$idUser = $this->session->userdata('id');
			$data['ceked'] = $this->db->query("SELECT tb_arsip.nomor_arsip, tb_arsip.arsip, tb_arsip.nama_pemilik, tb_arsip.id, tb_pinjam.status, tb_arsip.tanggal_arsip, tb_arsip.jenis_arsip FROM tb_pinjam JOIN tb_arsip JOIN tb_user ON tb_pinjam.id_arsip = tb_arsip.id AND tb_pinjam.id_peminjam = tb_user.id WHERE tb_pinjam.status = 'disetujui' AND tb_arsip.nomor_arsip='$cek' AND tb_pinjam.id_peminjam='$idUser'")->row_array();
			// var_dump($data['ceked']);
			// die;
			if ($data['ceked'] == null) {

				$data['ceked1'] = $this->db->query("SELECT tb_arsip.nomor_arsip, tb_arsip.arsip, tb_arsip.nama_pemilik, tb_arsip.id, tb_pinjam.status, tb_arsip.tanggal_arsip, tb_arsip.jenis_arsip FROM tb_pinjam JOIN tb_arsip JOIN tb_user ON tb_pinjam.id_arsip = tb_arsip.id AND tb_pinjam.id_peminjam = tb_user.id WHERE tb_pinjam.status = 'diajukan' AND tb_arsip.nomor_arsip='$cek' AND tb_pinjam.id_peminjam='$idUser'")->row_array();

				if ($data['ceked1'] == null) {
					$data['data'] = $this->db->query("SELECT * FROM tb_arsip WHERE nomor_arsip LIKE '%$cek%' OR nama_pemilik LIKE '%$cek%'")->result_array();
					$this->load->view('customer/index', $data);
				} else {
					$this->load->view('customer/index', $data);
				}
			} else {
				$this->load->view('customer/index', $data);
			}
			// var_dump($data);
			// die;
		} else {
			$this->load->view('customer/index', $data);
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
			'status' => "diajukan",
			'tanggal_mohon' => date("d-m-Y")
		);
		$this->db->insert('tb_pinjam', $insert);
		// $user_token = [
		// 	'email' => $email,
		// 	'date_created' => time()
		// ];
		// $this->_sendEmail();
		redirect(base_url("CustomerController"));
	}

	private function _sendEmail()
	{
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'emailtesting364@gmail.com',
			'smtp_pass' => 'emailtesting20',
			'smtp_port' => 465,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"
		];

		$this->email->initialize($config);

		$this->email->from('emailtesting20@gmail.com', 'Ada Permohonan Baru yang mungkin perlu anda setujui');
		$this->email->to('sipadai21@gmail.com');

		// if ($type == 'verify') {
		// 	$this->email->subject('Account Verification');
		// 	$this->email->message('Click this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
		// } else if ($type == 'forgot') {
		// 	$this->email->subject('Reset Password');
		// 	$this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
		// }

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}
}
