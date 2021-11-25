$(document).ready(function () {
  let nav_offset_top = $(".header").height() + 50;

  function navbarFixed() {
    if ($(".header").length) {
      $(window).scroll(function () {
        let scroll = $(window).scrollTop();
        if (scroll >= nav_offset_top) {
          $(".header .navbar").addClass("navbar_fixed");
        } else {
          $(".header .navbar").removeClass("navbar_fixed");
        }
      });
    }
  }
  searchUser(1);
  searchOrder(1);
  navbarFixed();
});

async function getDropDownCustomer() {
  $("#slCustomer").children().remove();
  $("#slCustomer").append("<option selected disabled>Chọn khách hàng</option>");
  return $.ajax({
    url: "/orderpurephp/business_logics/customers/CustomersDropDown.php",
    type: "GET",
    success: (res) => {
      let data = JSON.parse(res);
      data.forEach((item) => {
        $("#slCustomer").append(
          `<option value='${item.id}'>${item.name}</option>`
        );
      });
    },
  });
}

async function getDropDownProduct() {
  $("#slProduct").children().remove();
  $("#slProduct").append("<option selected disabled>Chọn khách hàng</option>");
  return $.ajax({
    url: "/orderpurephp/business_logics/products/ProductsDropDown.php",
    type: "GET",
    success: (res) => {
      let data = JSON.parse(res);
      data.forEach((item) => {
        $("#slProduct").append(
          `<option value='${item.id}'>${item.name}</option>`
        );
      });
    },
  });
}

async function createOrder() {
  await getDropDownCustomer();
  await getDropDownProduct();
  $("#exampleModal").modal("show");
}

function createUser() {
  $("#userCreate").modal("show");
}
function saveUser() {
  $.ajax({
    url: "/orderpurephp/business_logics/user/CreateUser.php",
    data: $("#formCreateUser").serialize(),
    type: "POST",
    success: function (response) {
      toastr.success(response);
      $("#userCreate").modal("hide");
      searchUser();
    },
  });
}
function searchUser(page = 1) {
  $("#tblUser").children().remove();
  let query = {
    name: $("#searchName").val(),
    phone: $("#searchPhone").val(),
    email: $("#searchEmail").val(),
  };
  $.ajax({
    url: "/orderpurephp/business_logics/user/ListUser.php",
    data: { page: page, query: JSON.stringify(query) },
    type: "POST",
    success: function (response) {
      let res = JSON.parse(response);
      if (res.data.length > 0) {
        let count = 1;
        res.data.forEach((item, index) => {
          let div =
            "<tr><td>" +
            count +
            "</td><td>" +
            item.name +
            "</td><td>" +
            item.email +
            "</td><td>" +
            item.phone +
            "</td><td>" +
            item.type +
            "</td><td> <i class='fa fa-edit' onclick='editUser(" +
            item.id +
            ")'></i><i class='fa fa-trash text-danger' onclick='deleteUser(" +
            item.id +
            ")'></i></td>" +
            "</tr>";
          $("#tblUser").append(div);
          count++;
        });
      } else {
        $("#tblUser").append(
          "<tr class='text-center' colspan='6'>Không có dữ liệu.</tr>"
        );
      }
      $("#pagination_link").html(res.pagination);
      $("#totalRecords").html(
        `Tổng số <span class='text-primary' style='font-weight:bold; font-size: 1.25rem;'>${res.total_data}</span> kết quả tìm kiếm được`
      );
    },
  });
}

function editUser(id) {
  $.ajax({
    url: "/orderpurephp/business_logics/user/GetUserById.php",
    data: { id: id },
    type: "POST",
    success: function (response) {
      let item = JSON.parse(response);
      $("#userId").val(item.id);
      $("#userName").val(item.name);
      $("#userPhone").val(item.phone);
      $("#userEmail").val(item.email);
      $("#userType").val(item.type);
      $("#userEdit").modal("show");
    },
  });
}

function updateUser() {
  $.ajax({
    url: "/orderpurephp/business_logics/user/UpdateUser.php",
    data: $("#formUpdateUser").serialize(),
    type: "POST",
    success: function (response) {
      toastr.success(response);
      searchUser();
      $("#userEdit").modal("hide");
    },
  });
}

function deleteUser(id) {
  Swal.fire({
    title: "Bạn có chắc chắn muốn xóa?",
    text: "Bạn sẽ không thể lấy lại được dữ liệu này!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Xác nhận!",
    cancelButtonText: "Hủy",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "/orderpurephp/business_logics/user/DeleteUser.php",
        data: { id: id },
        type: "POST",
        success: function (response) {
          toastr.success(response);
          searchUser();
        },
      });
    }
  });
}

