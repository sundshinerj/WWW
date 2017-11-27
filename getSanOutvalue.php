<?php
$order = 'python test.py';  
$data = shell_exec($order);  
echo $data;
?>
