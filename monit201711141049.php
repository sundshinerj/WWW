<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link href="img/favicon.png" rel="shortcut icon">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <link href="css/elegant-icons-style.css" rel="stylesheet" />
        <link href="img/favicon.png" rel="shortcut icon">
        <link href="css/owl.carousel.css" rel="stylesheet" type="text/css">
        <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
        <link href="css/fullcalendar.css" rel="stylesheet">
        <link href="css/widgets.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet" />
        <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
        <link href="css/animate.min.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/checkbox3.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/select2.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="css/flat-blue.css" rel="stylesheet" type="text/css">
        <title>运维管理平台</title>
    </head>
    <body>
        <?php
            require_once 'include/class_mysql.php';
            $mysql = new mysql();
        ?>
        <section id="container" class="">
            <header class="header dark-bg">
                <div class="toggle-nav">
                    <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
                </div>
                <a href="index.php" class="logo">小易到家 <span class="lite">运维管理平台</span></a>
                <div class="top-nav notification-row">                
                    <ul class="nav pull-right top-menu">
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="profile-ava">
                                    <img alt="" src="img/avatar1_small.jpg">
                                </span>
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
            <!--定义左侧菜单栏信息-->
            <aside>
                <div id="sidebar"  class="nav-collapse ">
                    <ul class="sidebar-menu">                
                        <li class="active">
                            <a class="" href="index.php">
                                <span>Dashboard</span>
                            </a>
                        </li>      
                        <li>
                            <a class="" href="monit.php">
                                <span>服务状态</span>
                            </a>
                        </li>
                        <li class="sub-menu">                     
                            <a href="javascript:;" class="">
                                <span>资产管理</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                <li>
                                    <a class="" href="asset.php">资产</a>
                                    <a class="" href="#">机房</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <span>用户管理</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                <li>
                                    <a class="" href="#">用户</a>
                                    <a class="" href="#">用户组</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="" href="#">
                                <span>导航栏管理</span>
                            </a>
                        </li>
                        <li>
                            <a class="" href="#">
                                <span>发布管理</span>
                            </a>
                        </li>
                        <li>
                            <a class="javascript:;" href="#">
                                <span>服务管理</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                        </li>
                        <li>
                            <a class="javascript:;" href="#">
                                <span>查看日志</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>
            <section id="main-content">
                <section class="wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-laptop"></i> MONITE</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                                <li><i class="fa fa-laptop"></i>服务器状态</li>                          
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading">服务器相关信息</header>
                                <div class="container-fluid">
                                    <div class="side-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="card">
                                                    <div class="card-header"></div>
                                                    <div class="card-body">
                                                        <table class="datatable table table-striped" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Ip</th>
                                                                    <th>Port</th>
                                                                    <th>user</th>
                                                                    <th>pid</th>
                                                                    <th>Stauts</th>
                                                                    <th>Cpu(load:5)</th>
                                                                    <th>Mem(used:%)</th>
                                                                    <th>Disk(used:%)</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    $host_array = $mysql->select('hostname,s_port,s_user,s_pid,s_status,cpu_load,mem_used,disk_used','xedaojia_server');
                                                                    for ($i=0;$i<count($host_array);$i++){?>
                                                                        <tr>
                                                                            <td><?php echo $host_array[$i]['hostname'];?></td>
                                                                            <td><?php echo $host_array[$i]['s_port'];?></td>
                                                                            <td><?php echo $host_array[$i]['s_user'];?></td>
                                                                            <td><?php echo $host_array[$i]['s_pid'];?></td>
                                                                            <td><?php echo $host_array[$i]['s_status'];?></td>
                                                                            <td><?php echo $host_array[$i]['cpu_load'];?></td>
                                                                            <td><?php echo $host_array[$i]['mem_used'];?></td>
                                                                            <td><?php echo $host_array[$i]['disk_used'];?></td>
                                                                        </tr>
                                                                    <?php }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </section>
                        </div>
                    </div>
                </section>
            </section>
            <script src="js/jquery.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
            <script src="js/echarts.min.js"></script>
            <script src="js/bootstrap.min.js" type="text/javascript"></script>
            <script src="js/Chart.min.js" type="text/javascript"></script>
            <script src="js/bootstrap-switch.js" type="text/javascript"></script>
            <script src="js/jquery.matchHeight-min.js" type="text/javascript"></script>
            <script src="js/dataTables.bootstrap.min.js" type="text/javascript"></script>
            <script src="js/select2.full.min.js" type="text/javascript"></script>
            <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
            <script src="js/ace.js" type="text/javascript"></script>
            <script src="js/mode-html.js" type="text/javascript"></script>
            <script src="js/theme-github.js" type="text/javascript"></script>
            <script src="js/app.js" type="text/javascript"></script>
            <script src="js/jquery.scrollTo.min.js"></script>
            <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
            <script src="js/jquery.sparkline.js" type="text/javascript"></script>
            <script src="js/owl.carousel.js" ></script>
            <script src="js/fullcalendar.min.js"></script>
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
        </section>
    </body>
</html>
