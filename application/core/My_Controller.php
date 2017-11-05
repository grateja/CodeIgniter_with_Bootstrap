<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('account_model');
    $this->load->helper('misc_helper');
    $this->load->helper('list_helper');
  }

  function _output($content) {
    // Load the base template with output content available as $content
    $data['content'] = &$content;

    $current_user = $this->account_model->get_current_user(array('surname','user_type'));

    $data['membership_link'] = _membership_link($current_user);
    // $data['membership_link'] = $this->load->view('layout/user_nav',array('display_name'=>'admin keme'),true);
    $data['nav'] = _nav_links($current_user);

    echo($this->load->view('base', $data, true));
  }

}