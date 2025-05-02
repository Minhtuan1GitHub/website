<?php
  $html_tatcakhachhang = '';
  foreach ($danhsachkhachhang as $kh) {
    extract($kh);
    $html_tatcakhachhang .= '
      <tr>
        <th>'.$id_user.'</th>
        <th>'.$ten.'</th>
        <th>'.$email.'</th>
        <th>'.$dienthoai.'</th>
        <th>'.$diachi.'</th>
        <th>'.getOrderById($id_user).'</th>
        <th>'.getTotalById($id_user).'</th>
        <th>'.$ngaydangki.'</th>
        <th>
          <span style="background: '.$background.'; padding: 4px; color: '.$color.'; font-weight: bold; display: flex; justify-content: center; border-radius: 10px">
            '.getStatusById($id_user).'
          </span>
        </th>
        <th>
          <div>
            <form action="index.php?page=unlocktaikhoan" method = "post">
              <input type="hidden" value="'.$id_user.'" name="id_user">

                '; 
                
                if ($trangthai ==1){
                  $html_tatcakhachhang .='
                  <button class="lock" type="submit" name="lock" onclick="return confirm(\'Khóa tài khoản?\')">
                    <i class="bi bi-lock-fill"></i>
                  </button>
                  <button class="lock" type="submit" name="xoa" onclick="return confirm(\'Xóa tài khoản?\')">
                    <i class="bi bi-x-lg"></i>
                  </button>
                  ';
                }else{
                  $html_tatcakhachhang .='
                  <button class="lock" type="submit" name="unlock" onclick="return confirm(\'Mở tài khoản\')">
                    <i class="bi bi-unlock-fill"></i>
                  </button>
                  ';
                }

                $html_tatcakhachhang .='
            </form>
          </div>
        </th>
      </tr>
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
            <h1>Quản lí khách hàng</h1>
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
                  <i class="bi bi-people"></i>
                </div>
                <div class="d-flex flex-column">
                  <span><?=$tongkhachhang?></span>
                  <span>Tổng khách hàng</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card order-summary-card h-100" style="border-left: 4px solid #54ad83;"> 
              <div class="card-body">
                <div class="order-summary-icon">
                  <i class="bi bi-person-plus"></i>
                </div>
                <div class="d-flex flex-column">
                  <span><?=$khachhangmoi?></span>
                  <span>Khách hàng mới</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card order-summary-card h-100" style="border-left: 4px solid #f6ac56;"> 
              <div class="card-body">
              <div class="order-summary-icon">
                  <i class="bi bi-person-up"></i>
                </div>
                <div class="d-flex flex-column">
                  <span><?=$khachhangtiemnang?></span>
                  <span>Khách hàng tiềm nâng</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card order-summary-card h-100" style="border-left: 4px solid #e7585f;"> 
              <div class="card-body">
                <div class="order-summary-icon">
                  <i class="bi bi-person-down"></i>
                </div>
                <div class="d-flex flex-column">
                  <span><?=$khachhangkemmuasam?></span>
                  <span>Khách hàng kém mua sắm</span>
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
                  <div>
                    <span>Từ ngày</span>
                    <input type="date" class="form-control" name="ngaybatdau" value="<?=$ngaybatdau?>">
                  </div>
                  <div>
                    <span>Đến ngày</span>
                    <input type="date" class="form-control" name="ngayketthuc" value="<?=$ngayketthuc?>">
                  </div>
                </div>
                <div class="col"> 
                  <div>
                    <span>Số lượng đơn</span>
                    <select name="trangthai" id="" class="form-select">
                      <option value="8">Số lượng đơn</option>
                    </select>
                  </div>
                  <div>
                    <span>Số tiền chi</span>
                      <select name="trangthai" id="" class="form-select">
                        <option value="8">Số tiền chi</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col d-flex" style="justify-content: space-between ">
                  <div style="width: 47.8%;">
                  <div>
                    <span>Thanh toán</span>
                    <select name="trangthai" id="" class="form-select">
                      <option value="4">Trạng thái</option>
                      <?=$html_thanhtoan;?>
                    </select>

                  </div>
                  <div>
                  <span>Thanh toán</span>
                    <select name="trangthai" id="" class="form-select">
                      <option value="4">Trạng thái</option>
                      <?=$html_thanhtoan;?>
                    </select>
                  </div>
                  </div>
                  <div style="display: flex; align-items: end">
                    <div>
                      <button name="loc" style="padding: 4px">
                        <i class="bi bi-funnel-fill"></i>
                        <span>Lọc</span>
                      </button>
                      <button style="padding: 4px">
                        <i class="bi bi-arrow-clockwise"></i>
                        <span>Đặt lại</span>
                      </button>
                    </div>
                  </div>

                </div>
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
            <h5>Danh sách khách hàng</h5>
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
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Địa chỉ</th>
                    <th>Số đơn hàng</th>
                    <th>Tổng chi tiêu</th>
                    <th>Ngày đăng kí</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?=$html_tatcakhachhang;?>
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
  #bang-don-hang, 
  #bang-don-hang th, 
  #bang-don-hang td {
    font-weight: normal;
    }
  .lock{
    border: none;
    background: none;
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