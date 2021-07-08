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
		$data['data'] = $this->db->query("SELECT * FROM tb_user JOIN tb_biodata ON tb_user.id = tb_biodata.id_user WHERE tb_user.role=3")->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('users/index');
		$this->load->view('templates/footer');
	}

	public function form_edit($id)
	{
		$data['user'] = $this->db->query("SELECT * FROM tb_user JOIN tb_biodata ON tb_biodata.id_user = tb_user.id WHERE id = '$id'")->row_array();
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

		// $id_user = $this->db->query("SELECT * FROM tb_user WHERE username = '$id'")

		$nama = $post['nama'];
		$tempat_lahir = $post['tempat_lahir'];
		$tanggal_lahir = $post['tanggal_lahir'];
		$alamat = $post['alamat'];
		$jenis_kelamin = $post['jenis_kelamin'];
		$pekerjaan = $post['pekerjaan'];
		$no_hp = $post['no_hp'];
		$email = $post['email'];
		$id_user = $this->db->query("SELECT id_biodata FROM tb_biodata WHERE id_user = $id")->row_array();
		$id_biodata = $id_user['id_biodata'];
		// die;
		$this->db->query("UPDATE `tb_biodata` SET `nama` = '$nama', `tempta_lahir` = '$tempat_lahir', `tanggal_lahir` = '$tanggal_lahir', `alamat` = '$alamat', `jenis_kelamin` = '$jenis_kelamin', `pekerjan` = '$pekerjaan', `no_hp` = '$no_hp', `email` = '$email' WHERE `tb_biodata`.`id_biodata` = $id_biodata");
		// $this->db->query("UPDATE `tb_biodata` SET `tempta_lahir` = '$tempat_lahir', `tanggal_lahir` = '$tanggal_lahir', 'nama' = '$nama', 'alamat' = '$alamat', 'jenis_kelamin' = '$jenis_kelamin', 'pekerjan' = '$pekerjaan', 'no_hp' = '$no_hp', 'email' = '$email' WHERE `tb_biodata`.`id_user` = $id; ");

		redirect(base_url("UserController"));
	}
}
