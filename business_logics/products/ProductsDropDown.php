<?php
    require_once('../../repository/OrderRepository.php');
    $order = new OrderRepository();
    $data = $order->getDropDownProduct();
    $result = array();
    while($row = mysqli_fetch_array($data)){
        $result[] = array(
            'id' => $row["id"],
            'name' => $row["name"],
            'image' => $row["image"],
            'price' => $row["price"]
        );
    }
    echo json_encode($result);
?>