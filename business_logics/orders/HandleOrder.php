<?php 
    require_once('../../repository/OrderRepository.php');
    $order = new OrderRepository();
    if(isset($_POST['accept'])){
        echo $order->handleOrder($_POST['id'], 1);
    }
    else if(isset($_POST['deny'])){
        echo $order->handleOrder($_POST['id'], 2);
    }
?>