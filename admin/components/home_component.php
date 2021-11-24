<div class="row m-5">
  <div class="col-sm-3">
    <div class="card shadowed-1">
      <div class="card-body">
        <h5 class="card-title">Đơn hàng</h5>
        <p class="card-text">70 đơn hàng</p>
        <a href="#" class="btn btn-primary">Xem chi tiết</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card shadowed-1">
      <div class="card-body">
        <h5 class="card-title">Người dùng</h5>
        <p class="card-text">26 người dùng</p>
        <a href="#" class="btn btn-primary">Xem chi tiết</a>
      </div>
    </div>
  </div>
</div>
<div class="row m-5 d-flex align-items-center">
  <div class="col-md-6">
  <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
  </div>
  <div class="col-md-6">
  <canvas id="myChart1" style="width:100%;max-width:600px"></canvas>
  </div>
</div>
<script>

var xValues = [100,200,300,400,500,600,700,800,900,1000];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{ 
      data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478],
      borderColor: "red",
      fill: false
    }, { 
      data: [1600,1700,1700,1900,2000,2700,4000,5000,6000,7000],
      borderColor: "green",
      fill: false
    }, { 
      data: [300,700,2000,5000,6000,4000,2000,1000,200,100],
      borderColor: "blue",
      fill: false
    }]
  },
  options: {
    legend: {display: false}
  }
});

var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
var yValues = [55, 49, 44, 24, 15];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart1", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "World Wide Wine Production 2018"
    }
  }
});
</script>
