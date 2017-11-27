<?php 
require_once 'include/func_checkSession.php';
require_once 'include/class_mysql.php';
$mysql = new mysql();
$deploy_list = $mysql->select('distinct(deploy_time),deploy_info,pf_name','xedaojia_deployinfo');
//var_dump($deploy_list);
?>

<div>
	<div>
		<div>
			<p>列表部署</p>
		</div>
		<div>			
			<div> 
				<div class="alert alert-success fade in">请选择你要部署的列表</div>
			</div>
			<form  action="deploy_listDo.php" method="POST">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>选择按钮</th>
							<th>列表名</th>
							<th>最后更新时间</th>
							<th>平台</th>
                            <th>ip列表</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
                            <td colspan="4" style="text-align:right">
                                <input type="submit" style="width:80px" class="button" value="部署" name="do"/></td>
                                <td>
                                <input type="submit" style="width:80px" class="button" value="删除" name="do"/></td>
                            
                        </tr>
					</tfoot>
					<tbody>
					<?php
						for($i = 0;$i < count($deploy_list); $i++)
						{
                            $where = 'pf_name="'.$deploy_list[$i]['pf_name'].'" and deploy_time="'.$deploy_list[$i]['deploy_time'].'"';
                            $iplist = $mysql->select('hostname','xedaojia_deployinfo',$where);
                            //print_r($iplist);
                    ?>
						<tr>
							<td><input type="radio" value="<?php echo $deploy_list[$i]['deploy_time']; ?>" name="deploy_time"></td>
							<td><?php echo $deploy_list[$i]['deploy_info']; ?></td>
							<td><?php echo $deploy_list[$i]['deploy_time']; ?></td>
							<td><?php echo $deploy_list[$i]['pf_name']; ?></td>
                            <td><?php for($j=0;$j<count($iplist);$j++){ echo $iplist[$j]['hostname'];echo "</br>";}; ?></td>
						</tr>
					<?php
						}
					?>
					</tbody>
				</table>
			</form>
		</div>
	</div>
</div>	