<?php
	$fname = $_GET['fname'];
	//$fname = 11;
	require_once 'include/class_mysql.php';
	$mysql = new mysql();
	$where = 'deploy_info = '."'".$fname."'";
	$result = $mysql->select('deploy_info','xedaojia_deployinfo',$where);
	
	$num = count($result);
	//echo $num;
	if($num != 0 or empty($fname)){
		echo '1';
	}
    else{
		echo '0';
	}
?>