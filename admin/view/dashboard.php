<main id="main">
  <div style="display: flex; flex-direction: column; gap: 30px">
    <!-- header -->
    <div class="page-header">
      <div class="container">
        <div class="header-content">
          <div>
            <h1>Dashboard</h1>
            <div class="data-time">
              <i class="bi bi-calendar3">
                <?php
                  date_default_timezone_set('Asia/Ho_Chi_Minh');
                  echo date("l jS \of F Y h:i:s A");
                ?>
              </i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- statistics -->
    <div class="page-order-statistics">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div>
                  <i class="bi bi-currency-exchange"></i>                
                </div>
                <div>
                  <h5>Tổng doanh thu</h5>
                  <span><?=$tongDoanhThu?></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div>
                  <i class="bi bi-boxes"></i>
                </div>
                <div>
                  <h5>Số đơn hàng</h5>
                  <span><?=$tongDonHang?></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div>
                  <i class="bi bi-person-hearts"></i>
                </div>
                <div>
                  <h5>Khách hàng mới</h5>
                  <span><?=$khachhangmoi?></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div>
                  <i class="bi bi-piggy-bank-fill"></i>
                </div>
                <div>
                  <h5>Lợi nhuận</h5>
                  <span>25%</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- chart -->
    <div class="cart">
      
      <div class="container">
        <div>
          <div class="chart-container">
            <canvas id="revenueChart" width="600" height="400"></canvas>
            <div class="dropdown" style="width: 450px; display: flex; justify-content: end">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Chọn tháng
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php foreach ($selectYear as $month): ?>
                  <li><a class="dropdown-item" href="index.php?page=dashboard&month=<?=$month['nam']?>"><?=$month['nam']?></a></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
          </div>
        </div>

      </div>
      
    </div>

   
  </div>
</main>

<style>
    .card {
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .chart-container {
      position: relative;
      height: 300px;
      margin-top: 20px;
    }
    .table thead {
      background-color: #f8f9fa;
    }
  </style>

<script>
  // Revenue Chart
  const ctx = document.getElementById('revenueChart').getContext('2d');
  const revenueData = [<?php 
    $dataPoints = [];
    foreach ($tongTienTheoThang as $tttt) {
      $dataPoints[] = $tttt['tongtien'];
    }
    echo implode(",", $dataPoints);
  ?>];
    const revenueMonth = [<?php 
    $dataPoints = [];
    foreach ($tongTienTheoThang as $tttt) {
      $dataPoints[] = $tttt['thang'];
    }
    echo implode(",", $dataPoints);
  ?>];
  new Chart(ctx, {
    type: 'line',
    data: {
      labels: revenueMonth,
      datasets: [{
        label: 'Doanh Thu',
        
        data: revenueData,
        borderColor: '#007bff',
        backgroundColor: 'rgba(0, 123, 255, 0.2)',
        borderWidth: 2,
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: true },
        title: {
          display: true,
        }
      }
      
    }
  });
  
  
</script>

<style>
    .card-body{
    display: flex;
    align-items: center;
  }
</style>