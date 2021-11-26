<?php 
    require_once('../../repository/OrderRepository.php');
    $order = new OrderRepository();
    echo $order->deleteOrder($_POST['id']);
?>