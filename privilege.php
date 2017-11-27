<?php
require_once 'include/func_checkSession.php';
require_once 'include/class_mysql.php';
$mysql = new mysql();
$privileges = $mysql->select('*', 'xedaojia_usergroup');
$menugroup = $mysql->select('*','xedaojia_menugroup');
?>

<div>
	<div>
		<div>
			<p>系统管理>>权限管理</p>
		</div>
		<div>
            菜单信息
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>菜单组</th>
                    </tr>
                </thead>
                <tfoot>
                    <?php for($i=0;$i<count($menugroup);$i++){?>
                        <tr>
                            <td><?php echo $menugroup[$i]['id']?></td>
                            <td><?php echo $menugroup[$i]['name']?></td>
                        </tr>
                    <?php }?>
                </tfoot>
            </table>
        
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>用户组</th>
                        <th>权限列表</th>
						<th>操作</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<form action="privilege_add.php" method="post" id="addprivilege">
							<td>#</td>
							<td><input type="text" name="name" id="name"></td>
							<td><input type="submit" style="width:80px" class="button" value="Add"/></td>
						</form>
					</tr>
				</tfoot>
				<tbody>
					<?php for ($i = 0; $i < count($privileges); $i++) {?>
						<tr>
                            <form action="privilege_edit.php?id=<?php echo $privileges[$i]['id']?>&userg_name=<?php echo $privileges[$i]['name']?>" method="post">
                                <td><?php echo $privileges[$i]['id']?></td>
                                <td><input type="text" name="name" id="name" value="<?php echo $privileges[$i]['name']; ?>"></td>
                                <td><input type="text" name="menugid" id="menugid" value="<?php echo $privileges[$i]['menugid']; ?>"></td>
                                <td>
                                    <input type="submit" value="更新">
                                    <a href="privilege_del.php?id=<?php echo $privileges[$i]['id']?>" title="删除">删除</a>
                                </td>
                            </form>
						</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>