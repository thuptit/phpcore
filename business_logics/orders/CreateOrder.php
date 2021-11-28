<?php 
    require_once('../../repository/OrderRepository.php');
    require_once('../../models/Order.php');
    session_start();
    $createOrder = new Order(0,$_POST['slCode'],$_POST['slCustomer'],$_POST['slProduct'],$_SESSION['userId'],0,$_POST['dateCreate'],$_POST['slTotal'],0);
    $order = new OrderRepository();
    $data = $order->createOrder($createOrder);
    echo $data;
?>