<?php
	define("DEFAULT_CONTROLLER", "tareas");  
	define("DEFAULT_LAYOUT", "default");

	define("APP_FOLDER", "FrameworkBasico");
	define("APP_URL", "http://".$_SERVER['SERVER_NAME']."/".APP_FOLDER."/");
	define("APP_URL_CSS", APP_URL."views/layout/css/");
	define("APP_URL_IMG", APP_URL."views/layout/img/");
	define("APP_URL_JS", APP_URL."views/layout/js/");

	define("APP_NAME", "Framework");

	define("DB_HOST", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "");
	define("DB_NAME", "gestion");
	define("DB_CHAR", "UTF8");