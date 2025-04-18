<?php
// echo '<pre>';
// print_r($_SESSION);
// print_r($_POST);
// echo '</pre>';
$html_breadcrumb = '';
$html_breadcrumb .= '<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php?page=member">Thông tin</a></li>
                        
                     <li class="breadcrumb-item active" aria-current="page">Đơn hàng của bạn</li>';
$html_chitiet = '';
foreach ($getchitiet as $ct) {
    $html_chitiet .='
    ';
}

?>

<link rel="stylesheet" href="layout/css/dangky.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<nav class="container" aria-label="breadcrumb" style="position: sticky; top: 0; margin-top: 0px">
    <ol class="breadcrumb">
        <?php echo $html_breadcrumb; ?>
    </ol>
</nav>

<div class="container" style="margin-top: 0px; margin-bottom: 10px">
    <h4 style="padding-bottom: 10px; border-bottom: 1px solid black">Đơn hàng của bạn</h4>
    <div class="row" style="font-weight: bold; border-bottom: 1px solid black; padding: 10px 0;">
        <div class="col">Mã đơn hàng</div>
        <div class="col-1">Tên</div>
        <div class="col">Số điện thoại</div>
        <div class="col">Địa chỉ</div>
        <div class="col-1">Tổng tiền</div>
        <div class="col">Trạng thái thanh toán</div>
        <div class="col">Chi tiết đơn hàng</div>
    </div>

    <?php foreach ($get_bill as $bill): ?>
    <div class="row" style="padding: 8px 0; border-bottom: 1px solid #ccc;">
        <div class="col"><?= $bill['id_bill'] ?></div>
        <div class="col-1"><?= $bill['ten'] ?></div>
        <div class="col"><?= $bill['sdt'] ?></div>
        <div class="col"><?= $bill['dc'] ?></div>
        <div class="col-1"><?= $bill['tongtien'] ?>₫</div>
        <div class="col" style="background: <?=$bill['background']?>; color: <?=$bill['color']?>; font-weight: bold; border-radius: 8px; display:flex; justify-content: center; align-items: center; gap: 3px">
            <?= $bill['icon'] ?>
            <?= $bill['trangthai'] ?>
        </div>
        <div class="col" style="display: flex; justify-content: start">
            <form action="index.php?page=chitiet" method="post">
                <input type="hidden" name="id_bill" value="<?=$bill['id_bill']?>">
                <button class="chitietdon" name="chitiet">Chi tiết</button>
            </form>

        </div>
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
        font-weight: bold;
    }
    .chitietdon{
        background: transparent;
        border: none;

    }


</style>

<script src="layout/javascript/dangky.js"></script>