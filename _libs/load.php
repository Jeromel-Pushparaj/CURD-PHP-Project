<?php
include_once 'include/database.php';
include_once 'include/user.php';
session_start();

global $__site_config;
$__site_config_path = dirname(is_link($_SERVER['DOCUMENT_ROOT']) ? readlink($_SERVER['DOCUMENT_ROOT']) : $_SERVER['DOCUMENT_ROOT']).'/app.json';
$__site_config = file_get_contents($__site_config_path);
function get_config($key, $default = null)
{
    global $__site_config;
    $array = json_decode($__site_config, true);
    if(isset($array[$key])) {
        return $array[$key];
    } else {
        return $default;
    }
}
function loading_templates($name)
{
    print("I am entering ");
    include  $_SERVER['DOCUMENT_ROOT'] . get_config('base_path') . "_templates/$name.php";
}
?>