<?php
    require_once('../../repository/OrderRepository.php');
    $order = new OrderRepository();
    $data = $order->getDropDownCustomer();
    $result = array();
    while($row = mysqli_fetch_array($data)){
        $result[] = array(
            'id' => $row["id"],
            'name' => $row["name"]
        );
    }
    echo json_encode($result);
?>