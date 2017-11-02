<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('account_model');
    $this->load->helper('list_helper');
  }

  function _membership_link(){
    $current_user = $this->account_model->get_current_user('surname');

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
      $membership_link = array(
        anchor(base_url('Membership/account'), $current_user),
        $dropdown);
    }

    $membership_link_data = array("class" => "nav navbar-nav navbar-right", "id" => "membership");

    return _ul($membership_link,$membership_link_data);
  }

  function _output($content) {
    // Load the base template with output content available as $content
    $data['content'] = &$content;

    $data['membership_link'] = $this->_membership_link();

    echo($this->load->view('base', $data, true));
  }

}