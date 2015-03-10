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
define("USER_ROLE_GUEST",0);


/*----- Human-friendly URL ------*/
define("HFURL_ON",true);

/*----- Logs -----*/
define("LOGS_ON",true);