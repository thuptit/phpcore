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
  navbarFixed();
});

function createOrder() {
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
      console.log(response);
      toastr.success(response);
      $("#userCreate").modal("hide");
      searchUser();
    },
  });
}
function searchUser(page = 1) {
  $("#tblUser").children().remove();
  let query = {
    'name': $('#searchName').val(),
    'phone': $("#searchPhone").val(),
    'email': $("#searchEmail").val()
  }
  $.ajax({
    url: "/orderpurephp/business_logics/user/ListUser.php",
    data: {page: page, query: JSON.stringify(query)},
    type: "POST",
    success: function (response) {
      console.log(response);
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
      }
      else{
        $("#tblUser").append("<tr class='text-center' colspan='6'>Không có dữ liệu.</tr>");
      }
      $('#pagination_link').html(res.pagination);
      $('#totalRecords').html(`Tổng số <span class='text-primary' style='font-weight:bold; font-size: 1.25rem;'>${res.total_data}</span> kết quả tìm kiếm được`);
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
