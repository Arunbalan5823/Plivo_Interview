<?php
namespace Plivo\Controllers;
use Plivo\Controllers\Plivo;
use Plivo\Controllers\Common;
/*
*	Class for all common implementaions
*/

class Common{
	public static $is_logging_enabled = false;
	function __construct(){

	}

	/* Method : Returns standard formatted error message */

	public static function get_error_message($message){
		return array('status'=>false, 'message' => $message);
	}
	public static function write_log($string =""){
		file_put_contents(PUB."/log.txt", "\n[".date(DATE_RFC850,time())."]\t".$string,FILE_APPEND);			
	}
	public static function send_post_request($url="",$params=array()){
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
		if(count($params)>=0)
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		$resp =  curl_exec($ch);
		curl_close($ch);
		return $resp;
	}
	public static function give_json_response($type,$message,$data=""){
		if(empty($data)){
			echo json_encode(array('status'=>$type,'message'=>$message));
		}else{
			echo json_encode(array('status'=>$type,'message'=>$message,"data"=>$data));
		}
		
	}
}
