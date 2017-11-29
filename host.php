<?php
require_once 'include/func_checkSession.php';
require_once 'include/class_mysql.php';
$mysql = new mysql();
$host = $mysql->select('distinct(hostname),host_type,host_idc,use_mark', 'xedaojia_server', '1 order by hostname');
$host_type = $mysql->select('*', 'xedaojia_hosttype');
$host_idc = $mysql->select('*', 'xedaojia_idc');
$use_type = $mysql->select('*', 'xedaojia_businessunit');
?>

<div>
    <div>
        <div>
            <p>系统管理>>资产管理</p>
        </div>
        <div>
	    <table class="table table-striped">
                <thead>
                    <tr>
                        <th>IP</th>
                        <th>设备类型</th>
                        <th>设备位置</th>
                        <th>使用状态</th>
                        <th>操作</th>
                    </tr>
                </thead>
				<tfoot>
					<tr>
						<form action="host_add.php" method="post" id="adduser">
							<td><input type="text" name="ip" id="ip"></td>
							<td>
								<select name="host_type" id="host_type" style="width:90px">
									<?php for ($k = 0; $k < count($host_type); $k++) {?>
										<option value="<?php echo $host_type[$k]['id']?>"><?php echo $host_type[$k]['name']?></option>
									<?php }?>
								</select>
							</td>
                            
							<td>
                                <select name="host_idc" id="host_idc" style="width:80px">
									<?php for ($k = 0; $k < count($host_idc); $k++) {?>
										<option value="<?php echo $host_idc[$k]['id']?>"><?php echo $host_idc[$k]['name']?></option>
									<?php }?>
								</select>
							</td>
							<td><input type="text" name="use_mark" id="use_mark"></td>
							<td><input type="submit" style="width:80px" class="button" value="Add"/></td>
						</form>
					</tr>
				</tfoot>
				<tbody>
					<?php for ($i = 0; $i < count($host); $i++) {?>
						<tr>
							<form action="host_edit.php?id=<?php echo $host[$i]['id']?>&hostname=<?php echo $host[$i]['hostname']?>" method="post">
								<td><?php echo $host[$i]['hostname']?></td>
								<td>
									<select name="host_type" id="host_type" style="width:90px">
										<?php for ($k = 0; $k < count($host_type); $k++) {
											if ($host_type[$k]['id'] == $host[$i]['host_type']) {?>
											<option selected="selected" value="<?php echo $host_type[$k]['id']?>"><?php echo $host_type[$k]['name']?></option>
										<?php } else {?>
											<option value="<?php echo $host_type[$k]['id']?>"><?php echo $host_type[$k]['name']?></option>
										<?php }}?>
									</select>
								</td>
								<td>
									<select name="host_idc" id="host_idc" style="width:80px">
										<?php for ($k = 0; $k < count($host_idc); $k++) {
											if ($host_idc[$k]['id'] == $host[$i]['host_idc']) {?>
											<option selected="selected" value="<?php echo $host_idc[$k]['id']?>"><?php echo $host_idc[$k]['name']?></option>
										<?php } else {?>
											<option value="<?php echo $host_idc[$k]['id']?>"><?php echo $host_idc[$k]['name']?></option>
										<?php }}?>
									</select>
								</td>
								<td><input type="text" name="use_mark" id="use_mark" value="<?php echo $host[$i]['use_mark']?>"></td>
								<td>
								
									<!-- Icons -->									
									<input type="submit" value="更新">
									<a href="host_del.php?hostname=<?php echo $host[$i]['hostname']?>" title="删除">删除</a> 
									
								</td>
							</form>
						</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>	
				
