<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membership extends MY_Controller {

	public function index() {
		$this->load->view('Membership/login');

	}

}

/* End of file membership.php */
/* Location: ./application/controllers/membership.php */