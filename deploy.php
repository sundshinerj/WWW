<?php 
require_once 'include/func_checkSession.php';
require_once 'include/class_mysql.php';
$mysql = new mysql();
$pf_name = $mysql->select('id,b_name','xedaojia_businessunit');
?>
<div>
	<div class="panel">
		<div class="panel-heading">
			<p>运维管理>>业务部署</p>
		</div>
		<div>
		
<?php
	if ( $_GET['pf_id']){
	$pf_get_id = $_GET['pf_id'];
	$where = 'a.business_id=b.id and b.id='.$_GET['pf_id'];
    $pf_include = $mysql->select('a.hostname,a.server_name,a.s_status,a.business_id,b.id,b.b_name','xedaojia_server a,xedaojia_businessunit b',$where);
?>
            <div class="alert alert-block alert-danger fade in">注意：列表名称不能和平台名称相同</div>
            <form action="deployDo.php" method="POST" id='fform'>
				<table class="table table-striped">
					<thead>
						<tr >
							<th style="width:80px; text-align:center">选择列表</th>
							<th>服务器IP</th>
							<th>应用</th>
							<th>服务状态</th>
							<th>所属平台</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
							for($i = 0;$i < count($pf_include); $i++)
							{
						?>
							<tr>
								<td><input type="checkbox" value="<?php echo $pf_include[$i]['hostname']; ?>" name="ip_list[]"></td>
								<td><?php echo $pf_include[$i]['hostname']; ?></td>
								<td><?php echo $pf_include[$i]['server_name']; ?></td>
								<td><?php echo $pf_include[$i]['s_status']; ?></td>
								<td><?php echo $pf_include[$i]['b_name']; ?></td>
							</tr>
						<?php
							}
						?>	
					</tbody>
					<tfoot>
						<tr>
							<td></td>
                            <td>输入部署列表名称:</td>
							<td colspan="2"><input type="text" name="fname" id="fname"/></td>
                            <td colspan="2"><input type="button" style="width:100px" class="button" value="点击生成列表" onclick="check_fname()"/></td>
                        </tr>
					</tfoot>
				</table>
				<input type='hidden' name="pf_id"  value="<?php echo $pf_get_id;?>">
			</form>
            <!--<script>alert("列表创建完成，请在(业务管理>>列表部署)进行操作！")</script>-->
<?php
}
else{
?>
	<div>
        <p style="font-size:14px; font-weight:bold;  margin:30px;">请选择你要部署的平台:</p>
		<p style="font-size:14px;text-align:center; margin:10px 0 40px 0; color:#222">
			<?php
			for($i = 0;$i < count($pf_name) ; $i++)
			{
			?>
			<a class="btn btn-default" href="index.php?id=<?php echo $_GET['id']?>&pf_id=<?php echo $pf_name[$i]['id']?>"><input type="button" style="width:150px" class="button" value="<?php echo $pf_name[$i]['b_name']; ?>"/></a>
			<?php
			}
			?>
		</p>
	</div>
    
    <form action="deploy_add.php" method="POST" id='fform'>
    <div>
        <td colspan="2"><input type="text" name="fname" id="fname" placeholder="平台名称"/></td>
        <td colspan="2"><input type="text" name="fname_ip" id="fname_ip" placeholder="10.12.12.1:90;10.12.12.2:90" style="width:200px"/></td>
        <td colspan="2"><input type="button" style="width:100px" class="button" value="添加列表" onclick="check_fname()"/></td>
    </div>
    </form>
<?php
}
?>

		</div>
	</div>
</div>	

<script>
	// $(function(){  
		// $("#fname").blur(function(){
			// var val = $("#fname").val();

			// $.get("auto_fname_isset.php", { fname : val },
				// function(data){
					// if(data == '1'){
						// alert('存在');
					// }
				// }
			// );
		// });
    // }); 
	
	
	//function check_fname(){
	//	var val = $("#fname").val();

		//$.get("auto_fname_isset.php", { fname : val },
			//function(data){
				//if(data == '1'){
					//alert('列表名称存在');
				//}else{
					//$('#fform').submit();
				//}
			//}
		//);
	//}
    
    function check_fname(){
	    var val = $("#fname").val();
        $.get("auto_fname_isset.php", { fname : val },
		    function(data){
				if(data == '1'){
					alert('列表名称不能为空或者已存在');
				}else{
					$('#fform').submit();
				}
			}
		);
    }
</script>
