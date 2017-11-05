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
  	$this->account_model->restrict_user();
  	$current_user = $this->account_model->get_current_user("*");

  	$data['current_user'] = $current_user;

  	$this->load->view('membership/account',$data);
  }
	function logout(){
		session_unset('user_id');
		redirect(base_url('Membership/login'));
	}

	function login(){
		$this->account_model->check_login();
		$data['css'] = array('login');

		$data['username_error'] = isset($_SESSION["username_error"])?"Unknown username":"";
		$data['password_error'] = isset($_SESSION["password_error"])?"Wrong password":"";
		$data['login_active'] = "active";

		unset($_SESSION['username_error'],$_SESSION["password_error"]);

		$this->load->view('Membership/login',$data);
	}
	function signup(){
		$this->account_model->check_login();
		$data['css'] = array('login');
		$this->load->view('Membership/signup',$data);
	}

	function signup_attempt(){
		if($_POST){
			$account_id = $this->account_model->generate_id();
			$data = array(
				'account_id' => $account_id,
				'surname' => $this->input->post('surname'),
				'firstname' => $this->input->post('firstname'),
				'middlename' => $this->input->post('middlename'),
				'course_section' => $this->input->post('course_section'),
				'year_grade' => $this->input->post('year_grade'),
				'adviser' => $this->input->post('adviser'),
				'contact_number' => $this->input->post('contact_number'),
				'address' => $this->input->post('address'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => password_hash($this->input->post('password'),PASSWORD_BCRYPT)
				);
			$this->account_model->insert_user($data);
			$this->session->set_userdata(array('account_id' => $account_id));
		}
		redirect(base_url('Membership/account'));
	}

	function login_attempt(){
		if($_POST){
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$account_id = $this->account_model->auth_user($username,$password);
			if($account_id){
				$array = array(
					'account_id' => $account_id
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