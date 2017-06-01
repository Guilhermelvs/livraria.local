<?php

define("BASE_URL", "http://cresspe.org.br/ouvidoria/");
define("ADM_URL", BASE_URL . "index.php");

define("BASE_PATH", dirname(__FILE__) . '/');
define("CONTROL_PATH", 'control/');
define("MODEL_PATH", 'model/');
define("VIEW_PATH", 'view/');

define("PHOTO_PATH", VIEW_PATH . 'public/thumbs_photos/');
define("IMG_PATH", BASE_URL . VIEW_PATH . 'public/img/');
define("CSS_PATH", BASE_URL . VIEW_PATH . 'public/css/');
define("JS_PATH", BASE_URL . VIEW_PATH . 'public/js/');

define("DB_HOST", 'mysql04.cresspe.org.br');
define("DB_USER", 'cresspe13');
define("DB_PASS", 'conselho123@');
define("DB_NAME", 'cresspe13');

define("EMPRESA", 'Sistema Ouvidoria - CRESSPE');

define("CODE_VIEW", 2);
define("CODE_ACTION", 3);

date_default_timezone_set('America/Bahia');