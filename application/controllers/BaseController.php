<?php
class BaseController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('isLoged') != TRUE) {
			redirect(base_url("AuthController"));
		} elseif ($this->session->userdata('role') == 3) {
			redirect(base_url("CustomerController"));
		}
	}

	public function index()
	{
		$data['title'] = 'Base Data';
		$data['judul'] = 'Dashboard Page';
		$data['arsip'] = $this->db->get('tb_arsip')->result_array();
		$data['jumlah'] = $this->db->count_all('tb_arsip');
		$this->load->view('templates/header', $data);
		$this->load->view('base/graphics', $data);
		$this->load->view('templates/footer');
	}

	public function data()
	{
		$data['title'] = 'Base Data';
		$data['judul'] = 'Dashboard Page';
		$data['arsip'] = $this->db->get('tb_arsip')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('base/index', $data);
		$this->load->view('templates/footer');
	}

	public function form_edit()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/footer');
	}

	public function proses_edit()
	{
		$data = array(
			'nama_pemilik' => $this->input->post('nama_pemilik')
		);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tb_arsip', $data);
	}

	public function hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tb_arsip');
		redirect(base_url("BaseController"));
	}

	public function form_tambah()
	{
		$data['judul'] = 'Form Tambah Data';
		$this->load->view('templates/header', $data);
		$this->load->view('base/tambah');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{
		$post = $this->input->post();
		$this->nama_pemilik = $post['nama'];
		$this->nomor_arsip = $this->uuid->v4();
		$this->arsip = $this->_uploadImage();
		$this->jenis_arsip = $post['jenis'];
		$this->keterangan = $post['keterangan'];
		$this->tanggal_arsip = $post['tanggal'];
		$this->db->insert('tb_arsip', $this);
		// $this->hapus($nomor);
		if (isset($post['id'])) {
			$id = $post['id'];
			$getId = $this->db->query("SELECT * FROM tb_arsip WHERE id='$id'")->result_array();
			if ($getId != null) {
				$this->hapus($id);
			}
		}
		redirect(base_url("BaseController"));
	}

	private function _uploadImage()
	{
		$config['upload_path']          = './assets/upload';
		$config['allowed_types']        = 'jpg|png|jpeg|docx|pdf';
		$config['file_name']            = $this->input->post('nama') . $this->uuid->v4();
		$config['overwrite']            = true;
		$config['max_size']             = 8000;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->upload->initialize($config);

		if ($this->upload->do_upload('file')) {
			return $this->upload->data("file_name");
		}
		return "default.jpg";

		// print_r($this->upload->display_errors());
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('isLoged');
		redirect(base_url());
	}

	public function permohonan()
	{
		$data['title'] = 'Base Data';
		$data['judul'] = 'Dashboard Page';
		// $data['arsip'] = $this->db->query("SELECT tb_pinjam.id_peminjaman, tb_pinjam.status, tb_biodata.nama, tb_arsip.nomor_arsip, tb_arsip.arsip FROM tb_pinjam JOIN tb_user JOIN tb_biodata JOIN tb_arsip ON tb_pinjam.id_peminjam = tb_user.id AND tb_pinjam.id_arsip = tb_arsip.id AND tb_user.id = tb_biodata.id_user ")->result_array();
		$data['arsip'] = $this->db->query("SELECT tb_pinjam.id_peminjaman, tb_pinjam.tanggal_mohon, tb_pinjam.status, tb_biodata.nama, tb_user.username, tb_arsip.nomor_arsip, tb_arsip.arsip FROM tb_pinjam JOIN tb_user JOIN tb_biodata JOIN tb_arsip ON tb_pinjam.id_peminjam = tb_user.id AND tb_pinjam.id_arsip = tb_arsip.id AND tb_biodata.id_user = tb_user.id")->result_array();
		// var_dump($data['arsip']);
		// die;
		$this->load->view('templates/header', $data);
		$this->load->view('base/permohonan', $data);
		$this->load->view('templates/footer');
	}

	public function ubahStatus($id)
	{
		$getId = $id;
		$this->db->query("UPDATE `tb_pinjam` SET `status` = 'disetujui' WHERE `tb_pinjam`.`id_peminjaman` = '$getId'; ");
		redirect(base_url("BaseController/permohonan"));
	}

	public function edit($id)
	{
		$data['title'] = 'Base Data';
		$data['judul'] = 'Dashboard Page';
		$data['id'] = $id;
		$data['data'] = $this->db->query("SELECT * FROM tb_arsip WHERE id = '$id'")->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('base/editArsip', $data);
		$this->load->view('templates/footer');
	}

	public function profile()
	{
		$data['title'] = 'Base Data';
		$data['judul'] = 'Dashboard Page';
		$this->load->view('templates/header', $data);
		$this->load->view('base/profile');
		$this->load->view('templates/footer');
	}

	public function viewPemohon($user)
	{
		$data['title'] = 'Base Data';
		$data['judul'] = 'Dashboard Page';
		$data['pemohon'] = $this->db->query("SELECT * FROM tb_user JOIN tb_biodata ON tb_user.id = tb_biodata.id_user WHERE username ='$user'")->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('base/profile');
		$this->load->view('templates/footer');
	}

	public function viewArsip($arsip)
	{
		// var_dump($arsip);
		// die;
		$data['title'] = 'Base Data';
		$data['judul'] = 'Dashboard Page';
		$data['pemohon'] = $this->db->query("SELECT * FROM `tb_arsip` WHERE nomor_arsip = '$arsip'")->row_array();
		// var_dump($data['pemohon']);
		// die;
		$this->load->view('templates/header', $data);
		$this->load->view('base/infoArsip', $data);
		$this->load->view('templates/footer');
	}
}
