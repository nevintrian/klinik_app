

<?php

class Home_pasien_cetak extends CI_Controller
{

	public function index()
	{
		$this->load->view('partials/v_home_header');
		$this->load->view('v_home_pasien_cetak');
		$this->load->view('partials/v_home_footer');
	}
}
