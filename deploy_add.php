<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
<?php
require_once 'include/func_checkSession.php';
require_once 'include/func_checkHttpref.php';
require_once 'include/class_mysql.php';

if(!$_POST['fname'] or !$_POST['fname_ip']){?>
    <script>alert("检查参数！")</script>
<?php
}
//header('refresh:0;url='.$_SERVER['HTTP_REFERER']);
print_r($_POST);
$mysql = new mysql();
$value = '"'.$_POST['fname'].'"';
$mysql->insert('b_name','xedaojia_businessunit',$value);
//$mysql->insert('hostname,s_port,business_id','xedaojia_server',$value);
$where = 'b_name="'.$_POST['fname'].'"';
$business_id = $mysql->select('id','xedaojia_businessunit',$where)[0]['id'];
print_r($business_id);

//$iplist = explode(';',$_POST['fname_ip']);
//print_r($iplist);
//print_r(explode(':',(explode(';',$iplist)[0])));
//for($i=0;$i<count($iplist);$i++){
//    $ip = explode(':',$iplist[$i])[0];
//    echo $ip;
//print_r($_POST);
if(strpos($_POST['fname_ip'],';') == true ){
    if(preg_match("/.;$/",$_POST['fname_ip']) == true){?>
        <script>alert("不能以;结尾")</script>
<?php
        header('refresh:0;url='.$_SERVER['HTTP_REFERER']);
    }else {
        $iplist = explode(';',$_POST['fname_ip']);
        for($i=0;$i<count($iplist);$i++){
            if(strpos($iplist[$i],':') == true){
                $ip = explode(':',$iplist[$i])[0];
                $s_port = explode(':',$iplist[$i])[1];
                $value = '"'.$ip.'",'.$s_port.','.$business_id;
                $mysql->insert('hostname,s_port,business_id','xedaojia_server',$value);
            }else {
                $ip = explode(':',$iplist[$i])[0];
                $value = '"'.$ip.'",'.$business_id;
                $mysql->insert('hostname,business_id','xedaojia_server');
            }
        }
    }
}else{
    if(strpos($iplist[$i],':') == true){
        $ip = explode(':',$iplist[$i])[0];
        $s_port = explode(':',$iplist[$i])[1];
        $value = '"'.$ip.'","'.$s_port.'",'.$business_id;
        $mysql->insert('hostname,s_port,business_id','xedaojia_server');
    }else {
        $ip = explode(':',$iplist[$i])[0];
        $value = '"'.$ip.'",'.$business_id;
        $mysql->insert('hostname,business_id','xedaojia_server');
    }
}
?>