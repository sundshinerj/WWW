<?php
require_once 'include/class_mysql.php';
$mysql = new mysql();
$business_array = $mysql->select('id,b_name','xedaojia_businessunit');
for ($b_id=0;$b_id<count($business_array);$b_id++){
    echo "</br>22222222</br>";
    echo $business_array[$b_id]['id'];
    $where = "business_id=".$business_array[$b_id]['id'];
    echo $where;
    $server_array = $mysql->select('hostname,s_status','xedaojia_server','business_id='.$business_array[$b_id]['id']);
    echo "</br>aaaaaa</br>";
}
?>