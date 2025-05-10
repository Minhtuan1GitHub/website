<?php
  $html_tatcadonhang = '';
  foreach ($tatcadonhang as $hang) {
    extract($hang);
    $html_tatcadonhang .= '
      <tr>
        <form action="index.php?page=capnhatsanpham" method="post">
        <th>'.$id_bill.'</th>
        <th>'.$ten.'</th>
        <th>'.$ngaytao.'</th>
        <th>'.$tongtien.'</th>
        <th>
          <div style="width: 100%;">
            <span style="display: inline-block; background: '.$background.'; color: '.$color.' ;padding: 0px 10px; border-radius: 10px">
              '.$trangthai.'
            </span>
          </div>
      <input type="hidden" value='.$id_bill.' name="id_bill">
      <input type="hidden" value='.$thanhtoan.' name="thanhtoan">
        </th>
        <th>
          <div style="width: 100%">
            <span style="color: '.$mau.'">
              '.$name.'
            </span>
          </div>
        </th>
        <th class="text-center">
          <div>
            <button type="submit" style="border: 1px solic black; background: none; border-radius: 10px; width: ">
              <i class="bi bi-check"></i>
            </button>
          </div>
        </th>
        </form>
      </tr> 
    ';
  }
  $html_trangthai ='';
  foreach ($ds_trangthai as $tt) {
    extract($tt);
    $html_trangthai .= '
      <option value='.$id.'>'.$trangthai.'</option>
    ';
  }
  $html_thanhtoan = '';
  foreach ($ds_thanhtoan as $thtoan) {
    extract($thtoan);
    $html_thanhtoan .='
      <option value='.$id.'>'.$name.'</option>
    ';
  }
  
?>

<main style="background: #f7f9fd;">
  <div class="" style="display: flex; flex-direction: column; gap: 30px">
    <!-- header -->
    <div class="page-header">
      <div class="container">
        <div class="header-content">
          <div>
            <h1>Quản lí đơn hàng</h1>
            <div class="data-time">
              <i class="bi bi-calendar3"></i>
              <?php  
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                echo date("l jS \of F Y h:i:s A");
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- order statistics -->
    <div class="page-order-statistics">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="card order-summary-card h-100" style="border-left: 4px solid #6673d9;"> 
              <div class="card-body">
                <div class="order-summary-icon">
                  <i class="bi bi-cart"></i>
                </div>
                <div class="d-flex flex-column">
                  <span><?=$tongdonhang['total']?></span>
                  <span>Tổng đơn hàng</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card order-summary-card h-100" style="border-left: 4px solid #54ad83;"> 
              <div class="card-body">
                <div class="order-summary-icon">
                  <i class="bi bi-check-circle"></i>
                </div>
                <div class="d-flex flex-column">
                  <span><?=$donhangthanhcong['total']?></span>
                  <span>Đơn hoàn thành</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card order-summary-card h-100" style="border-left: 4px solid #f6ac56;"> 
              <div class="card-body">
              <div class="order-summary-icon">
                  <i class="bi bi-clock-history"></i>
                </div>
                <div class="d-flex flex-column">
                  <span><?=$donhangdangxuli['total']?></span>
                  <span>Đơn đang xử lí</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card order-summary-card h-100" style="border-left: 4px solid #e7585f;"> 
              <div class="card-body">
                <div class="order-summary-icon">
                  <i class="bi bi-x-circle"></i>
                </div>
                <div class="d-flex flex-column">
                  <span><?=$donhangbihuy['total']?></span>
                  <span>Đơn hàng bị hủy</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- filter -->
    <div class="page-filter" style="margin-bottom: 20px;">
      <div class="container">
        <div class="card">
          <div class="card-body">
            <form action="index.php?page=donhang" method="post" style=" width: 100%; display: flex; flex-direction: column; gap: 20px">
              <div class="row w-100">
                <div class="col">
                  <span>Từ ngày</span>
                  <input type="date" class="form-control" name="ngaybatdau" value="<?=$ngaybatdau?>">
                </div>
                <div class="col">
                  <span>Đến ngày</span>
                  <input type="date" class="form-control" name="ngayketthuc" value="<?=$ngayketthuc?>">
                </div>
                <div class="col">
                  <span>Trạng thái</span>
                  <select name="trangthai" id="" class="form-select">
                    <option value="8">Trạng thái</option>
                    <?=$html_trangthai;?>
                  </select>
                </div>
                <div class="col">
                  <span>Thanh toán</span>
                  <select name="trangthai" id="" class="form-select">
                    <option value="4">Trạng thái</option>
                    <?=$html_thanhtoan;?>
                  </select>
                </div>
              </div>
              <div class="w-100" style="display: flex; justify-content: end; gap: 10px">
                <button name="loc">
                  <i class="bi bi-funnel-fill"></i>
                  <span>Lọc</span>
                </button>
                <button>
                  <i class="bi bi-arrow-clockwise"></i>
                  <span>Đặt lại</span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- order table -->
    <div class="page-order-table container">

        <div class="card">
          <div class="card-header" style="display: flex; justify-content: space-between">
            <h5>Danh sách đơn hàng</h5>
            <div class="dropdown">
              <button class="dropdown-toggle" data-bs-toggle="dropdown">
                  <i class="bi bi-file-earmark-arrow-down"></i>
              </button>
              <ul class="dropdown-menu">
              <li><a href="#" class="dropdown-item">pdf</a></li>
              <li><a href="#" class="dropdown-item">excel</a></li>
              <li><a href="#" class="dropdown-item">check</a></li>
              </ul>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive w-100">
              <table class="table table-hover" id="bang-don-hang">
                <thead>
                  <tr>
                    <th>Mã đơn</th>
                    <th>Khách hàng</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Thanh toán</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?=$html_tatcadonhang;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
  </div>
  </main>

  <style>

  .card-body{
    display: flex;
    align-items: center;
  }

  
  
</style>

<script>
  $(document).ready(function () {
    $('#bang-don-hang').DataTable({
        "pageLength": 10,      // Số dòng mỗi trang
        "lengthChange": false, // Không cho người dùng đổi số dòng
        "ordering": false,     // Không cần sắp xếp
        "info": true,
        "language": {
              "info": "Hiển thị _START_ đến _END_ của _TOTAL_ dòng",
              "search": "Tìm kiếm:",
              "paginate": {
                  "previous": "Trước",
                  "next": "Sau"
              }


          }
    });
  });
</script>