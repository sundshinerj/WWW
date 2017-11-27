<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        
        <link href="img/favicon.png" rel="shortcut icon">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <link href="css/elegant-icons-style.css" rel="stylesheet" />
        <link href="css/font-awesome.min.css" rel="stylesheet" />  
        <link href="css/owl.carousel.css" rel="stylesheet" type="text/css">
        <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
        <link href="css/fullcalendar.css" rel="stylesheet">
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
                        <li class="sub-menu">
                            <a class="javascript:;" href="#">
                                <span>服务管理</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                <li>
                                    <a class="" href="#">冗余切换</a>
                                    <a class="" href="#">服务基本管理</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="" href="#">
                                <span>查看日志</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>
            
            
            
            
            
            
        </section>
        <script src="js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
        <script src="js/echarts.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
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
            
		</script>
    </body>
</html>
