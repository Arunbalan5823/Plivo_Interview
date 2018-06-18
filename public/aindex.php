<?php
require_once(__DIR__."/../loader.php");
use Plivo\Controllers\Route;
use Plivo\Controllers\Common;

Common::write_log("Index.php executing request uri:".$_SERVER['REQUEST_URI']);
$result = Route::parse_uri();
Common::write_log("The result of parse_uri is :".print_r($result, true));
$request = (!empty($result['data']['request_parts']))?$result['data']['request_parts']:array();
$method = $result['data']['method'];

require_once(Route::initialise($result));
?>
