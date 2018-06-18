<?php
namespace Plivo\Controllers;

use Plivo\Controllers\Common;
/*
*	Class for all view implementations
*/

class Views{
	function __construct(){
	}

	/* Method : Includes a page as iframe */

	public static function include_view($script){
		$view = 'page_not_found';

		if(file_exists(VIEWS.'/'.$script)){
			$view = $script;
		}

		echo '<object type="text/html" data="'.VIEWS_URL.'/'.$view.'"></object>';
	}

	/* Method : Returns the script name if exits */

	public static function require_view($script){
		$view = 'page_not_found';

		if(file_exists(VIEWS.'/'.$script)){
			$view = $script;
		}

		return VIEWS.'/'.$view;
	}
}
?>

