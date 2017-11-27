<?php
require_once 'include/func_checkSession.php';
require_once 'include/func_checkHttpref.php';
require_once 'include/class_mysql.php';
if (!$_GET['id']) {
	header('refresh:0;url='.$_SERVER['HTTP_REFERER']);
	exit;
}
$mysql = new mysql();
$where = 'id='.$_GET['id'];
$mysql->delete('xedaojia_usergroup', $where);?>
<script>alert('删除成功！')</script>
<?php
header('refresh:0;url='.$_SERVER['HTTP_REFERER']);
?>