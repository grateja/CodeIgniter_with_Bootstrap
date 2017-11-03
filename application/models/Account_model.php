<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model {
	function auth_user($username,$password){
		// check if username exists
		$this->db->where("username LIKE BINARY" ,$username);
		$this->db->limit(1);
		$query = $this->db->get('account_table');
		if($query->row()){
			$_password = $query->row()->password;
			echo password_hash('admin',PASSWORD_BCRYPT);
			if(password_verify($password,$_password,PASSWORD_BCRYPT)){
				return $query->row()->id;
			} else {
				$_SESSION["password_error"] = 1;
				return false;
			}
			exit();

		} else {
				$_SESSION["username_error"] = 1;
			return false;
		}
		// check if password matched
	}

	function get_current_user($usr_crdls = array()){
		// check if user id logged in
		if($this->session->has_userdata('user_id')){
			$id = $this->session->userdata('user_id');
		} else {
			return null;
		}

		// list user credentials
		$__usr_crdls = array(
			'id',
			'account_id',
			'username',
			'password',
			'user_type',
			'surname',
			'firstname',
			'middlename',
			'course_section',
			'year_grade',
			'adviser',
			'contact_number',
			'address',
			'email',
			'date_added');

		// check if requested user credential request is an array
		if(is_array($usr_crdls)){
			// check if requested user credentials exist in the list
			if(count(array_diff($usr_crdls, $__usr_crdls))){
				throw new Exception("credentials don't exist", 1);
			} else {
				$this->db->where('id',$id);
				$this->db->limit(1);
				$this->db->select($usr_crdls);
				$query = $this->db->get('account_table');
				return $query->row();
			}
		} else {

			$this->db->where('id',$id);
			$this->db->limit(1);
			$query = $this->db->get('account_table');

			if($usr_crdls == "*"){
				// return all data as associate array
				return $query->row();
			}

			if(in_array($usr_crdls, $__usr_crdls)){
				// return specific request credential
				return $query->result_array()[0][$usr_crdls];
			} else {
				throw new Exception("credentials doesn't exists", 1);
			}

			return null;
		}
	}	
}

/* End of file Account_model.php */
/* Location: ./application/models/Account_model.php */