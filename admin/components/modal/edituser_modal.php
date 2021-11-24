<!-- Modal -->
<div class="modal fade" id="userEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa người dùng</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" id="formUpdateUser">
        <div class="modal-body">
          <div class="row">
            <input type="text" name="id" id="userId" style="display: none;">
            <div class="col-md-4">
              <label for="">Họ và tên</label>
            </div>
            <div class="col-md-8">
              <input type="text" name="name" id="userName" class="form-control">
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-4">
              <label for="">Số điện thoại</label>
            </div>
            <div class="col-md-8">
              <input type="text" name="phone" id="userPhone" class="form-control">
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-4">
              <label for="">Địa chỉ email</label>
            </div>
            <div class="col-md-8">
              <input type="text" name="email" id="userEmail" class="form-control">
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-4">
              <label for="">Quyền</label>
            </div>
            <div class="col-md-8">
              <input type="text" name="type" id="userType" class="form-control">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          <button type="button" onclick="updateUser()" class="btn btn-primary">Lưu</button>
        </div>
      </form>
    </div>
  </div>
</div>