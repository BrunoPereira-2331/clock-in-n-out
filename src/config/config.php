<?php

date_default_timezone_set('America/Sao_paulo');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');

define("DAILY_TIME", 60 * 60 * 8);

define('MODEL_PATH', realpath(dirname(__FILE__) . '/../models'));
define('VIEW_PATH', realpath(dirname(__FILE__) . '/../views'));
define('TEMPLATE_PATH', realpath(dirname(__FILE__) . '/../views/template'));
define('CONTROLLER_PATH', realpath(dirname(__FILE__) . '/../controllers'));
define('EXCEPTION_PATH', realpath(dirname(__FILE__) . '/../exceptions'));
define('UTILS_PATH', realpath(dirname(__FILE__) . '/../utils'));

require_once(realpath(dirname(__FILE__). "/Database.php"));
require_once(realpath(dirname(__FILE__). "/loader.php"));
require_once(realpath(dirname(__FILE__). "/session.php"));
require_once(realpath(UTILS_PATH. "/dateUtils.php"));
require_once(realpath(UTILS_PATH. "/utils.php"));
require_once(realpath(MODEL_PATH. "/Model.php"));
require_once(realpath(MODEL_PATH. "/User.php"));
require_once(realpath(EXCEPTION_PATH. "/AppException.php"));
require_once(realpath(EXCEPTION_PATH. "/ValidationException.php"));

?>