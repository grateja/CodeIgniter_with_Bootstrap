<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {
	public function index(){
		// $array = array(
		// 	'user_id' => 1
		// );
		
		// $this->session->set_userdata( $array );
		$this->load->view('welcome_message');
	}
}
