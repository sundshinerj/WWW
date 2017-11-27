<?php
session_start();
if ($_SESSION['id'] >= 1) {
} 
else {
	echo '<script type="text/javascript">alert("IllegalAccess")</script>';
	header('refresh:0;url=index.php');
	exit;
}
?>