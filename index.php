<?php
    include('include/db.php');

    $db = new DB();

    $rows = $db->Query('select * from product');
    echo json_encode($rows);
    
?>
