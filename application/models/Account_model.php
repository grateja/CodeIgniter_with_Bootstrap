<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model {

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
			//		print_r(array_diff($__usr_crdls ,$usr_crdls));
			if(count(array_diff($usr_crdls, $__usr_crdls))){
				echo 'one item doesn"t exists';
				print_r(array_diff($usr_crdls, $__usr_crdls));
			} else {
				$this->db->where('id',$id);
				$this->db->limit(1);
				$this->db->select($usr_crdls);
				$query = $this->db->get('account_table');
				echo '<pre>';
				print_r($query->result());
				echo '</pre>';
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
			}

			return null;
		}
	}	
}

/* End of file Account_model.php */
/* Location: ./application/models/Account_model.php */