<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm mới đơn hàng</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" id="formCreateOrder">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <label for="">Mã đơn hàng</label>
            </div>
            <div class="col-md-8">
              <input type="text" name="slCode" id="slCode" class="form-control">
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-4">
              <label for="">Sản phẩm</label>
            </div>
            <div class="col-md-8">
            <select name="slProduct" id="slProduct" class="form-control">
            </select>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-4">
              <label for="">Khách hàng</label>
            </div>
            <div class="col-md-8">
            <select name="slCustomer" id="slCustomer" class="form-control">
            </select>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-4">
              <label for="">Số lượng</label>
            </div>
            <div class="col-md-8">
              <input type="text" name="slTotal" id="slTotal" class="form-control">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          <button type="button" onclick="saveOrder()" class="btn btn-primary">Lưu</button>
        </div>
      </form>
    </div>
  </div>
</div>