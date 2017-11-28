<?php
date_default_timezone_set("PRC");
header("Content-Type: text/html; charset=utf-8");
require_once 'include/func_checkSession.php';
require_once 'include/func_checkHttpref.php';
require_once 'include/class_mysql.php';
$mysql = new mysql();

$deploy_user = $_SESSION['name'];
if($_POST['do'] == '删除'){
    $where = 'deploy_time="'.$_POST['deploy_time'].'"';
    $mysql->delete('xedaojia_deployinfo', $where);?>
    <script>alert("删除完成！")</script>
<?php
}else {
    //获取要部署的中控机IP
    $where = 'deploy_time="'.$_POST['deploy_time'].'"';
    $pf_name = $mysql->select('distinct(pf_name)','xedaojia_deployinfo',$where);
    $where = 'b_name="'.$pf_name[0]['pf_name'].'"';
    $control_ip = $mysql->select('distinct(control_ip)','xedaojia_businessunit',$where);
    //echo $control_ip[0]['control_ip'];
    //生成要部署的IP的列表
    $where = 'deploy_time="'.$_POST['deploy_time'].'"';
    $deploy_ip = $mysql->select('hostname,deploy_info','xedaojia_deployinfo',$where);
    $ip = '';
    foreach($deploy_ip as $value){
        $ip .= $value['hostname']."\n";	
        file_put_contents('deploy_ip.txt',$ip);
	}
    //执行部署操作
    exec('/usr/bin/python /home/controll/ams.py -c '.$control_ip[0]['control_ip'].' -e "'.$_POST['cmd'].$pf_name[0]['pf_name'].'" -f /var/www/html/deploy_ip.txt',$deploy_log);
    
    //写入日志
    for($i=0;$i<count($deploy_log);$i++){
        $str = $deploy_log[$i];
        $str_1 = explode("'",$str);
        $mysql->update('hostname,deploy_info,deploy_log','deploy_info',"'".$str_1[1]."','".$_GET['pf_name']."','".$str_1[3]."'",$getid = false);
        $set = 'deploy_log = '."'".$str_1[3]."'".'deploy_time="'.date('Y-m-d H:i:s').'"'.'deploy_user="'.$deploy_user.'"';
        $where = 'hostname = '."'".$str_1[1]."'";
        $mysql->update('deploy_info,deploy_time,deploy_user',$set,$where);
    }
    //更新日志
    //$where = 'deploy_time="'.$_POST['deploy_time'].'" and pf_name="'.$pf_name[0]['pf_name'].'"';
    //$set = 'deploy_time="'.date('Y-m-d H:i:s').'",deploy_user="'.$deploy_user.'"';
    //$mysql->update('xedaojia_deployinfo',$set,$where);
    ?>
    <script>alert("代码正在后台部署，稍后请查看相关日志！")</script>
<?php }?>

<?php header('refresh:0;url='.$_SERVER['HTTP_REFERER']);?>
