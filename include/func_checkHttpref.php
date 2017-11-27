<?php 
define('HTTPREF', 'http://localhost/index.php');
$httpref = explode('?', $_SERVER['HTTP_REFERER']);
if ($httpref[0] != HTTPREF) {
	echo '<script type="text/javascript">alert("IllegalAction")</script>';
	header('refresh:0;url=index.php');
	exit;
}
?>
