<?
session_start();
header('Content-Type: text/html; charset=utf-8');
define('main_path' , dirname(__FILE__) .'/app');
define('root' , dirname(__FILE__) );
include root .'/config.php';
include main_path . '/controllers/FrontController.php';
include root .'/lib/templates.class.php';

// switch all err
//ini_set('display_errors','On');
//error_reporting(E_ALL | E_STRICT);

require_once(root.'/lib/backetcard.class.php');
// print_r(Bucket::getBucketList());
$app = FrontController::getInstance();
$app->run();

