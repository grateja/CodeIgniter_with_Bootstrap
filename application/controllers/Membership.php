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

  function account(){
  	$current_user = $this->account_model->get_current_user("*");


  	$data['current_user'] = $current_user;

  	$this->load->view('membership/account',$data);
  }
	function logout(){
		session_unset('user_id');
		redirect(base_url('Membership/login'));
	}

	function login(){
		$current_user = $this->account_model->get_current_user("id");
		if($current_user){
			redirect(base_url('Membership/account'));
		}
		$data['css'] = array('login');

		$data['username_error'] = isset($_SESSION["username_error"])?"Unknown username":"";
		$data['password_error'] = isset($_SESSION["password_error"])?"Wrong password":"";
		$data['login_active'] = "active";

		unset($_SESSION['username_error'],$_SESSION["password_error"]);

		$this->load->view('Membership/login',$data);
	}
	function signup(){
		$data['css'] = array('login');
		$this->load->view('Membership/signup',$data);
	}
	function login_attempt(){
		if($_POST){
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user_id = $this->account_model->auth_user($username,$password);
			if($user_id){
				$array = array(
					'user_id' => $user_id
				);
				
				$this->session->set_userdata($array);
			} else {			
				redirect(base_url('Membership/login?err=1'));
			}
		}
		// user is logged in
		// or no post request at all
		redirect(base_url('Membership/account'));
	}

}

/* End of file membership.php */
/* Location: ./application/controllers/membership.php */