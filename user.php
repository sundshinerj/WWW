<?php
require_once 'include/func_checkSession.php';
require_once 'include/class_mysql.php';
$mysql = new mysql();
$user = $mysql->select('*', 'xedaojia_user');
$user_group = $mysql->select('*', 'xedaojia_usergroup');
?>


<div >
	<div >
		<div>
			<p>系统管理>>用户管理</p>
		</div>
		<div>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>用户</th>
						<th>姓名</th>
						<th>用户组</th>
						<th>部门</th>
						<th>职务</th>
						<th>操作</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<form action="user_add.php" method="post" id="adduser">
							<td>#</td>
							<td><input type="text" name="name" id="name" style="width:110px"></td>
							<td><input type="text" name="realname" id="realname" style="width:110px"></td>
							<td>
                                <select name="user_group" id="user_group" style="width:110px">
                                    <?php for($i=0;$i<count($user_group);$i++){?>
                                        <option value="<?php echo $user_group[$i]['id']?>"><?php echo $user_group[$i]['name']?></option>
                                    <?php }?>
                                </select>
                            </td>
							<td><input type="text" name="department" id="department" style="width:110px"></td>
							<td><input type="text" name="job" id="job" style="width:110px"></td>
							<td><input type="submit" style="width:80px" class="button" value="Add"/></td>
						</form>
					</tr>
				</tfoot>
				<tbody>
					<?php for ($i = 0; $i < count($user); $i++) {?>
						<tr>
							<form action="user_edit.php?id=<?php echo $user[$i]['id']?>" method="post" id="user<?php echo $user[$i]['id']?>">
								<td><?php echo $user[$i]['id']?></td>
								<td  style="width:110px"><?php echo $user[$i]['name']?></td>
								<td><input type="text" name="realname" id="realname" value="<?php echo $user[$i]['realname']?>" style="width:110px"></td>
								<td>
                                    <select name="user_group" id="user_group" style="width:110px">
                                        <?php
                                        for($k=0;$k<count($user_group);$k++){
                                            if($user[$i]['groupid'] == $user_group[$k]['id'])
                                            {?> 
                                                <option value="<?php echo $user_group[$i]['id']?>"><?php echo $user_group[$i]['name']?></option>
                                            <?php
                                            }else{?>
                                                <option value="<?php echo $user_group[$k]['id']?>"><?php echo $user_group[$k]['name']?></option>
                                            <?php
                                            }}; 
                                        ?>
                                    </select>
                                </td>
								<td><input type="text" name="department" id="department" value="<?php echo $user[$i]['department']?>"  style="width:110px"></td>
								<td><input type="text" name="job" id="job" value="<?php echo $user[$i]['job']?>" style="width:110px"></td>
								<td>

									<!-- Icons -->
									<input style="width:50px; height:24px;" type="submit" value="更新 ">
									<a href="user_del.php?id=<?php echo $user[$i]['id']?>" title="删除">删除</a>
									<a href="user_resetpass.php?id=<?php echo $user[$i]['id']?>" title="重置">重置</a>

								</td>
							</form>
						</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>
