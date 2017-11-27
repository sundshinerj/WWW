<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
<?php
require_once 'include/func_checkSession.php';
require_once 'include/func_checkHttpref.php';
require_once 'include/class_mysql.php';
if (!$_POST['menu'] or !$_POST['file']) {?>
    <script>alert("提交参数有误！");</script>
    <?php
	header('refresh:0;url='.$_SERVER['HTTP_REFERER']);
	exit;
}
$mysql = new mysql();
$value = '"'.$_POST['menu'].'","'.$_POST['file'].'",'.$_POST['menugid'];
$mysql->insert('name,filepath,groupid', 'xedaojia_menu', $value);?>
<script>alert("添加成功！")</script>
<?php
header('refresh:0;url='.$_SERVER['HTTP_REFERER']);
?>