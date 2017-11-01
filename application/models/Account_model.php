<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model {

	function get_current_user(){
		if($this->session->has_userdata('current_user')){
			return $this->session->userdata('current_user');
		}
		return null;
	}	

}

/* End of file Account_model.php */
/* Location: ./application/models/Account_model.php */