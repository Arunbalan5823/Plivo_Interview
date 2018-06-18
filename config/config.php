<?php
set_time_limit(0);
date_default_timezone_set('UTC');
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('WEB_URL', "http://18.188.212.222/api");
define('VCS_API',WEB_URL.'/api_handler');

define('BASE_DIR', dirname(__DIR__));
define('CONTROLLERS', BASE_DIR.'/controller');
define('PUB', BASE_DIR.'/public');
define('VIEWS_URL', WEB_URL.'/views');
define('TWILIO_SYNC_SERVICE_SID','');
define('VIEWS', PUB.'/views');
$base_path 		= "/var/www/html/app/";

?>