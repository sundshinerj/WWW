<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
<?php
require_once 'include/func_checkSession.php';
require_once 'include/func_checkHttpref.php';
require_once 'include/class_mysql.php';

if (!$_POST['name'] or !$_POST['realname'] or !$_POST['user_group'] or !$_POST['department'] or !$_POST['job']) {?>
    <script>alert("表单选项不能有空，请重试！")</script>
<?php    
	header('refresh:0;url='.$_SERVER['HTTP_REFERER']);
	exit;
}else {
$mysql = new mysql();
$password = md5('123456');
$value = '"'.$_POST['name'].'","'.$_POST['realname'].'","'.$_POST['user_group'].'","'.$_POST['department'].'","'.$_POST['job'].'","'.$password.'"';
$mysql->insert('name,realname,groupid,department,job,password', 'xedaojia_user', $value);?>
<script>alert("添加用户成功！")</script>
<?php
}
header('refresh:0;url='.$_SERVER['HTTP_REFERER']);
?>