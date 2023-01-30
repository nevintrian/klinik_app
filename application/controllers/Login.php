<?php

class Login extends CI_Controller
{

	public function index()
	{
		if ($this->session->userdata('level')) {
			redirect('dashboard');
		}
		if ($this->input->post() == NULL) {
			$this->load->view('partials/v_home_header');
			$this->load->view('v_login');
			$this->load->view('partials/v_home_footer');
		} else {
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$user = $this->db->query("SELECT * FROM user WHERE email='$email' and password='$password'");
			if ($user->num_rows() > 0) {
				foreach ($user->result() as $row) {
					$sess_data['id'] = $row->id;
					$sess_data['nama'] = $row->nama;
					$sess_data['email'] = $row->email;
					$sess_data['jabatan'] = $row->jabatan;
					$this->session->set_userdata($sess_data);
				}
				redirect('dashboard');
			}
?>
			<script type="text/javascript">
				alert('Email atau password yang dimasukkan salah !');
				window.location = "<?php echo base_url('login'); ?>";
			</script>
<?php

		}
	}

	function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('jabatan');
		session_destroy();
		redirect('login');
	}
}
