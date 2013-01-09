<?php 

function recent_item($type, $table, $limit = ''){
	$CI =& get_instance();
	$CI->load->model($type.'_model', $type);
	$items = $CI->$type->get_recent_item($table, $limit);
	return $items;
}