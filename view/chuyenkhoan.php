<?php
// echo '<pre>';
// print_r($_SESSION);
// print_r($_POST);
// echo '</pre>';
$html_breadcrumb = '';
$html_breadcrumb .= '<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php?page=member">Thông tin</a></li>
                        
                     <li class="breadcrumb-item active" aria-current="page">Đơn hàng của bạn</li>';
// extract($get_bill);
?>

<link rel="stylesheet" href="layout/css/dangky.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<nav class="container" aria-label="breadcrumb" style="position: sticky; top: 0; margin-top: 0px">
    <ol class="breadcrumb">
        <?php echo $html_breadcrumb; ?>
    </ol>
</nav>

<div class="container" style="margin-top: 0px;">
    <h4 style="padding-bottom: 10px; border-bottom: 1px solid black">Đơn hàng của bạn</h4>
    <div class="row" style="font-weight: bold; border-bottom: 1px solid black; padding: 10px 0;">
        <div class="col">Mã đơn hàng</div>
        <div class="col">Tên</div>
        <div class="col">Số điện thoại</div>
        <div class="col">Địa chỉ</div>
        <div class="col">Tổng tiền</div>
        <div class="col">Trạng thái thanh toán</div>
    </div>

    <?php foreach ($get_bill as $bill): ?>
    <div class="row" style="padding: 8px 0; border-bottom: 1px solid #ccc;">
        <div class="col"><?= $bill['id_bill'] ?></div>
        <div class="col"><?= $bill['ten'] ?></div>
        <div class="col"><?= $bill['sdt'] ?></div>
        <div class="col"><?= $bill['dc'] ?></div>
        <div class="col"><?= $bill['tongtien'] ?>₫</div>
        <div class="col"><?= $bill['thanhtoan'] ?></div>
    </div>
<?php endforeach; ?>

</div>

<style>
    a {
        text-decoration: none;
        color: black;
        transition: 0.3s ease;
    }
    a:hover {
        color: red;
    }
</style>

<script src="layout/javascript/dangky.js"></script>