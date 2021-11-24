<?php 
    require_once('../../repository/UserRepository.php');
    require_once('../../models/User.php');
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $type = $_POST['type'];
    $password = '123456a@';
    $user = new User($id,$name, $email, $phone, $password, $type, false);
    $userRepo = new UserRepository();
    echo $userRepo->update($user);
?>