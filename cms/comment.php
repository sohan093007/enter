<?php
require 'db.inc.php';
require 'output_functions.inc.php';
include 'header.inc.php';

$db = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) or 
	die ('Unable to connect. Check your connection parameters.');
mysql_select_db(MYSQL_DB, $db) or die(mysql_error($db));

$article_id = (isset($_GET['article_id']) && ctype_digit($_GET['article_id'])) ? $_GET['article_id'] : '';

output_story($db, $article_id);
?>
<h3>Add a comment</h3>
<form method="POST" action="transact_article.php">
	<div>
		<label for="comment_text">Comment:</label><br />
		<textarea id="comment_text" name="comment_text" rows="10" cols="60"></textarea><br />
		<input type="submit" name="action" value="Submit Comment" />
		<input type="hidden" name="article_id" value="<?php echo $article_id; ?>" />
	</div>
</form>
<?php
show_comments($db, $article_id, FALSE);
include 'footer.inc.php';
?>
