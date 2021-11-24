<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đơn hàng</title>
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/toastr.css">
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg fixed-top navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#">N.V.T.SOFT</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#introduce">Giới thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#services">Dịch vụ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Liên hệ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <section id="home">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-center">
                                <div class="row">
                                    <h1 class="text-home mb-5">Trang giới thiệu phần mềm quản lý đơn hàng</h1>
                                    <p class="text-home mb-5">Hiện nay việc quản lý các sản phẩm, hàng hóa đều được quản lý trên hệ thống internet
                                        vì thế chúng mang đến cho các bạn sản phẩm quản lý các đơn hàng một cách hiệu quả, nhanh chóng và tiện ích
                                    </p>
                                    <button class="btn btn-contact"> <i class="fas fa-phone-volume"></i> Liên hệ ngay</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img src="./assets/images/iphone.png" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="introduce">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2 text-center">
                        <h4 id="" class="text-home">Giới thiệu</h4>
                        <h1 class="text-home">Phần mềm Quản lý đơn hàng</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-5">
                        <div class="card" id="card1" style="background-color: #e9f2f4;">
                            <div class="card-body text-center">
                                <h5 class="card-title mb-4">Phát triển phầm mềm</h5>
                                <img src="https://landing.zytheme.com/ladidapp/assets/images/icons/icon-code.svg" alt="">
                                <br>
                                <span class="card-text">Chúng tôi cung cấp những UI/UX tốt nhất</span>
                                <br>
                                <span class="card-text">Thiết kế luôn hướng đến những xu hướng mới</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-5">
                        <div class="card" id="card2" style="background-color: #ece6f2;">
                            <div class="card-body text-center">
                                <h5 class="card-title mb-4">Đội ngũ kĩ sư</h5>
                                <img src="https://landing.zytheme.com/ladidapp/assets/images/icons/icon-paint.svg" alt="">
                                <br>
                                <span class="card-text">Những người có nhiều năm kinh nghiệm</span>
                                <br>
                                <span class="card-text">Phát triển rất nhiều phần mềm lớn tại VN</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-5">
                        <div class="card" id="card3" style="background-color: #ede8e1;">
                            <div class="card-body text-center">
                                <h5 class="card-title mb-4">Bảo mật</h5>
                                <img src="https://landing.zytheme.com/ladidapp/assets/images/icons/icon-screen.svg" alt="">
                                <br>
                                <span class="card-text">Bảo mật thông tin của khách hàng luôn đặt lên hàng đầu</span>
                                <br>
                                <span class="card-text">Tránh khỏi những mối đe dọa từ cái cuộc tấn công mạng</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-5">
                        <div class="card" id="card4" style="background-color: #def4ef;">
                            <div class="card-body text-center">
                                <h5 class="card-title mb-4">Công nghệ</h5>
                                <img src="https://landing.zytheme.com/ladidapp/assets/images/icons/icon-screen.svg" alt="">
                                <br>
                                <span class="card-text">Đa dạng về các nền tảng công nghệ sử dụng</span>
                                <br>
                                <span class="card-text">Luôn cập nhật và tiếp cận các công nghệ tiên tiến hiện nay</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="services">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2 text-center">
                        <h4 class="text-home">Dịch vụ</h4>
                        <h1 class="text-home">Bạn hoàn toàn có thể sử dụng sản phẩm của chúng tôi</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-5">
                        <div class="card">
                            <div class="card-body text-center" style="font-family: lato, sans-serif; color: #7d7b8f;">
                                <h4 class="card-title">
                                    Mức cơ bản
                                </h4>
                                <h3 class="card-title mt-4" style="color: #925add;">
                                    5.000.000 VNĐ
                                </h3>
                                <h4 class="card-title my-4">
                                    1 tháng
                                </h4>
                                <hr>
                                <p class="card-text mt-4">Giới hạn một vài chức năng </p>
                                <p class="card-text">Nền tảng được bảo mật</p>
                                <p class="card-text">Giới hạn lượt truy cập</p>
                                <p class="card-text">Hỗ trợ tận tình 24/7</p>
                                <p class="card-text">100Gb Hosting</p>
                                <a href="#" class="btn btn-trial mt-2">Dùng thử miễn phí</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-5">
                        <div class="card">
                            <div class="card-body text-center" style="font-family: lato, sans-serif; color: #7d7b8f; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                <h4 class="card-title">
                                    Mức nâng cao
                                </h4>
                                <h3 class="card-title mt-4" style="color: #925add;">
                                    10.000.000 VNĐ
                                </h3>
                                <h4 class="card-title my-4">
                                    1 tháng
                                </h4>
                                <hr>
                                <p class="card-text mt-4">Thống kê doanh thu, sản phẩm</p>
                                <p class="card-text">Nền tảng được bảo mật</p>
                                <p class="card-text">Không giới hạn lượ truy cập</p>
                                <p class="card-text">Hỗ trợ tận tình 24/7</p>
                                <p class="card-text">500Gb Hosting</p>
                                <a href="#" class="btn btn-trial mt-2">Dùng thử miễn phí</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-5">
                        <div class="card">
                            <div class="card-body text-center" style="font-family: lato, sans-serif; color: #7d7b8f;">
                                <h4 class="card-title">
                                    Mức đặc biệt
                                </h4>
                                <h3 class="card-title mt-4" style="color: #925add;">
                                    15.000.000 VNĐ
                                </h3>
                                <h4 class="card-title my-4">
                                    1 tháng
                                </h4>
                                <hr>
                                <p class="card-text mt-4">Thêm gọi điện và trò chuyện</p>
                                <p class="card-text">Nền tảng được bảo mật</p>
                                <p class="card-text">Không giới hạn lượt truy cập</p>
                                <p class="card-text">Hỗ trợ tận tình 24/7</p>
                                <p class="card-text">1TB Hosting</p>
                                <a href="#" class="btn btn-trial mt-2">Dùng thử miễn phí</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact text-dark mt-5" id="signup">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <h2 class="mb-4 text-home">Liên hệ với chúng tôi để được tư vấn</h2>
                        <form class="form-subscribe" id="contactFormFooter">
                            <div class="row">
                                <div class="col">
                                    <input class="form-control form-control-lg" id="emailAddressBelow" type="email" placeholder="Nhập địa chỉ E-mail..." data-sb-validations="required,email" />
                                </div>
                                <div class="col-auto"><button class="btn btn-send text-white btn-lg disabled" id="submitButton" type="submit">Gửi</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="text-center text-lg-start text-white mt-5" style="background-color: #929fba">
        <div class="container p-4 pb-0">
            <section class="">
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">
                            N.V.T.Soft
                        </h6>
                        <p>
                            Chúng tôi luôn cố gắng hoàn thiện mình để mang đến những sự trải nghiệm tốt hơn tới các ban. Hãy ủng hộ N.V.T.Soft
                        </p>
                    </div>
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Sản phẩm</h6>
                        <p>
                            <a class="text-white">Phần mềm Quản lý đơn hàng</a>
                        </p>

                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Liên hệ</h6>
                        <p><i class="fas fa-home mr-3"></i> Kim Sơn, Ninh Bình</p>
                        <p><i class="fas fa-envelope mr-3"></i> nvtsoftinfo@gmail.com</p>
                        <p><i class="fas fa-phone mr-3"></i> (024)3 335 999</p>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Theo dõi</h6>
                        <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee" href="#!" role="button"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39" href="#!" role="button"><i class="fab fa-google"></i></a>
                        <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac" href="#!" role="button"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-primary btn-floating m-1" style="background-color: #333333" href="#!" role="button"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </section>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2021 Copyright:
            <a class="text-white" href="#">nvtsoft.com</a>
        </div>
    </footer>

    <script src="./assets/js/jquery.3.4.1.js"></script>
    <script src="./assets/js/toastr.js"></script>
    <script src="./assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>