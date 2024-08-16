<?php
include('_libs/load.php');
$arr[1] = 0;
print_r($arr); 
print_r(get_config('base_path'));

$path = $_SERVER['DOCUMENT_ROOT']. "/first_app/_templates/$name.php";
$__site_config_path = dirname(is_link($_SERVER['DOCUMENT_ROOT']) ? readlink($_SERVER['DOCUMENT_ROOT']) : $_SERVER['DOCUMENT_ROOT']).'/photogramconfig.json';

printf($path);
printf($__site_config_path);


$path = $_SERVER['DOCUMENT_ROOT'] . get_config('base_path') . "/_templates/$name.php";
printf($path);
printf($__site_config_path);
print(loading_templates("header"));

// ?>

<pre>
    <?php
session_start();
print_r($_SESSION);
print_r($_SERVER);
print($_SERVER['PHP_SELF']);
?>
