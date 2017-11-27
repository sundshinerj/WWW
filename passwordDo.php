<?php
require_once 'include/class_mysql.php';
$mysql = new mysql();
if ($_POST['password']) {
	$set = 'password="'.md5($_POST['password']).'"';
	$where = 'id='.$_SESSION['id'];
	$reslut = $mysql->update('xedaojia_user', $set, $where);
	if ($reslut) {
		echo '<script type="text/javascript">alert("Ok")</script>';
		header('refresh:0;url=index.php');
		exit;
	} else {
		echo '<script type="text/javascript">alert("Error")</script>';
		header('refresh:0;url=index.php');
		exit;
	}
} else {
	echo '<script type="text/javascript">alert("NoData")</script>';
	header('refresh:0;url=index.php');
}
?>