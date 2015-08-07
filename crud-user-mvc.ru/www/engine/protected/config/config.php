<?php

/**
 * The constants for database.
 */

define("DB_NAME","crudusertest");
define("DB_HOST","localhost");
define("DB_USER_NAME","crudUserTest");
define("DB_USER_PASS","crudUserTest");
define("DSN",'mysql:host='.DB_HOST.';dbname='.DB_NAME);

/**
 * The constants for settings.
 */
/*---- USER ----*/
define("USER_ROLE_ADMIN",1);
<<<<<<< HEAD
define("USER_ROLE_GUEST",0);


/*----- Human-friendly URL ------*/
define("HFURL_ON",true);

/*----- Logs -----*/
define("LOGS_ON",true);

/*----- Generator MVC ------*/
define("GMVC_ON",true);
define("GMVC_PASSWORD","123123");
=======
define("NUM_OF_RECORDS_ON_PAGE",3);
define("USER_ROLE_GUEST",0);

/*---- LANG ----*/
define("DEFAULT_LANG","en"); // or "ru"
define("LANG_PATH","/engine/lang/".DEFAULT_LANG."/lang.php");

/*---- TEMPLATE ----*/
//define("TEMPLATE_PATH","/engine/templates/newTemplate/");
define("TEMPLATE_PATH","/engine/templates/default/");
>>>>>>> ac79de2de9019914f8288aba14b731be14e8b101
