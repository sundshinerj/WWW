<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
<?php
require_once 'include/func_checkSession.php';
require_once 'include/func_checkHttpref.php';
require_once 'include/class_mysql.php';
if (!$_POST['ip'] or !$_POST['host_type'] or !$_POST['host_idc']) {
	header('refresh:0;url='.$_SERVER['HTTP_REFERER']);
	exit;
}else {
$mysql = new mysql();
$value = '"'.$_POST['ip'].'",'.$_POST['host_type'].','.$_POST['host_idc'].',"'.$_POST['use_mark'].'"';
$mysql->insert('hostname,host_type,host_idc,use_mark', 'xedaojia_server', $value);
header('refresh:0;url='.$_SERVER['HTTP_REFERER']);
?>
<script>alert('添加成功！')</script>
<?php 
}
?>