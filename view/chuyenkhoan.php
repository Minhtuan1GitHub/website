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
    <div style="display: flex; justify-content: space-between; padding-bottom: 10px; border-bottom: 1px solid black">
        <h4>Đơn hàng của bạn</h4>
        <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown button
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
        </div>
    </div>
    <div class="row" style="font-weight: bold; border-bottom: 1px solid black; padding: 10px 0;">
        <div class="col">Mã đơn hàng</div>
        <div class="col-1">Tên</div>
        <div class="col">Số điện thoại</div>
        <div class="col">Địa chỉ</div>
        <div class="col-1">Tổng tiền</div>
        <div class="col">Trạng thái</div>
        <div class="col">Thanh toán</div>
        <div class="col">Thao tác</div>
        <div class="col">Chi tiết đơn hàng</div>
    </div>

    <?php foreach ($get_bill as $bill): ?>
        <form action="index.php?page=updateorder" method="post">
            <div class="row" style="padding: 8px 0; border-bottom: 1px solid #ccc;">
                <div class="col"><?= $bill['id_bill'] ?></div>
                <div class="col">
                    <?php
                        if ($bill['id'] == 0 || $bill['id'] == 2) {
                            ?>
                            <input type="text" value="<?= $bill['ten']?>" style="width: 100%;" name="ten">
                        <?php }else{
                            ?>
                            <input type="text" value="<?= $bill['ten']?>" style="width: 100%; background: none; border: none" disabled>
                        <?php }
                    ?>
                </div>
                <div class="col">
                    <?php
                            if ($bill['id'] == 0 || $bill['id'] == 2) {
                                ?>
                                <input type="text" value="<?= $bill['sdt']?>" style="width: 100%;" name="sdt">
                            <?php }else{
                                ?>
                                <input type="text" value="<?= $bill['sdt']?>" style="width: 100%; background: none; border: none" disabled>
                            <?php }
                    ?>
                </div>
                <div class="col">
                    <?php
                            if ($bill['id'] == 0 || $bill['id'] == 2) {
                                ?>
                                <input type="text" value="<?= $bill['dc']?>" style="width: 100%;" name="dc">
                            <?php }else{
                                ?>
                                <input type="text" value="<?= $bill['dc']?>" style="width: 100%; background: none; border: none" disabled>
                            <?php }
                    ?>

                </div>
                <div class="col"><?= $bill['tongtien'] ?>₫</div>
                <div class="col" style="background: <?=$bill['background']?>; color: <?=$bill['color']?>; font-size: 13px; height: 35px ;font-weight: bold; border-radius: 100px; display:flex; justify-content: center; align-items: center; gap: 3px;">
                    <?= $bill['trangthai'] ?>
                    <input type="hidden" value="<?=$bill['id']?>" name="trangthai">
                </div>
                <div class="col" style="color: <?=$bill['mau']?>; font-size: 13px; ">
                    <?=$bill['name']?>
                </div>
                <div class="col">
                    <div style="display: flex; flex-direction: row; gap: 10px">
                        <?php 
                            if ($bill['id'] ==0 || $bill['id'] == 2){
                                ?>
                                
                                    <button name="sua" style="border: none;">
                                        <i class="bi bi-tools"></i>
                                        <span>Sửa</span>
                                    </button>
                                    
                            <?php }else {
                                ?>
                                <button disabled style="background: none; border: none">
                                    <i class="bi bi-tools"></i>
                                    <span>Sửa</span>
                                </button>
                                
                            <?php }
                        ?>
                        <?php
                            if ($bill['id'] ==0 || $bill['id'] == 2 || $bill['id'] == 1){
                                ?>
                                                            
                                    <button name="huy" style="border: none;" onclick="return confirm('Bạn có chắc chắc muốn xóa?') ">
                                        <i class="bi bi-x"></i>
                                        <span>Hủy</span>
                                    </button>
                            <?php }else {
                                ?>
                                <button disabled style="background: none; border: none">
                                    <i class="bi bi-x-lg"></i>
                                    <span>Hủy</span>
                                </button>
                                
                            <?php }
                        ?>
  
                    </div>
                </div>

                <div class="col" style="display: flex; justify-content: start">
                    <!-- <form action="index.php?page=chitiet" method="post" style="display: flex;"> -->
                        <input type="hidden" name="id_bill" value="<?=$bill['id_bill']?>">
                        <div style="display: flex;">
                            <button class="chitietdon" name="chitiet">Chi tiết đơn hàng</button>
                        </div>
                    <!-- </form> -->
                </div> 
            </div>
        </form>


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
        border: none;
        font-size: 12px;
    }

    /* .chitietdon{
        background: transparent;
        border: 1px solid transparent;
        color:rgb(255, 87, 125);
        animation: inout 2.5s ease-in-out infinite;
    } */
    /* @keyframes inout{
        0%{
            transform: scale(1);
        }
        50%{
            transform: scale(1,2);
        }
        100%{
            transform: scale(1);
        }
    } */



</style>




<script src="layout/javascript/dangky.js"></script>