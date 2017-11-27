<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
<?php
require_once 'include/func_checkSession.php';
require_once 'include/func_checkHttpref.php';
require_once 'include/class_mysql.php';
if (!$_GET['id'] or !$_POST['realname'] or !$_POST['user_group'] or !$_POST['department'] or !$_POST['job']) {?>
    <script>alert('填写信息错误，请重试！')</script>
<?php 
	header('refresh:0;url='.$_SERVER['HTTP_REFERER']);
	exit;
}else {
$mysql = new mysql();

$set = 'realname="'.$_POST['realname'].'",groupid='.$_POST['user_group'].',department="'.$_POST['department'].'",job="'.$_POST['job'].'"';
$where = 'id='.$_GET['id'];
$mysql->update('xedaojia_user', $set, $where); 

?>
<script>alert('更新成功！')</script>
<?php
}
header('refresh:0;url='.$_SERVER['HTTP_REFERER']);
?>