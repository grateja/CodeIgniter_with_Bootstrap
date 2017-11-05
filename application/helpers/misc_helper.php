<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('_membership_link')) {
  function _membership_link($current_user) {
    $CI =& get_instance();

    $data = $current_user == null ? null : array('display_name' => $current_user->surname);
    return $CI->load->view('layout/user_nav',$data,true);
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