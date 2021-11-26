<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-12">
            <h3>Quản lý đơn hàng</h3>
        </div>
    </div>
    <div class="row d-flex">
        <div class="col-md-3">
            <input type="text" class="form-control" id="name" placeholder="Nhập mã đơn hàng...">
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" id="nameCus" placeholder="Nhập tên khách hàng...">
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" id="namePro" placeholder="Nhập tên sản phẩm...">
        </div>
        <div class="col-md-3">
            <select name="" id="statusSearch" class="form-control">
                <option value="-1" selected disabled>Tất cả trạng thái</option>
                <option value="0">Chờ xác nhận</option>
                <option value="1">Đã duyệt</option>
                <option value="2">Từ chối</option>
            </select>
        </div>
        <div class="col-md-6 mt-2">
            <button class="btn btn-primary" onclick="searchOrder(1)" type="button"><i class="fa fa-search"></i>Tìm kiếm</button>
            <button class="btn btn-success" onclick="createOrder();"><i class="fa fa-plus"></i> Thêm mới</button>
            <button class="btn btn-secondary" onclick=""><i class="fa fa-file"></i> Xuất excel</button>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th >STT</th>
                        <th >Mã đơn hàng</th>
                        <th>Hình ảnh</th>
                        <th >Tên sản phẩm</th>
                        <th>Khách hàng</th>
                        <th >Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Tổng giá</th>
                        <th >Người tạo</th>
                        <th >Ngày tạo</th>
                        <th >Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="tblOrder">
                   
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

<?php
    include "modal/order_modal.php";
?>
<?php
    include "modal/editorder_modal.php";
?>
