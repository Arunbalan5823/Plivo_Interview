<?php
//require_once __DIR__ . "/../../confing/config.php";
/* 
    This file will handle all API calls coming to the Waagu Plivo server
*/
//use Plivo\Controllers\Common;
set_time_limit(0);
date_default_timezone_set('UTC');
error_reporting(E_ALL);

echo "woking";
$data = json_decode(file_get_contents('php://input'), true);
write_log(print_r($data,true));

if (array_key_exists("destination", $data))) {
    switch($data['destination']){
        case '1000':
                exec("/usr/bin/fs_cli  -x 'originate user/1000 1001' ", $out);
                echo json_encode(array("message"=>"ok"));

            break;
        case '1001':
                exec("/usr/bin/fs_cli  -x 'originate user/1001 1000' ", $out);
                echo json_encode(array("message"=>"ok"));
        default:
            echo json_encode(array("message"=>"error"));
            break;

    }
}else{
     echo json_encode(array("message"=>"error"));
}
function write_log($str){
    
    file_put_contents("log.txt", print_r($data,true));
    //Common::write_log("call_api::".$str);
}