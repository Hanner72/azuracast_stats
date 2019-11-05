<?php
###################################################################
#
#	Statistik Script für AzuraCast und IceCast
#
#	Autor: Johann Danner
#	Version: 
#
#	INCLUDE: Config.inc.php in Datei einbinden
#	require_once("inc/config.inc.php");   
#	include ("inc/config.inc.php");
###################################################################


##################  USER EINSTELLUNGEN  ###########################

define('DB_HOST', 'mysql80b.ssl-net.net');
define('DB_USER', 'h13u228');
define('DB_PASS', 'Da05nnerj12');
define('DB_NAME', 'h13u228_stats');

###################################################################
##############  AB HIER NICHTS MEHR ÄNDERN  #######################
###################################################################

##### Datenbankverbindungen #####

$pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USER, DB_PASS);
$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
