<?php
header("Content-Type:text/html;charset=utf-8"); 
session_start();
//require_once 'include/func_checkHttpref.php';
require_once 'include/class_mysql.php';
$mysql = new mysql();
if (preg_match('/select|insert|and|or|update|delete|#|\"|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile/', $_POST['name']) != 0) {
	echo '<script type="text/javascript">alert("SQL Inject")</script>';
	//header('refresh:0;url=index.php');
	exit;
}
$where = 'name="'.$_POST['name'].'" and password="'.md5($_POST['password']).'"';
$id = $mysql->select('id', 'xedaojia_user', $where);
if ($id[0]['id']) {
	$_SESSION['id'] = $id[0]['id'];
	$_SESSION['name'] = $_POST['name'];
    header('refresh:0;url=index.php');
}else {
    echo '<script type="text/javascript">alert("用户名或密码错误，请重试！")</script>';
    header('refresh:0;url=login.php');
}
?>