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
  dateStatistics();
  navbarFixed();
  statisticChart();
  formDateInput();
});
function dateStatistics(){
  let dateNow = new Date();
  for (let i = 1; i <= 12; i++) {
    if (i == dateNow.getMonth() + 1) {
      $("#slMonth").append(`<option value='${i}' selected>Tháng ${i}</option>`);
      continue;
    }
    $("#slMonth").append(`<option value='${i}'>Tháng ${i}</option>`);
  }
  for (let i = 2016; i <= dateNow.getUTCFullYear(); i++) {
    if (i == dateNow.getUTCFullYear()) {
      $("#slYear").append(`<option value='${i}' selected>Năm ${i}</option>`);
      continue;
    }
    $("#slYear").append(`<option value='${i}'>Năm ${i}</option>`);
  }
}
function formDateInput(){
  $("#datepicker").datepicker({
    showOn: "button",
    buttonImage: "http://localhost:25277/orderpurephp/assets/images/icon.png",
    buttonImageOnly: true,
    buttonText: "",
  });
  $("#eDatepicker").datepicker({
    showOn: "button",
    buttonImage: "http://localhost:25277/orderpurephp/assets/images/icon.png",
    buttonImageOnly: true,
    buttonText: "",
  });
}

async function statisticChart() {
  let month = $("#slMonth option:selected").val();
  let year = $("#slYear option:selected").val();
  let xValues = ["Chờ xác nhận", "Đã duyệt", "Từ chối"];
  let yValues = await getData(month, year);
  let barColors = ["#b91d47", "#00aba9", "#2b5797"];
  new Chart("myChart1", {
    type: "pie",
    data: {
      labels: xValues,
      datasets: [
        {
          backgroundColor: barColors,
          data: yValues,
        },
      ],
    },
    options: {
      title: {
        display: true,
        text: `Thống kê theo tháng ${month} năm ${year}`,
      },
    },
  });
}

async function getData(month, year) {
  let yValues = [];
  await $.ajax({
    url: "/orderpurephp/business_logics/orders/Statistics.php",
    data: { month: month, year: year },
    type: "POST",
    beforeSend: () =>{
      $("#modalLoad").modal("show");
    },
    success: (res) => {
      let data = JSON.parse(res);
      data.forEach((item) => {
        yValues.push(parseInt(item.total));
      });
      $("#modalLoad").modal("hide");
    },
  });
  return yValues;
}

async function getDropDownCustomer(id = "-1") {
  $("#slCustomer").children().remove();
  $("#eCustomer").children().remove();
  if (id == "-1") {
    $("#slCustomer").append(
      "<option selected disabled>Chọn khách hàng</option>"
    );
  }
  return $.ajax({
    url: "/orderpurephp/business_logics/customers/CustomersDropDown.php",
    type: "GET",
    success: (res) => {
      let data = JSON.parse(res);
      data.forEach((item) => {
        if (id != "-1") {
          if (item.id == id) {
            $("#eCustomer").append(
              `<option value='${item.id}' selected>${item.name}</option>`
            );
          } else
            $("#eCustomer").append(
              `<option value='${item.id}' >${item.name}</option>`
            );
        } else {
          $("#slCustomer").append(
            `<option value='${item.id}'>${item.name}</option>`
          );
        }
      });
    },
  });
}

