<?php
namespace Plivo\Controllers;

use Plivo\Controllers\Common;

/*
*	Class for all routing implementations
*/

class Route extends Views
{
	function __construct()
	{

	}

	/* Method : Parse incoming request and returns request and query params */

	public static function parse_uri()
	{
		$request_params = $_SERVER;
		$result = array();

		if (isset($request_params['REQUEST_URI'])) 
		{	
			//Common::write_log(print_r($_SERVER,true));
			Common::write_log("Route:: WEB_URL:".WEB_URL);
			Common::write_log("Route:: set request_uri:".$request_params["REQUEST_URI"]);

			$request_params['REQUEST_URI']  = str_replace(WEB_URL.'/',
												'',
												(!empty($request_params['HTTPS'])?'https':'https').'://'.$request_params['HTTP_HOST'].$request_params['REQUEST_URI']
											);
			Common::write_log("Route:: altered request_uri:".$request_params["REQUEST_URI"]);
		    $request_path = explode('?', $request_params['REQUEST_URI']);
		    Common::write_log("Route::  request_path:".print_r($request_path,true));
		    $result['method'] = $request_params['REQUEST_METHOD'];

		    $result['request'] = utf8_decode(urldecode($request_path[0]));
		    Common::write_log("Route::  result['request'] :".print_r($result,true));
		    if ($result['request'] == basename($request_params['PHP_SELF'])) 
		    {	
		    	Common::write_log(" basename(request_path) equals result[request]");
				$result['request'] = '';
		    }
		    $temp_request_path = explode('/', $result['request']);

		    foreach ($temp_request_path as $key => $value) 
		    {
		    	$result['request_parts'][] = trim($value);
		    }

		    if(isset($request_path[1]))
		    {
		    	$result['query'] = utf8_decode(urldecode($request_path[1]));
			    $vars = explode('&', $result['query']);
			    foreach ($vars as $var) 
			    {
					$t = explode('=', $var);
					if(isset($t[0]) && isset($t[1]))
						$result['query_vars'][$t[0]] = $t[1];
			    }
		    }
			    
		}

		return count($result)>0?array('status' => true, 'message' => 'Parsed URL', 'data' => $result):Common::get_error_message('Request URI not found');
	}

	/* Method : Shows respective page for incoming request */

	public static function initialise($request_params = array())
	{
		$view = 'page_not_found.php';

		if(!empty($request_params['status']))
		{
			if(isset($request_params['data']['request_parts'][0]))
			{
				if(file_exists(VIEWS.'/'.(!empty($request_params['data']['request_parts'][0])?$request_params['data']['request_parts'][0]:'index').'.php'))
				{
					$view = (!empty($request_params['data']['request_parts'][0])?$request_params['data']['request_parts'][0]:'index').'.php';
				}
				elseif(file_exists(VIEWS.'/'.(!empty($request_params['data']['request_parts'][0])?$request_params['data']['request_parts'][0]:'index').'.html'))
				{
					$view = (!empty($request_params['data']['request_parts'][0])?$request_params['data']['request_parts'][0]:'index').'.html';
				}
			}
		}

		return self::require_view($view);
	}
}