<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
<?php
require_once 'include/func_checkSession.php';
require_once 'include/func_checkHttpref.php';
require_once 'include/class_mysql.php';
if (!$_GET['hostname']) {
	header('refresh:0;url='.$_SERVER['HTTP_REFERER']);
	exit;
}else {
$mysql = new mysql();
$where = 'hostname="'.$_GET['hostname'].'"';
$mysql->delete('xedaojia_server', $where);?>
<script>alert('删除成功！')</script>
<?
header('refresh:0;url='.$_SERVER['HTTP_REFERER']);
}?>

