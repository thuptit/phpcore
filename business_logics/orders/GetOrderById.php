<?php
    require_once('../../repository/OrderRepository.php');
    $order = new OrderRepository();
    $data = $order->getOrderById($_POST['id']);
    $result = array();
    while( $row = mysqli_fetch_array($data) ){
        $result[] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'customer_id' => $row['customer_id'],
            'product_id' => $row['product_id'],
            'total' => $row['total']
        );
    }
    echo json_encode($result);
?>