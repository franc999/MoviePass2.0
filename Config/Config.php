<?php
namespace Config;

define("ROOT", dirname(__DIR__) . "/");
define("FRONT_ROOT","/MoviePass/");
define("VIEWS_PATH","Views/");
define("CSS_PATH", FRONT_ROOT.VIEWS_PATH . "layout/styles/");
define("SCRIPT_PATH", FRONT_ROOT.VIEWS_PATH . "layout/scripts/");
define("IMG_PATH", FRONT_ROOT.VIEWS_PATH . "layout/img/");

define ("DB_HOST", "localhost");
define ("DB_NAME", "MoviePass");
define ("DB_PASS", "");
define ("DB_USER", "root");

?>