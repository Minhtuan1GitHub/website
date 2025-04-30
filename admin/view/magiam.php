<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sales Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
</head>
<body>
  <div class="container mt-4">
    <!-- Overview Section -->
    <div class="row g-4">
      <div class="col-md-3">
        <div class="card p-3 text-center">
          <h5>Tổng Doanh Thu</h5>
          <span class="text-success">$50,000</span>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card p-3 text-center">
          <h5>Số Đơn Hàng</h5>
          <span class="text-primary">120</span>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card p-3 text-center">
          <h5>Khách Hàng Mới</h5>
          <span class="text-info">45</span>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card p-3 text-center">
          <h5>Lợi Nhuận</h5>
          <span class="text-warning">25%</span>
        </div>
      </div>
    </div>

    <!-- Revenue Chart -->
    <div class="chart-container">
      <canvas id="revenueChart"></canvas>
    </div>

    <!-- Recent Orders -->
    <div class="mt-4">
      <h5>Đơn Hàng Gần Đây</h5>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Tên Khách Hàng</th>
            <th>Tổng Tiền</th>
            <th>Trạng Thái</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Nguyễn Văn A</td>
            <td>$200</td>
            <td>Hoàn Thành</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Trần Thị B</td>
            <td>$150</td>
            <td>Đang Xử Lý</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>


  <script>
    // Revenue Chart
    const ctx = document.getElementById('revenueChart').getContext('2d');
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6'],
        datasets: [{
          label: 'Doanh Thu',
          data: [12000, 15000, 18000, 22000, 30000, 40000],
          borderColor: '#007bff',
          backgroundColor: 'rgba(0, 123, 255, 0.2)',
          borderWidth: 2,
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { display: true },
        }
      }
    });
  </script>
</body>
</html>