<?php
require 'db.inc.php';
require 'output_functions.inc.php';

$db = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) or 
	die('Unable to connect. Check your connection parameters.');
mysql_select_db(MYSQL_DB, $db) or die(mysql_error($db));

include 'header.inc.php';
output_story($db, $_GET['article_id']);
show_comments($db, $_GET['article_id'], TRUE);
include 'footer.inc.php';
?>
