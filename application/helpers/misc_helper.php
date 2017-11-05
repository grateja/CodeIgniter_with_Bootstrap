<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('_membership_link')) {
  function _membership_link($current_user) {
    if($current_user == null){
      $membership_link = array(
        anchor(base_url('Membership/login'), 'Login'),
        anchor(base_url('Membership/signup'), 'Sign up')
      );
    } else {
      $dropdown_attr = array('class' => 'dropdown');

      $carret_attr = array(
        'class' => 'dropdon-toggle',
        'data-toggle' => 'dropdown',
        'aria-expanded' => 'true'
      );

      $dropdown_list = ul(
        array(anchor(base_url('Membership/logout'), 'Logout')),
        array("class" => "dropdown-menu"));

      $dropdown = array(
        'text'=> anchor('#', '<span class="caret"></span>',$carret_attr) . $dropdown_list,
        'attr'=> $dropdown_attr);

      $user_type = $current_user->user_type;
      $user_types = array(
        1 => 'Administrator',
        0 => 'Student',
        2 => 'Teacher',
        3 => 'Librarian'
        );

      $membership_link = array(
        anchor(base_url('Membership/account'), " ($user_types[$user_type]) ".$current_user->surname),
        $dropdown);
    }

    $membership_link_data = array("class" => "nav navbar-nav navbar-right", "id" => "membership");

    return _ul($membership_link,$membership_link_data);
  }

}

if(!function_exists("_nav_links")){
  function _nav_links($current_user){
    $CI =& get_instance();
    $attr = array('class' => 'nav navbar-nav');
    $links = array();

    if($current_user){
      $user_type = $current_user->user_type;

      switch ($user_type) {
        case 0:
          // student
          $links[] = anchor('Books/my_books', 'My Books');
          break;
        case 1:
         // admin
          $links[] = anchor('Admin/dashboard', 'Dashboard');
          $links[] = anchor('Admin/inventory', 'Books');
          $links[] = $CI->load->view('layout/request_nav',null,true);
          break;
        case 2:
         // teacher
          $links[] = anchor('Books/my_books', 'My Books');
          $links[] = anchor('Teacher', 'My students');
          break;
        case 3:
         // librarian
          $links[] = anchor('Books/my_books', 'My Books');
        break;
      }
    }

    return _ul($links,$attr);
  }
}

if(!function_exists("_attributes")){
  function _attributes($attributes = array()){
  	$_attr = "";
		foreach($attributes as $key => $value){
		  $_attr .= $key.'="'.$value.'" ';
		}
  	return $_attr;
  }
}