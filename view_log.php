<?php
require_once 'include/func_checkSession.php';
require_once 'include/class_mysql.php';
$mysql = new mysql();
$deploy_log = $mysql->select('distinct(deploy_info),pf_name,deploy_time','xedaojia_deployinfo');
?>

<div>
<?php
    if( $_GET['deploy_time']){
        $deploy_time = $_GET['deploy_time'];
        $pf_name = $_GET['pf_name'];
        $where = 'deploy_time="'.$deploy_time.'" and pf_name="'.$pf_name.'"';
        $deployinfo_include = $mysql->select('*','xedaojia_deployinfo',$where);
    
?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>服务器IP</th>
                    <th>所属平台</th>
                    <th>列表信息</th>
                    <th>部署时间</th>
                    <th>部署日志</th>
                    <th>操作人</th>
                </tr>
			</thead>
            <tbody>
                
                <?php
                for($i=0;$i<count($deployinfo_include);$i++)
                {?>
                <tr>
                    <td><?php echo $deployinfo_include[$i]['hostname'];?></td>
                    <td><?php echo $deployinfo_include[$i]['pf_name'];?></td>
                    <td><?php echo $deployinfo_include[$i]['deploy_info'];?></td>
                    <td><?php echo $deployinfo_include[$i]['deploy_time'];?></td>
                    <td><?php echo $deployinfo_include[$i]['deploy_log'];?></td>
                    <td><?php echo $deployinfo_include[$i]['deploy_user'];?></td>
                </tr>
                <?php }                
                ?>
                
            </tbody>
        </table>


<?php }else {?>

    <div>
        <p style="font-size:14px; font-weight:bold;  margin:30px;">请选择部署名称</p>
		<p style="font-size:14px;text-align:center; margin:10px 0 40px 0; color:#222">
        <?php
        for($i=0;$i<count($deploy_log);$i++)
        {
        ?>
        <a class="btn btn-default" href="index.php?id=<?php echo $_GET['id']?>&deploy_time=<?php echo $deploy_log[$i]['deploy_time'] ;?>&pf_name=<?php echo $deploy_log[$i]['pf_name']?>"><input type="button" style="width:150px" class="button" value="<?php echo $deploy_log[$i]['deploy_info']; ?>"/></a>
        <?php
        }
        ?>
    </div>
<?php }?>
</div>

