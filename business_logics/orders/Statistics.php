<?php
    require_once('../../repository/OrderRepository.php');
    $order = new OrderRepository();

    $data = $order->statistics($_POST['month'], $_POST['year']);
    $result = array();
    while($row = mysqli_fetch_array($data)){
        $result[] = array(
            'status' => $row['status'],
            'total'  => $row['total']
        );
    }
    echo json_encode($result);
?>