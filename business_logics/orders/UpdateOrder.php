<?php
    require_once('../../repository/OrderRepository.php');
    $order = new OrderRepository();
    $id = $_POST['eId'];
    $name = $_POST['eCode'];
    $customer_id = $_POST['eCustomer'];
    $product_id = $_POST['eProduct'];
    $total = $_POST['eTotal'];
    echo $order->updateOrder($id, $name, $customer_id, $product_id, $total);
?>