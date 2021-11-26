<?php
    session_start();
    if(isset($_SESSION["userId"])) header("Location: admin.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang đăng nhập</title>
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/toastr.css">
</head>

<body>
    <div class="vh-100 bg-login">
        <div class="container h-100">
            <div class="row h-100 d-flex justify-content-center align-items-center">
                <div class="col-md-10">
                    <div class="card rounded-3">
                        <div class="row g-0">
                            <div class="col-md-6 d-flex align-items-center">
                                <div class="card-body">
                                    <form action="../business_logics/accounts/LoginBusiness.php" method="POST">
                                        <h3 class="text-center mb-5">Hệ thống quản lý đơn hàng</h3>
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <label>Địa chỉ e-mail</label>
                                                <input type="text" class="form-control" placeholder="Nhập tài khoản..." name="email">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <label>Mật khẩu</label>
                                                <input type="password" class="form-control" placeholder="Nhập mật khẩu..." name="password">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                        <?php if (isset($_GET['error'])) { ?>
                                                <p class="text-danger"><?php echo $_GET['error']; ?></p>
                                        <?php } ?>
                                        </div>
                                        <div class="row mt-3 mb-3">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary">Đăng nhập</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img src="../assets/images/iphone.png" class="img-fluid" style="padding: 1rem 0 0 1rem;" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/jquery.3.4.1.js"></script>
    <script src="../assets/js/toastr.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>