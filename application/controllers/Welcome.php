<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {
	public function index(){

		$array = array(
			'current_user' => 1
		);
		
		$this->session->set_userdata( $array );

		$this->load->model('account_model');
		$current_user = $this->account_model->get_current_user();

		if($current_user == null){
			$membership_link[] = "<li>" . anchor('Membership/login', 'Login') . "</li>";
			$membership_link[] = "<li>" . anchor('Membership/signup', 'Sign up') . "</li>";
		} else {
			$membership_link[] = "<li>" . anchor('Membership/account', $current_user) . "</li>";
			$membership_link[] = "<li class='dropdown'>" 
				. anchor('#', '<span class="caret"></span>',
					array(
						'class' => 'dropdon-toggle',
						'data-toggle' => 'dropdown',
						'aria-expanded' => 'false'
						))
				. ul(array(anchor('Membership/logout', 'Logout')),array("class" => "dropdown-menu"))
				. "</li>";
		}

    $membership_link_data = array("class" => "nav navbar-nav navbar-right", "id" => "membership");

		$data['membership_link'] = ul($membership_link,$membership_link_data);
		$this->load->view('welcome_message',$data);
	}
}
