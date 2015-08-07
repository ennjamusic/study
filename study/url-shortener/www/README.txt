System requirements:

- PHP5(support CURL, PDO)
- MySQL
- Apache

The installation process:

1) Create a database, create an user with all privilegies, create a table with 3 fields: id, long_url, short_code. The dump of my table is located on https://github.com/DmitryTelepnev/study/tree/master/study/url-shortener/www/tbl_url_shortener.sql
2) Unpack the archive "url-shortener.rar"
3) Change the settings on yourSiteDirectory/config/config.php :
	- DB_NAME
	- DB_USER_NAME
	- DB_USER_PASS
	- SHORT_URL_TABLE if it is need.
4) Launch your browser and go to http://yourdomain/