async function getDropDownProduct(id = -1) {
  $("#slProduct").children().remove();
  $("#eProduct").children().remove();
  if (id == -1)
    $("#slProduct").append(
      "<option selected disabled>Chọn sản phẩm</option>"
    );
  return $.ajax({
    url: "/orderpurephp/business_logics/products/ProductsDropDown.php",
    type: "GET",
    success: (res) => {
      let data = JSON.parse(res);
      data.forEach((item) => {
        if (id != -1) {
          if (item.id == id) {
            $("#eProduct").append(
              `<option value='${item.id}' selected>${item.name}</option>`
            );
          } else
            $("#eProduct").append(
              `<option value='${item.id}' >${item.name}</option>`
            );
        } else {
          $("#slProduct").append(
            `<option value='${item.id}'>${item.name}</option>`
          );
        }
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
      $("#exampleModal").modal("hide");
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
    beforeSend: () =>{
      $("#modalLoad").modal("show");
    },
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
      $("#modalLoad").modal("hide");
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
  let product = $("#slProduct").val();
  let customer = $("#slCustomer").val();
  let total = $("#slTotal").val();
  if (code == "" || product == "" || customer == "" || total == "") {
    Swal.fire({
      icon: "error",
      title: "Đã xảy ra lỗi",
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
    beforeSend: () => {
      $("#modalLoad").modal("show");
    },
    type: "POST",
    success: function (response) {
      let res = JSON.parse(response);
      if (res.data.length > 0) {
        let count = 1;
        res.data.forEach((item, index) => {
          let div = `<tr>
                        <td>${count}</td>
                        <td>${item.name}</td>
                        <td><img src="${
                          item.url
                        }" height=100 width=100 class="img-fluid"></td>
                        <td>${item.product}</td>
                        <td>${item.customer}</td>
                        <td>${item.total}</td>
                        <td>${calculatorMoney(item.price,1)}</td>
                        <td class='text-success'>${calculatorMoney(item.price, item.total)}</td>
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
                              ")'></i>" +
                              "<i class='fa fa-edit text-secondary mr-1 cusor' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Chỉnh sửa' onclick='editOrder(" +
                              item.id +
                              ")'></i>"
                            : ""
                        } <i class='fa fa-trash text-danger mr-1 cusor' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Xóa' onclick='deleteOrder(${
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
      $("#modalLoad").modal("hide");
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

function accept(id) {
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
        data: { id: id, accept: "accept" },
        type: "POST",
        success: (res) => {
          searchOrder();
          toastr.success(res);
        },
      });
    }
  });
}

function deny(id) {
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
        data: { id: id, deny: "deny" },
        type: "POST",
        success: (res) => {
          searchOrder();
          toastr.success(res);
        },
      });
    }
  });
}

function deleteOrder(id) {
  Swal.fire({
    title: "Bạn có chắc chắn muốn hủy bỏ đơn hàng này?",
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
        url: "/orderpurephp/business_logics/orders/DeleteOrder.php",
        data: { id: id },
        type: "POST",
        success: (res) => {
          searchOrder();
          toastr.success(res);
        },
      });
    }
  });
}

function editOrder(id) {
  $.ajax({
    url: "/orderpurephp/business_logics/orders/GetOrderById.php",
    data: { id: id },
    type: "POST",
    success: async (res) => {
      let data = JSON.parse(res);
      await getDropDownCustomer(data[0].customer_id);
      await getDropDownProduct(data[0].product_id);
      $("#eId").val(data[0].id);
      $("#eCode").val(data[0].name);
      $("#eTotal").val(data[0].total);
      $("#editOrder").modal("show");
    },
  });
}
function updateOrder() {
  let code = $("#eCode").val();
  let product = $("#eProduct option:selected").val();
  let customer = $("#eCustomer option:selected").val();
  let total = $("#eTotal").val();
  let date = $('#eDatepicker').val();
  //console.log(date);
  if (code == "" || product == "" || customer == "" || total == "" || date == "") {
    Swal.fire({
      icon: "error",
      title: "Đã xảy ra lỗi",
      text: "Bạn cần phải điền đầy đủ thông tin!",
    });
    return;
  }
  $.ajax({
    url: "/orderpurephp/business_logics/orders/UpdateOrder.php",
    data: $("#formEditOrder").serialize(),
    type: "POST",
    success: (res) => {
      searchOrder();
      toastr.success(res);
      $("#editOrder").modal("hide");
    },
  });
}

function calculatorMoney(price, total){
  let money = parseInt(price)*parseInt(total);
  return (
    money.toLocaleString("vi", {
      currency: "VND",
    }) + " VNĐ"
  );
}
function exportTableToExcel(tableID, filename = ''){
  var downloadLink;
  var dataType = 'application/vnd.ms-excel';
  var tableSelect = document.getElementById(tableID);
  var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
  
  filename = filename?filename+'.xls':'excel_data.xls';

  downloadLink = document.createElement("a");
  
  document.body.appendChild(downloadLink);
  
  if(navigator.msSaveOrOpenBlob){
      var blob = new Blob(['\ufeff', tableHTML], {
          type: dataType
      });
      navigator.msSaveOrOpenBlob( blob, filename);
  }else{
      downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
  
      downloadLink.download = filename;
      downloadLink.click();
  }
}