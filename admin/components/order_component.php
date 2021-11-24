<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-12">
            <h3>Quản lý đơn hàng</h3>
        </div>
    </div>
    <div class="row d-flex">
        <div class="col-md-3">
            <input type="text" class="form-control" placeholder="Nhập mã đơn hàng...">
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" placeholder="Nhập tên đơn hàng...">
        </div>
        <div class="col-md-3">
            <select name="" id="statusSearch" class="form-control">
                <option selected disabled>Tất cả trạng thái</option>
                <option value="0">Chờ xác nhận</option>
                <option value="1">Đã duyệt</option>
                <option value="2">Từ chối</option>
            </select>
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary" type="button"><i class="fa fa-search"></i>Tìm kiếm</button>
            <button class="btn btn-success" onclick="createOrder();"><i class="fa fa-plus"></i> Thêm mới</button>
            <button class="btn btn-secondary" onclick=""><i class="fa fa-file"></i> Xuất excel</button>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Họ</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Mô tả</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>
                            <i class="fa fa-edit cursor-pointer"></i>
                            <i class="fa fa-trash text-danger cursor-pointer"></i>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>
                            <i class="fa fa-edit cursor-pointer"></i>
                            <i class="fa fa-trash text-danger cursor-pointer"></i>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>
                            <i class="fa fa-edit cursor-pointer"></i>
                            <i class="fa fa-trash text-danger cursor-pointer"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
    include "modal/order_modal.php";
?>