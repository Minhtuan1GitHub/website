<?php
// echo '<pre>';
// print_r($_SESSION);
// print_r($_POST);
// echo '</pre>';
$html_breadcrumb = '';
$html_breadcrumb .= '<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php?page=member">Thông tin</a></li>
                        
                     <li class="breadcrumb-item active" aria-current="page">Đơn hàng của bạn</li>';


?>

<link rel="stylesheet" href="layout/css/dangky.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<nav class="container" aria-label="breadcrumb" style="position: sticky; top: 0; margin-top: 0px">
    <ol class="breadcrumb">
        <?php echo $html_breadcrumb; ?>
    </ol>
</nav>

<div class="container" style="margin-top: 0px; margin-bottom: 10px">
    <div style="display: flex; justify-content: space-between; padding-bottom: 10px; border-bottom: 1px solid black">
        <h4>Đơn hàng của bạn</h4>
        <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Đơn hàng
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?page=chuyenkhoan&sort=moi">Đơn hàng mới</a></li>
            <li><a class="dropdown-item" href="index.php?page=chuyenkhoan&sort=huy">Đơn hàng đã hủy</a></li>
            <li><a class="dropdown-item" href="index.php?page=chuyenkhoan&sort=dathanhtoan">Đã thanh toán</a></li>
            <li><a class="dropdown-item" href="index.php?page=chuyenkhoan&sort=chuathanhtoan" >Chưa thanh toán</a></li>
            <li><a class="dropdown-item" href="index.php?page=chuyenkhoan&sort=hoan" >Hoàn tiền</a></li>
        </ul>
        </div>
    </div>

    <table id="orderTable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Mã đơn hàng</th>
            <th>Tên</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Tổng tiền</th>
            <th>Tình trạng</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
            <th>Chi tiết đơn hàng</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($get_bill as $bill): ?>
        <tr>
            <form action="index.php?page=updateorder" method="post">
            <input type="hidden" name="id_bill" value="<?=$bill['id_bill']?>">
            <input type="hidden" name="tongtien" value="<?=$bill['tongtien']?>">

            <td class="text-center"><?= $bill['id_bill'] ?></td>
            <td>
                <!-- <form action="index.php?page=updateorder" method="post"> -->
                    <?php if ($bill['id'] == 0 || $bill['id'] == 2): ?>
                        <input type="text" value="<?= $bill['ten'] ?>" name="ten" class="form-control form-control-sm">
                    <?php else: ?>
                        <input type="text" value="<?= $bill['ten'] ?>" class="form-control-plaintext form-control-sm" disabled>
                    <?php endif; ?>
            </td>
            <td>
                    <?php if ($bill['id'] == 0 || $bill['id'] == 2): ?>
                        <input type="text" value="<?= $bill['sdt'] ?>" name="sdt" class="form-control form-control-sm">
                    <?php else: ?>
                        <input type="text" value="<?= $bill['sdt'] ?>" class="form-control-plaintext form-control-sm" disabled>
                    <?php endif; ?>
            </td>
            <td>
                    <?php if ($bill['id'] == 0 || $bill['id'] == 2): ?>
                        <input type="text" value="<?= $bill['dc'] ?>" name="dc" class="form-control form-control-sm">
                    <?php else: ?>
                        <input type="text" value="<?= $bill['dc'] ?>" class="form-control-plaintext form-control-sm" disabled>
                    <?php endif; ?>
            </td>
            <td class="text-center d"><?= number_format($bill['tongtien'], 0, ',', '.') ?>k</td>
            <td class="text-center">
                <div  style=";background: <?=$bill['background']?>; color: <?=$bill['color']?>; border-radius: 10px; padding: 3px 0px">
                    <span class="status-pill <?= $bill['trangthai'] == 'Paid' ? 'status-paid' : ($bill['trangthai'] == 'Pending' ? 'status-pending' : 'status-cancelled') ?>">
                        <?= $bill['trangthai'] ?>
                    </span>
                </div>
            </td>
            <td class="text-center" style="color: <?=$bill['mau']?>; font-weight: bold"><?= $bill['name'] ?></td>
            <td class="text-center">
                <div class="d-flex justify-content-center gap-2">
                    <?php if ($bill['id'] == 0 || $bill['id'] == 2): ?>
                        <button name="sua" class="btn btn-warning btn-sm">Sửa</button>
                    <?php else: ?>
                        <!-- <button class="btn btn-warning btn-sm" disabled>Sửa</button> -->
                    <?php endif; ?>
                        
                    <?php if ($bill['id'] == 0 || $bill['id'] == 2 || $bill['id'] == 1): ?>
                        <button name="huy" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắc muốn xóa?')">Hủy</button>
                    <?php else: ?>
                        <!-- <button class="btn btn-danger btn-sm"> Hoàn tiền</button> -->
                    <?php endif; ?>

                    <?php if ($bill['id'] == 7 && $bill['trangthaithanhtoan'] == 1):?>
                        <button name="hoantien" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắc muốn hoàn tiền?')">Hoàn tiền</button>
                    <?php else: ?>
                        <!-- <button name="hoantien" class="btn btn-danger btn-sm" disabled>Hoàn tiền</button> -->
                    <?php endif; ?>
                </div>
            </td>
            <td class="text-center">
                    <?php
                        if ($bill['trangthaithanhtoan'] === 4){
                            ?>
                            <?php
                                $timestamp = time();
                                $random_string = strtoupper(substr(bin2hex(random_bytes(2)), 0, 4));                                  
                                $ma_don_hang = $_SESSION['session_user']['id_user'].$random_string.$timestamp;
                                $_SESSION['madonhangbandau'] = $bill['id_bill'];
                             ?>
                            <input type="hidden" name="madonhang" value="<?=$ma_don_hang;?>">  
                            <input type="hidden" name="madonhangbandau" value="<?=$bill['id_bill']?>">
                            <input type="hidden" name="money" value="<?=$bill['tongtien']?>">

                            <button
                                type="submit"
                                class="btn btn-outline-pink btn-sm"
                                name="momo"
                            >
                                Momo
                            </button>
                            
                        <?php }else{
                            ?>
                            <input type="hidden" name="id_bill" value="<?= $bill['id_bill'] ?>">
                            <button class="btn btn-primary btn-sm" name="chitiet">Hóa đơn</button>
                        <?php }
                    ?>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    
</div>

<style>
    a {
        text-decoration: none;
        color: black;
        transition: 0.3s ease;
    }
    a:hover {
        color: red;
        font-weight: bold;
    }
    .chitietdon{
        border: none;
        font-size: 12px;
    }
    .btn-outline-pink {
        background: #a50064;
        color: #ffffff;
    }
    .btn-outline-pink:hover {
        background: #ffffff;
        color: #a50064;
        border: 2px solid #a50064;
    }


</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Include DataTables JS -->
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready(function () {
    $('#orderTable').DataTable({
        "pageLength": 10,      // Số dòng mỗi trang
        "lengthChange": false, // Không cho người dùng đổi số dòng
        "ordering": false,     // Không cần sắp xếp
        "searching": false,     // Tìm kiếm
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
