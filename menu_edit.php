<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
<?php
require_once 'include/func_checkSession.php';
require_once 'include/func_checkHttpref.php';
require_once 'include/class_mysql.php';
if (!$_POST['menu'] or !$_POST['filepath']) {?>
    <script>alert("提交有错误！")</script>
    <?php
	header('refresh:0;url='.$_SERVER['HTTP_REFERER']);
	exit;
}
$mysql = new mysql();
$set = 'filepath="'.$_POST['filepath'].'",name="'.$_POST['menu'].'"'.',groupid='.$_POST['groupid'];
$where = 'id='.$_GET['id'];
$mysql->update('xedaojia_menu', $set, $where);?>
<script>alert("成功！")</script>
<?php
header('refresh:0;url='.$_SERVER['HTTP_REFERER']);
?>