<?php
require_once 'include/class_mysql.php';
$mysql = new mysql();
?>
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