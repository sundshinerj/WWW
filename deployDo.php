<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
<?php 
date_default_timezone_set("PRC");
require_once 'include/func_checkSession.php';
require_once 'include/func_checkHttpref.php';
require_once 'include/class_mysql.php';
$mysql = new mysql();
$array_ip = count($_POST['ip_list']);

//取部署的平台的名字,中控机ip
$where = 'id = '."'".$_POST['pf_id']."'";
$pf_name = $mysql->select('b_name,control_ip','xedaojia_businessunit',$where);

//循环插入部署的IP和部署列表内容到表里
for($i = 0;$i < $array_ip ;$i++ ){
	$mysql->insert('hostname,deploy_info,deploy_time,pf_name','xedaojia_deployinfo',"'".$_POST['ip_list'][$i]."','".$_POST['fname']."','".date('Y-m-d H:i:s')."','".$pf_name[0]['b_name']."'",$getid = false);
}
header('refresh:0;url='.$_SERVER['HTTP_REFERER']);
?>