function saveOrder() {
  let code = $("#slCode").val();
  let name = $("#slName").val();
  let product = $("#slProduct").val();
  let customer = $("#slCustomer").val();
  let total = $("#slTotal").val();
  if (
    code == "" ||
    name == "" ||
    product == "" ||
    customer == "" ||
    total == ""
  ) {
    Swal.fire({
      icon: "error",
      title: "Xin lỗi",
      text: "Bạn cần phải điền đầy đủ thông tin!",
    });
    return;
  }
  $.ajax({
    url: "/orderpurephp/business_logics/orders/CreateOrder.php",
    type: "POST",
    data: $("#formCreateOrder").serialize(),
    success: (res) => {
      searchOrder();
      toastr.success(res);
    },
  });
}
function searchOrder(page = 1) {
  console.log(page);
  $("#tblOrder").children().remove();
  let query = {
    name: $("#name").val(),
    nameCus: $("#nameCus").val(),
    namePro: $("#namePro").val(),
    status: $("#statusSearch option:selected").val(),
  };
  $.ajax({
    url: "/orderpurephp/business_logics/orders/ListOrder.php",
    data: { page: page, query: JSON.stringify(query) },
    type: "POST",
    success: function (response) {
      console.log(response);
      let res = JSON.parse(response);
      if (res.data.length > 0) {
        let count = 1;
        res.data.forEach((item, index) => {
          let div = `<tr>
                        <td>${count}</td>
                        <td>${item.name}</td>
                        <td>${item.product}</td>
                        <td>${item.customer}</td>
                        <td>${item.total}</td>
                        <td>${item.user}</td>
                        <td>${item.createdDate}</td>
                        <td class='${
                          item.status == 0
                            ? "text-warning"
                            : item.status == 1
                            ? "text-success"
                            : "text-danger"
                        }'>${getStatus(item.status)}</td>
                        <td> ${
                          item.status == 0
                            ? "<i class='fa fa-check text-success mr-1 cusor'  data-bs-toggle='tooltip' data-bs-placement='bottom' title='Duyệt' onclick='accept(" +
                              item.id +
                              ")'></i>" +
                              "<i class='fa fa-times text-danger mr-1 cusor' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Từ chối' onclick='deny(" +
                              item.id +
                              ")'></i>"
                            : ""
                        } <i class='fa fa-edit text-secondary mr-1 cusor' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Chỉnh sửa' onclick='editUser(${
            item.id
          })'></i><i class='fa fa-trash text-danger mr-1 cusor' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Xóa' onclick='deleteUser(${
            item.id
          })'></i></td>
                    </tr>`;
          $("#tblOrder").append(div);
          count++;
        });
      } else {
        $("#tblUser").append(
          "<tr class='text-center' colspan='6'>Không có dữ liệu.</tr>"
        );
      }
      $("#pagination_link").html(res.pagination);
      $("#totalRecords").html(
        `Tổng số <span class='text-primary' style='font-weight:bold; font-size: 1.25rem;'>${res.total_data}</span> kết quả tìm kiếm được`
      );
    },
  });
}

function getStatus(code) {
  switch (code) {
    case "0":
      return "Chờ xác nhận";
    case "1":
      return "Đã duyệt";
    case "2":
      return "Từ chối";
  }
}

function accept(id){
  Swal.fire({
    title: "Bạn có chắc chắn muốn duyệt đơn hàng này?",
    text: "Bạn sẽ không thể lấy lại được dữ liệu này!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Xác nhận!",
    cancelButtonText: "Hủy",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "/orderpurephp/business_logics/orders/HandleOrder.php",
        data: {id: id, accept: 'accept'},
        type: 'POST',
        success: (res)=>{
          searchOrder();
          toastr.success(res);
        }
      })
    }
  });
}

function deny(id){
  Swal.fire({
    title: "Bạn có chắc chắn muốn từ chối đơn hàng này?",
    text: "Bạn sẽ không thể lấy lại được dữ liệu này!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Xác nhận!",
    cancelButtonText: "Hủy",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "/orderpurephp/business_logics/orders/HandleOrder.php",
        data: {id: id, deny: 'deny'},
        type: 'POST',
        success: (res)=>{
          searchOrder();
          toastr.success(res);
        }
      })
    }
  });
}

