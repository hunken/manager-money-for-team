<?php

/**
 * Return error code
 *
 * @param int $error
 * @return string Error code encoded
 */
function return_http_code($http_code) {
    switch ($http_code) {
        case 400 :
            $log      = "No files sent";
            $log_text = 'error';
            break;
        default :
            $log      = "Bad request";
            $log_text = 'error';
    }

    $return = array(
        'status'  => $http_code,
        $log_text => $log
    );
    echo json_encode($return);
    exit();
}

/**
 * Format address of client
 *
 * @param string $address
 * @return string
 */
function format_address($address) {
    $output = str_replace(array('http://', 'https'), '', $address);
    return $output;
}

/**
 * Check IsJSON
 *
 */
function isJSON($string) {
    return is_string($string) && is_array(json_decode($string, true)) ? true : false;
}

function v($a) {
    var_dump($a);
}

function p($a) {
    echo "<pre>";
    print_r($a);
    echo "</pre>";
}

/**
 *
 * @param type $authetication_info
 */
function format_authentication_info($authetication_info) {
    $info = base64_decode($authetication_info);
    return json_decode($info);
}

/**
 *
 * @param type $size
 * @return String Display size ( Byte, KB, MB )
 */
function server_api_dislay_size($size) {
    if ($size < 1024) {
        $size = $size . ' Byte';
    } else if ($size < 1024 * 1024) {
        $size = number_format($size / (1024), 2);
        $size = $size . ' KB';
    } else {
        $size = number_format($size / (1024 * 1024 ), 2);
        $size = $size . ' MB';
    }
    return $size;
}

/**
 * Format permission on site
 *
 * @return String Role with permission
 */
function format_permission($permission) {
    $role;
    switch ($permission) {
        case 30:
            $role = trans('users.staff');
            break;
        case 60:
            $role = trans('users.manager');
            break;
        case 90:
            $role = trans('users.admin');
            break;
        case 100:
            $role = trans('users.super_admin');
            break;
        default :
            $role = trans('users.internship');
    }
    return $role;
}

/*
 * Format object Mongo time to d-m-Y format
 *
 * @param Object Date Mongo
 */
function format_time_to_date($time) {
    $created         = $time->toDateTime();
    return $created->format('d-m-Y');
}

/*
 * Format object Mongo time to d-m-Y h:i:s format
 *
 * @param Object Date Mongo
 */
function format_time_to_datetime($time) {
    $created         = $time->toDateTime();
    return $created->format('d-m-Y h:i:s');
}

function format_json_to_string($stringJSON) {
    $array = json_decode($stringJSON, true);
    $string = "";
    foreach ($array as $element){
        if(!empty($string)){
            $string = $string .", " .  $element;
        } else{
            $string = $element;
        }
    }
    return $string;
}
