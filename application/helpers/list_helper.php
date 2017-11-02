<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('_ul')) {
  function _ul($list,$attributes = array()) {
  	$_attributes = _attributes($attributes);
  	$_item = "";
  	foreach ($list as $item) {
  		if(is_array($item)){
  			$_item .= "<li " . _attributes($item['attr']) . " >" . $item['text'] . "</li>\n";
  		} else {
  			$_item .= "<li>$item</li>";
  		}
  	}
  	return "<ul $_attributes >$_item</ul>";
  }
  function _attributes($attributes = array()){
  	$_attr = "";
		foreach($attributes as $key => $value){
		  $_attr .= $key.'="'.$value.'" ';
		}
  	return $_attr;
  }
}