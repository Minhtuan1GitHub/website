<?php
  // echo '<pre>';
  // print_r($_SESSION);
  // print_r($_POST);
  // echo '</pre>';


  $html_breadcrumb = '';
  $html_breadcrumb .= '<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item"><a href="index.php?page=member">Thông tin</a></li>
                      <li class="breadcrumb-item"><a href="index.php?page=chuyenkhoan">Đơn hàng của bạn</a></li>
  
                      <li class="breadcrumb-item active" aria-current="page">Hóa đơn</li>';


?>

<nav class="container" aria-label="breadcrumb" style="position: sticky; top: 0; margin-top: 0px">
    <ol class="breadcrumb">
        <?php echo $html_breadcrumb; ?>
    </ol>
</nav>

<div class="invoice-container container">
            <div class="invoice-header">
                <h2>Hóa Đơn</h2>
                <p>Mã đơn hàng: <?=$_SESSION['getchitiet']?></p>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Người mua:</strong> <?=$getInfo['ten'] ?></p>
                    <p><strong>Email:</strong> <?=$getInfo['email'] ?></p>
                    <p><strong>Địa chỉ:</strong> <?= $getInfo['diachi'] ?></p>
                </div>
                <div class="col-md-6 text-end">
                    <p><strong>Ngày đặt hàng:</strong> <?= $getInfo['ngaytao'] ?></p>
                    <p><strong>Phương thức thanh toán:</strong> <?=$getInfo['name']?></p>
                </div>
            </div>

            <!-- Order Details Table -->
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>Hình ảnh</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Màu sắc</th>
                        <th>Kích thước</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($getchitiet as $ct): ?>
                    <tr class="text-center">
                        <td><img src="layout/images/outerwear/<?=$ct['img']?>" alt="Product Image" width="100px" height="auto"></td>
                        <td><?= $ct['name_item'] ?></td>
                        <td><?= number_format($ct['price'], 0, ',', '.') ?>₫</td>
                        <td><?= $ct['soluong'] ?></td>
                        <td><?= color($ct['color']) ?></td>
                        <td><?= size($ct['size']) ?></td>
                        <td><?= number_format($ct['soluong'] * $ct['price'], 0, ',', '.') ?>₫</td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Summary -->
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th class="text-end">Tổng tiền sản phẩm:</th>
                            <td class="text-end"><?= number_format($ct['tienbandau'], 0, ',', '.') ?>₫</td>
                        </tr>
                        <tr>
                            <th class="text-end">Giảm giá (<?= $ct['voucher'] == 6 ? '0%' : $ct['voucher_giam'] . '%' ?>):</th>
                            <td class="text-end text-danger">- <?= number_format($ct['tienbandau'] * $ct['voucher_giam'] / 100, 0, ',', '.') ?>₫</td>
                        </tr>
                        <tr>
                            <th class="text-end">Tổng thanh toán:</th>
                            <td class="text-end text-success"><?= number_format($ct['tongtien'], 0, ',', '.') ?>₫</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Footer -->
            <div class="invoice-footer text-end" style="display: flex; flex-direction: column;">
                <p>Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi!</p>
                <div>
                  <button class="btn btn-primary" onclick="printInvoice()">In hóa đơn</button>
                </div>
            </div>
</div>

<style>
  @media print {
    body * {
        visibility: hidden;
        padding: 0px;
    }
    .btn{
        display: none;
    }
    .invoice-container, .invoice-container * {
        visibility: visible;
    }
    .invoice-container {
        position: absolute;
        left: 0;
        top: 0;
    }
}
a{
  text-decoration: none;
  color: black;
}
a:hover{
  color: red;
}
</style>

<script>
  function printInvoice() {
    window.print();
  }
</script>