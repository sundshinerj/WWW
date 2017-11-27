<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
<?php
require_once 'include/func_checkSession.php';
require_once 'include/func_checkHttpref.php';
require_once 'include/class_mysql.php';
if (!$_POST['name'] or !$_POST['menugid']) {
	header('refresh:0;url='.$_SERVER['HTTP_REFERER']);
	exit;
}
$mysql = new mysql();
//$set = 'use_mark="'.$_POST['use_mark'].'",host_type='.$_POST['host_type'].',host_idc='.$_POST['host_idc'];
//$where = 'hostname="'.$_GET['hostname'].'"';
//$query = 'update '.'xedaojia_server'.' set '.$set.' where '.$where;
//$mysql->update('xedaojia_server', $set, $where);
$set = 'name="'.$_POST['name'].'",menugid="'.$_POST['menugid'].'"';
$where = 'id='.$_GET['id'];
$mysql->update('xedaojia_usergroup',$set, $where);


header('refresh:0;url='.$_SERVER['HTTP_REFERER']);
?>
<script>alert('更新成功！')</script>