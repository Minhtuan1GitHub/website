<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản Lý Mã Giảm Giá</title>
  <!-- Link Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .card {
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .form-label {
      font-weight: bold;
    }
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }
    .filter-bar {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <!-- Section: Tổng quan mã giảm -->
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card text-center p-3">
          <h5>Tổng Số Mã Giảm Giá</h5>
          <span class="text-primary fs-3" id="totalVouchers">50</span>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-center p-3">
          <h5>Mã Còn Hạn</h5>
          <span class="text-success fs-3" id="activeVouchers">35</span>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-center p-3">
          <h5>Mã Hết Hạn</h5>
          <span class="text-danger fs-3" id="expiredVouchers">15</span>
        </div>
      </div>
    </div>

    <!-- Section: Tạo mã giảm giá -->
    <div class="card mt-4 p-4">
      <h4 class="text-center mb-4">Tạo Mã Khuyến Mãi</h4>
      <form>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label" for="voucherName">Tên Mã Khuyến Mãi</label>
            <input type="text" class="form-control" id="voucherName" placeholder="Nhập tên mã">
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label" for="expiryDate">Ngày Hết Hạn</label>
            <input type="date" class="form-control" id="expiryDate">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label" for="discountPercentage">Phần Trăm Giảm Giá (%)</label>
            <input type="number" class="form-control" id="discountPercentage" placeholder="Nhập phần trăm giảm">
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label" for="conditions">Điều Kiện Áp Dụng</label>
            <textarea class="form-control" id="conditions" rows="1" placeholder="Điều kiện áp dụng"></textarea>
          </div>
        </div>
        <button type="submit" class="btn btn-primary w-100">Tạo Mã</button>
      </form>
    </div>

    <!-- Section: Lọc và danh sách mã giảm giá -->
    <div class="mt-4">
      <div class="filter-bar">
        <h4>Danh Sách Mã Giảm Giá</h4>
        <div>
          <select class="form-select form-select-sm" style="width: auto;" id="filter">
            <option value="all">Tất Cả</option>
            <option value="active">Còn Hạn</option>
            <option value="expired">Hết Hạn</option>
          </select>
        </div>
      </div>
      <table class="table table-hover">
        <thead class="table-light">
          <tr>
            <th>#</th>
            <th>Tên Mã</th>
            <th>Ngày Hết Hạn</th>
            <th>Phần Trăm Giảm</th>
            <th>Trạng Thái</th>
            <th>Hành Động</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>SALE20</td>
            <td>2025-05-30</td>
            <td>20%</td>
            <td><span class="badge bg-success">Còn Hạn</span></td>
            <td>
              <button class="btn btn-sm btn-warning">Sửa</button>
              <button class="btn btn-sm btn-danger">Xóa</button>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>SALE50</td>
            <td>2025-04-20</td>
            <td>50%</td>
            <td><span class="badge bg-danger">Hết Hạn</span></td>
            <td>
              <button class="btn btn-sm btn-warning">Sửa</button>
              <button class="btn btn-sm btn-danger">Xóa</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Link Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>