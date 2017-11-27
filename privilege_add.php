<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
<?php
require_once 'include/func_checkSession.php';
require_once 'include/func_checkHttpref.php';
require_once 'include/class_mysql.php';
if (!$_POST['name']) {?>
    <script>alert('不能为空，请重试！')</script>
    <?php
	header('refresh:0;url='.$_SERVER['HTTP_REFERER']);
	exit;
} else{
    $mysql = new mysql();
    $value = '"'.$_POST['name'].'"';
    $mysql->insert('name', 'xedaojia_usergroup', $value);?>
    <script>alert('添加成功！')</script>
    <?php
    header('refresh:0;url='.$_SERVER['HTTP_REFERER']);
}?>