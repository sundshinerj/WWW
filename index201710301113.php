<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="img/favicon.png">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <link href="css/elegant-icons-style.css" rel="stylesheet" />
        <link href="css/font-awesome.min.css" rel="stylesheet" />    
       <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
        <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
        <link rel="stylesheet" href="css/fullcalendar.css">
        <link href="css/widgets.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet" />
        <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
        <title>运维管理平台</title>
    </head>
    <body>
        <?php
            require_once 'include/class_mysql.php';
            $mysql = new mysql();
        ?>
        <section id="container" class="">
            <header class="header dark-bg">
                <div class="toggle-nav"><div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div></div>
                <a href="index.php" class="logo">小易到家 <span class="lite">运维管理平台</span></a>
                <div class="top-nav notification-row">                
                    <ul class="nav pull-right top-menu">
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="profile-ava"><img alt="" src="img/avatar1_small.jpg"></span>
                                <span class="username">段瑞君</span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <div class="log-arrow-up"></div>
                                <li class="eborder-top"><a href="#"><i class="icon_profile"></i>修改密码</a></li>
                                <li><a href="login.html"><i class="icon_key_alt"></i> 退出登录</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>   
            </header>      
            <aside>
                <div id="sidebar"  class="nav-collapse ">
                    <ul class="sidebar-menu">                
                        <li class="active">
                            <a class="" href="index.php">
                                <i class="icon_house_alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>      
                        <li>
                            <a class="" href="widgets.html">
                                <i class="icon_genius"></i>
                                <span>资产管理</span>
                            </a>
                        </li>
                        <li>                     
                            <a class="" href="monit.php">
                                <i class="icon_piechart"></i>
                                <span>服务器状态</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon_table"></i>
                                <span>用户配置表单</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub"><li><a class="" href="basic_table.html">用户表单</a></li></ul>
                        </li>
                    </ul>
                </div>
            </aside>
            <section id="main-content">
                <section class="wrapper">            
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                                <li><i class="fa fa-laptop"></i>Dashboard</li>                          
                            </ol>
                        </div>
                    </div>
                    <!--定义ecahet图形-->
                    <div id="san_lineChart" style="height:300px; width:510px;display:table-cell;"></div>
                    <div id="peng_lineChart" style="height:300px; width:510px;display:table-cell;"></div>
                    <div class="row">
                        <div class="col-sm-6">
                            <section class="panel">
                                <header class="panel-heading">业务状态信息</header>
                                <table class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>业务名称</th>
                                            <th>Upstream</th>
                                            <th>状态</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $server_status = array();
                                            $business_array = $mysql->select('id,b_name','xedaojia_businessunit');
                                            for ($b_id=0;$b_id<count($business_array);$b_id++){
                                                $server_array = $mysql->select('hostname,s_status','xedaojia_server','business_id='.$business_array[$b_id]['id']);
                                                #list server status append server_status array where id = business_id
                                                for ($s_id=0;$s_id<count($server_array);$s_id++){
                                                    array_push($server_status,$server_array[$s_id]['s_status']);
                                                }
                                                if (in_array('up',$server_status) and in_array('down',$server_status)){$server_host_status = "warning";}
                                                elseif (in_array('up',$server_status) and !in_array('down',$server_status)){$server_host_status = "success";}
                                                else {$server_host_status = "danger";}
                                                $server_status = array();
                                                ?>
                                                <tr class="<?php echo $server_host_status;?>">
                                                    <!--<td><?php echo $business_array[$b_id]['id']?></td>-->
                                                    <td><?php echo $b_id+1;?></td>
                                                    <td><?php echo $business_array[$b_id]['b_name']?></td>
                                                    <td><?php for ($s_id=0;$s_id<count($server_array);$s_id++){echo $server_array[$s_id]['hostname'];echo "</br>";}?></td>
                                                    <td><?php echo $server_host_status;?></td>
                                                </tr>
                                            <?php }?>
                                    </tbody>
                                </table>
                            </section>
                        </div>
                        <div class="col-sm-6">
                            <section class="panel">
                                <header class="panel-heading">机房配置信息</header>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>物理机名称</th>
                                            <th>数量</th>
                                            <th>存放位置</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="active">
                                            <td>1</td>
                                            <td>交换机</td>
                                            <td>4</td>
                                            <td>三元桥</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>防火墙</td>
                                            <td>2</td>
                                            <td>三元桥</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>服务器</td>
                                            <td>10</td>
                                            <td>鹏博士</td>
                                        </tr>                         
                                        <tr>
                                            <td>4</td>
                                            <td>交换机</td>
                                            <td>3</td>
                                            <td>鹏博士</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </section>
                        </div>
                    </div>
                </section>
            </section>
        </section>
        <script src="js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
        <script src="js/echarts.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
       
        <script src="js/jquery.sparkline.js" type="text/javascript"></script>
       
        <script src="js/owl.carousel.js" ></script>
        <<script src="js/fullcalendar.min.js"></script>
        
        <script src="js/calendar-custom.js"></script>
        <script src="js/jquery.rateit.min.js"></script>
        <script src="js/jquery.customSelect.min.js" ></script>
        <script src="js/scripts.js"></script>
        <script src="js/sparkline-chart.js"></script>
        <script src="js/easy-pie-chart.js"></script>
        <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="js/jquery-jvectormap-world-mill-en.js"></script>
        <script src="js/jquery.autosize.min.js"></script>
        <script src="js/jquery.placeholder.min.js"></script>
        <script src="js/gdp-data.js"></script>  
        <script src="js/morris.min.js"></script>
        <script src="js/sparklines.js"></script>
        <script src="js/jquery.slimscroll.min.js"></script>
        <script>
            //knob
            $(function() {
                $(".knob").knob({
                    'draw' : function () { 
                        $(this.i).val(this.cv + '%')
                    }
                })
            });
            //carousel
            $(document).ready(function() {
                $("#owl-slider").owlCarousel({
                    navigation : true,
                    slideSpeed : 300,
                    paginationSpeed : 400,
                    singleItem : true
                });
            });
            //三元桥流量统计
			/*定义数组，用于ajax抓取数据后前端存储*/
			/*三元桥*/
			var sanInValue_array=[];
			var sanOutValue_array=[];
			var sanClock_array=[];
			/*鹏博士*/
			var pengInValue_array=[];
			var pengOutValue_array=[];
			var pengClock_array=[];
			
			function getSanInvalue(echars){
				$.ajax({
					type: "post",
					async: true,
					url: "getSanInvalue.php",
					data: {},
					dataType: "json",
					/*如果成功调取（请求test.php数据保证为json格式）则执行success，否则执行error*/
					success: function(result){
						if (result) {
							for (var i = 0; i < result.length; i++) {
                                sanInValue_array.push(result[i].value_avg);
                                sanClock_array.push(result[i].clock);
							}
                            san_lineChart.setOption(san_option);
						}
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						alert(XMLHttpRequest.status);
						alert(XMLHttpRequest.status);
						alert(textStatus);
					}
				})
			}
			/*执行arrTest函数*/
			
            
            function getSanOutvalue(){
				$.ajax({
					type: "post",
					async: true,
					url: "getSanOutvalue.php",
					data: {},
					dataType: "json",
					/*如果成功调取（请求test.php数据保证为json格式）则执行success，否则执行error*/
					success: function(result){
						if (result) {
                            for (var i = 0; i < result.length; i++) {
								sanOutValue_array.push(result[i].value_avg);
							}
                        san_lineChart.setOption(san_option); 
						}
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						alert(XMLHttpRequest.status);
						alert(XMLHttpRequest.status);
						alert(textStatus);
					}
				})
			}
            /*定义echart图形*/
			san_option = {
                title:{
                    text: '三元桥流量统计',
                    subtext: '10.221.12.2/ifInOctets[ethernet0/1]-ifOutOctets[ethernet0/1]'
                },
                tooltip:{trigger: 'axis'},
                legend:{data:['入口','出口']},
                calculable : true,
                xAxis: [
                    {
                        type: 'category',
                        boundaryGap: false,
                        data: sanClock_array
                    }
                ],
                yAxis: [{type : 'value'}],
                series: [
                    {
                        name: '入口',
                        type: 'line',
                        smooth: true,
                        itemStyle: {normal: {areaStyle: {type: 'default'}}},
                        data: sanInValue_array
                    },
                    {
                        name: '出口',
                        type: 'line',
                        smooth: true,
                        itemStyle: {normal: {areaStyle: {type: 'default'}}},
                        data: sanOutValue_array
                    }
                ],
            };
                    
            //鹏博士流量统计
			/*定义图形变量*/
			function getPengInvalue(echars){
				$.ajax({
					type: "post",
					async: true,
					url: "getPengInvalue.php",
					data: {},
					dataType: "json",
					/*如果成功调取（请求test.php数据保证为json格式）则执行success，否则执行error*/
					success: function(result){
						if (result) {
							for (var i = 0; i < result.length; i++) {
                                pengInValue_array.push(result[i].value_avg);
                                pengClock_array.push(result[i].clock);
							}
                            peng_lineChart.setOption(peng_option);
						}
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						alert(XMLHttpRequest.status);
						alert(XMLHttpRequest.status);
						alert(textStatus);
					}
				})
			}
			
            
            function getPengOutvalue(){
				$.ajax({
					type: "post",
					async: true,
					url: "getPengOutvalue.php",
					data: {},
					dataType: "json",
					/*如果成功调取（请求test.php数据保证为json格式）则执行success，否则执行error*/
					success: function(result){
						if (result) {
                            for (var i = 0; i < result.length; i++) {
								pengOutValue_array.push(result[i].value_avg);
							}
                        peng_lineChart.setOption(peng_option); 
						}
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						alert(XMLHttpRequest.status);
						alert(XMLHttpRequest.status);
						alert(textStatus);
					}
				})
			}
            peng_option = {
                title : {
                    text: '鹏博士流量统计',
                    subtext: '机房总入/出口'
                },
                tooltip : {
                    trigger: 'axis'
                },
                legend: {
                    data:['入口','出口']
                },
                calculable : true,
                xAxis : [
                    {
                        type : 'category',
                        boundaryGap : false,
                        data : pengClock_array
                    }
                ],
                yAxis : [
                    {
                        type : 'value'
                    }
                ],
                series : [
                    {
                        name: '入口',
                        type: 'line',
                        smooth: true,
                        itemStyle: {normal: {areaStyle: {type: 'default'}}},
                        data: pengInValue_array
                    },
                    {
                        name:'出口',
                        type:'line',
                        smooth:true,
                        itemStyle: {normal: {areaStyle: {type: 'default'}}},
                        data:pengOutValue_array
                    }
                ]
            };
			
			var san_lineChart = echarts.init(document.getElementById('san_lineChart'));
			getSanInvalue(san_lineChart);
            getSanOutvalue(san_lineChart);
            var peng_lineChart = echarts.init(document.getElementById('peng_lineChart'));
            getPengInvalue(peng_lineChart);
            getPengOutvalue(peng_lineChart);
		</script>
    </body>
</html>
