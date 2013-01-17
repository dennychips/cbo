<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');
function format_size($size) {
    $units = explode(' ','KB MB GB TB PB');

    $mod = 1024;

    for ($i = 0; $size > $mod; $i++) {
        $size /= $mod;
    }

    $endIndex = strpos($size, ".")+3;

    return substr( $size, 0, $endIndex).' '.$units[$i];
}