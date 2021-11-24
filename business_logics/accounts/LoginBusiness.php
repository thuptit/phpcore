<?php 
    require_once("../../repository/AccountRepository.php");
    $accountRepo = new AccountRepository();
    $username = $_POST["email"];
    $password = $_POST["password"];
    $username = strip_tags($username);
    $username = addslashes($username);
    $password = strip_tags($password);
    $password = addslashes($password);
    if($username == "" || $password == ""){
        header("Location: ../../admin/login.php?error=Địa chỉ email hoặc mật khẩu là bắt buộc. ");
        exit();
    }
    $result = $accountRepo->login($username, $password);
    if(mysqli_num_rows($result) == 0 ){
        header("Location: ../../admin/login.php?error=Sai địa chỉ email hoặc mật khẩu.");
        exit();
    }
    else{
        $data = mysqli_fetch_array($result);
        session_start();
        $_SESSION["userId"] = $data['id'];
        $_SESSION["email"] = $data['name'];
        header("Location: ../../admin/admin.php");
    }
?>