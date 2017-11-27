<?php
require_once 'include/func_checkSession.php';
require_once 'include/class_mysql.php';
$mysql = new mysql();
$where = 'groupid is not NULL';
$menu = $mysql->select('*', 'xedaojia_menu',$where);
$menu_group = $mysql->select('*', 'xedaojia_menugroup');
//$privilege = $mysql->select('id,name', "privilege");
?>

<div>
	<div>
		<div>
			<p>系统管理>>菜单管理</p>
		</div>
		<div>
            菜单组
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>菜单组</th>
                    </tr>
                </thead>
                <tfoot>
                    <?php for($i=0;$i<count($menu_group);$i++){?>
                        <tr>
                            <td><?php echo $menu_group[$i]['id']; ?></td>
                            <td><?php echo $menu_group[$i]['name']; ?></td>
                        </tr>
                    <?php }?>
                </tfoot>
            </table>
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>菜单名</th>
						<th>文件名</th>
						<th>菜单组</th>
						<th>操作</th>
					</tr>
				</thead>
                <tbody>
                <?php for($i=0;$i<count($menu);$i++){?>
                    <tr>
                        <form action="menu_edit.php?id=<?php echo $menu[$i]['id']?>" method="post" id="<?php echo $menu[$i]['id']?>">
                            <td><?php echo $menu[$i]['id']; ?></td>
                            <td><input type="text" name="menu" id="menu" value="<?php echo $menu[$i]['name']?>"></td>
                            <td><input type="text" name="filepath" id="filepath" value="<?php echo $menu[$i]['filepath']?>"></td>
                            <td>
                                <select name="groupid" id="groupid" style="width:120px">
                                    <option value="0">通用</option>
                                    <?php for($k=0;$k<count($menu_group);$k++){
                                        if($menu_group[$k]['id'] == $menu[$i]['groupid']){?>
                                            <option selected="selected" value="<?php echo $menu_group[$k]['id']?>"><?php echo $menu_group[$k]['name']?></option>
                                        <?php
                                        }else{?>
                                            <option value="<?php echo $menu_group[$k]['id']?>"><?php echo $menu_group[$k]['name']?></option>
                                        <?php }}?>
                                </select>
                            </td>
                            <td>
                                <input style="width:50px" type="submit" value="更新">
                                <a href="menu_del.php?id=<?php echo $menu[$i]['id']?>" title="删除">删除</a>
                            </td>
                        </form>
                    </tr>
                <?php }?>
                </tbody>
                <tfoot>
                    <tr>
                        <form action="menu_add.php" method="post" id="addmenu">
                            <td>#</td>
                            <td><input type="text" name="menu" id="menu"></td>
                            <td><input type="text" name="file" id="file"></td>
                            <td>
                                <select name='menugid' id="menugid" style="width:120px">
                                    <option value="0">通用</option>
                                    <?php for($k=0;$k<count($menu_group);$k++){?>
                                        <option value="<?php echo $menu_group[$k]['id']; ?>"><?php echo $menu_group[$k]['name']; ?></option>
                                    <?php }?>
                                </select>
                            </td>
                            <td><input type="submit" style="width:80px" class="button" value="Add"/></td>
                        </form>
                    </tr>
                </tfoot>
			</table>
		</div>
	</div>
</div>