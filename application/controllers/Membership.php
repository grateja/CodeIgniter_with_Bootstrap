<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membership extends MY_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('account_model');
	}
	public function index() {
		$this->login();
	}

	function logout(){
		session_unset('user_id');
	}

	function login(){
		$data['css'] = array('login');

		$data['username_error'] = isset($_SESSION["username_error"])?"Unknown username":"";
		$data['password_error'] = isset($_SESSION["password_error"])?"Wrong password":"";

		unset($_SESSION['username_error'],$_SESSION["password_error"]);

		$this->load->view('Membership/login',$data);
	}
	function signup(){
		$data['css'] = array('login');
		$this->load->view('Membership/signup',$data);
	}
	function login_attempt(){
		$current_user = $this->account_model->get_current_user("id");
		if($_POST && $current_user == null){
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user_id = $this->account_model->auth_user($username,$password);
			if($user_id){
				$array = array(
					'user_id' => $user_id
				);
				
				$this->session->set_userdata($array);
				print_r($user_id);
			}
		}
		// user is logged in
		// or no post request at all
		redirect(base_url('Membership/login?err=1'));

	}

}

/* End of file membership.php */
/* Location: ./application/controllers/membership.php */