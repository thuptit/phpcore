<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đơn hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.10/sweetalert2.min.css">
    <link rel="stylesheet" href="../assets/css/admin_style.css">
    <link rel="stylesheet" href="../assets/css/toastr.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
</head>
<body>
<input type="checkbox" id="check">
<header>
    <div class="header-toggle">
        <label for="check" style="cursor: pointer;">
            <i class="fas fa-stream"></i>
        </label>
    </div>
    <div class="header-logout d-flex align-items-center">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user"></i>
            Xin chào <?php echo $_SESSION["email"];?>
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#"><i class="fas fa-lock"></i>Đổi mật khẩu</a></li>
            <li><a class="dropdown-item" href="/orderpurephp/business_logics/accounts/LogoutBusiness.php"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a></li>
        </ul>
    </div>
</header>
<div class="sidebar">
    <div class="sidebar-header d-flex align-items-center justify-content-center">
        <h6 class="logo">
            <span>DASH</span>
        </h6>
    </div>
    <div class="sidebar-menu">
        <nav class="nav">
            <ul class="nav-bar">
                <li class="nav-link <?php if("$_SERVER[REQUEST_URI]"=="/orderpurephp/admin/admin.php"){echo "active";}?>">
                    <a href="/orderpurephp/admin/admin.php">
                        <span class="nav-icons"><i class="fas fa-home"></i></span>
                        <span class="nav-title">Trang chủ</span>
                    </a>
                </li>
                <li class="nav-link <?php if("$_SERVER[REQUEST_URI]"=="/orderpurephp/admin/order.php"){echo "active";}?>">
                    <a href="/orderpurephp/admin/order.php">
                        <span class="nav-icons"><i class="fas fa-sort-amount-down-alt"></i></span>
                        <span class="nav-title">Đơn hàng</span>
                    </a>
                </li>
                <li class="nav-link <?php if("$_SERVER[REQUEST_URI]"=="/orderpurephp/admin/category.php"){echo "active";}?>">
                    <a href="/orderpurephp/admin/category.php">
                        <span class="nav-icons"><i class="fas fa-list-ul"></i></span>
                        <span class="nav-title">Danh mục</span>
                    </a>
                </li>
                <li class="nav-link <?php if("$_SERVER[REQUEST_URI]"=="/orderpurephp/admin/product.php"){echo "active";}?>">
                    <a href="/orderpurephp/admin/product.php">
                        <span class="nav-icons"><i class="fas fa-archway"></i></span>
                        <span class="nav-title">Sản phầm</span>
                    </a>
                </li>
                <li class="nav-link <?php if("$_SERVER[REQUEST_URI]"=="/orderpurephp/admin/user.php"){echo "active";}?>">
                    <a href="/orderpurephp/admin/user.php">
                        <span class="nav-icons"><i class="fas fa-users"></i></span>
                        <span class="nav-title">Người dùng</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>