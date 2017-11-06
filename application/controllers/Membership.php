<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membership extends MY_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('account_model');
		$this->load->library('form_validation');
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

		$attr = array(
			'class' => 'text-danger col-sm-12 col-sm-offset-3'
		);

		$data['username_error'] = isset($_SESSION["username_error"])?span("Invalid username",$attr):"";
		$data['password_error'] = isset($_SESSION["password_error"])?span("Invalid password",$attr):"";
		$data['username'] = isset($_SESSION["username"])?$_SESSION["username"]:"";
		
		$data['login_active'] = "active";


		unset(
			$_SESSION['username_error'],
			$_SESSION["password_error"],
			$_SESSION['username']
		);

		$this->load->view('Membership/login',$data);
	}
	function signup(){
		$this->account_model->check_login();
		$data['css'] = array('login');

		$data['surname'] = session_delete_set('surname');
		$data['account_id'] = session_delete_set('account_id');
		$data['firstname'] = session_delete_set('firstname');
		$data['middlename'] = session_delete_set('middlename');
		$data['course_section'] = session_delete_set('course_section');
		$data['year_grade'] = session_delete_set('year_grade');
		$data['adviser'] = session_delete_set('adviser');
		$data['contact_number'] = session_delete_set('contact_number');
		$data['address'] = session_delete_set('address');
		$data['email'] = session_delete_set('email');		
		$data['username'] = session_delete_set('username');

		$validation_errors = session_delete_set('validation_errors');

		if($validation_errors){
			$attr = array('class' => 'text-danger');
			foreach ($validation_errors as $key => $value) {
				if($key == 'username' || $key == 'password' || $key == 'confirm_password')
					$attr['class'] = 'text-danger col-sm-3'; 
				$data[$key.'_err'] = span($value,$attr);
			}
		}

		$this->load->view('Membership/signup',$data);
	}
  
	function unique($arg){
		// return false if failed
		return !$this->account_model->username_exists($arg);
	}

	function signup_attempt(){
		if($_POST){

			$surname = $this->input->post('surname');

			$account_id = $this->account_model->generate_id();
			$firstname = $this->input->post('firstname');
			$middlename = $this->input->post('middlename');
			$course_section = $this->input->post('course_section');
			$year_grade = $this->input->post('year_grade');
			$adviser = $this->input->post('adviser');
			$contact_number = $this->input->post('contact_number');
			$address = $this->input->post('address');
			$email = $this->input->post('email');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$confirm_password = $this->input->post('confirm_password');

			$this->form_validation->set_rules('surname', 'Surname', 'required');
			$this->form_validation->set_rules('firstname', 'First name', 'required');
			$this->form_validation->set_rules('course_section', 'Course/Section', 'required');
			$this->form_validation->set_rules('year_grade', 'Year/Grade', 'required');
			$this->form_validation->set_rules('adviser', 'Adviser', 'required');
			$this->form_validation->set_rules('contact_number', 'Contact number', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|callback_unique');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

			if ($this->form_validation->run() == FALSE) {

				$_SESSION["surname"] = $surname;
				$_SESSION["middlename"] = $middlename;
				$_SESSION["firstname"] = $firstname;
				$_SESSION["course_section"] = $course_section;
				$_SESSION["year_grade"] = $year_grade;
				$_SESSION["adviser"] = $adviser;
				$_SESSION["contact_number"] = $contact_number;
				$_SESSION["address"] = $address;
				$_SESSION["email"] = $email;
				$_SESSION["username"] = $username;

				// $_SESSION["validation_errors"] = validation_errors();
				$_SESSION["validation_errors"] = validation_errors_array();
				redirect(base_url('Membership/signup?err=1'));
			} else {
				$data = array(
					'account_id' => $account_id,
					'surname' => $surname,
					'firstname' => $firstname,
					'middlename' => $middlename,
					'course_section' => $course_section,
					'year_grade' => $year_grade,
					'adviser' => $adviser,
					'contact_number' => $contact_number,
					'address' => $address,
					'email' => $email,
					'username' => $username,
					'password' => password_hash($this->input->post('password'),PASSWORD_BCRYPT)
					);
				$this->account_model->insert_user($data);
				$this->session->set_userdata(array('account_id' => $account_id));
			}
		}
		redirect(base_url('Membership/account'));
	}

	function login_attempt(){
		if($_POST){

			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$_SESSION["username"] = $username;

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