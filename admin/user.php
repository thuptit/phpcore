<?php include "../auth/authentication.php" ?>
<?php include "template/header.php"; ?>
<main>
    <?php
    require_once('../models/search/SearchUser.php');
    ?>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-12">
                <h3>Quản lý người dùng</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <input id="searchName" type="text" class="form-control" placeholder="Nhập họ người dùng..." name="searchName">
            </div>
            <div class="col-md-3">
                <input type="text" id="searchPhone" class="form-control" placeholder="Nhập số điện thoại..." name="searchPhone">
            </div>
            <div class="col-md-3">
                <input type="text" id="searchEmail" class="form-control" placeholder="Nhập địa chỉ email..." name="searchEmail">
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary" type="button" onclick="searchUser()"><i class="fa fa-search"></i> Tìm kiếm</button>
                <button class="btn btn-success" onclick="createUser();"><i class="fa fa-plus"></i> Thêm mới</button>
                <button class="btn btn-secondary" onclick="exportTableToExcel('tblExportUser','users')"><i class="fa fa-file"></i> Xuất file</button>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <table class="table table-striped" id="tblExportUser">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Quyền</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="tblUser">
                    </tbody>
                </table>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div id="totalRecords" style="float: left;"></div>
            </div>
            <div class="col-md-6">
                <div id="pagination_link" style="float: right;"></div>
            </div>
        </div>
    </div>
</main>
<?php
include "components/user_component.php";
?>
<?php include "template/footer.php" ?>