<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function dateformat($datetime, $type = 'date') {
    if($type == 'datetime'){
        return !empty($datetime) ? date('j F Y H:i', strtotime($datetime)) : '';
    } else if($type == 'time'){
        return !empty($datetime) ? date('H:i', strtotime($datetime)) : '';
    } else {
        return !empty($datetime) ? date('d M Y', strtotime($datetime)) : '';
    }
}

function dateformat_db($datetime = '', $type = 'date') {
    if($type == 'datetime'){
        return !empty($datetime) ? date('Y-m-d H:i:s', strtotime($datetime)) : '';
    } else if($type == 'time'){
        return !empty($datetime) ? date('H:i:s', strtotime($datetime)) : '';
    } else {
        return !empty($datetime) ? date('Y-m-d', strtotime($datetime)) : '';
    }
}

function pr($str){
    echo '<pre>';
    print_r($str);
    echo '</pre>';
}