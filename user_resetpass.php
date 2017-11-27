<?php
require_once 'include/func_checkSession.php';
require_once 'include/func_checkHttpref.php';
require_once 'include/class_mysql.php';
if (!$_GET['id']) {
	header('refresh:0;url='.$_SERVER['HTTP_REFERER']);
	exit;
}
$mysql = new mysql();
$password = md5('123456');
$set = 'password="'.$password.'"';
$where = 'id='.$_GET['id'];
$mysql->update('xedaojia_user', $set, $where);
header('refresh:0;url='.$_SERVER['HTTP_REFERER']);
?>