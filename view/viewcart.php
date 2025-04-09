<?php 
  $html_cart = '';
  // $tongtien =0;
  $tongmon = 0;
  foreach ($_SESSION['giohang'] as $index => $sp) { 
    extract($sp);
    $tongtiensanpham = (Int)(($price_sale==0)?$price:$price_sale) * (Int)$soluong; //tong tien
    // $tongtien +=$tongtiensanpham;
    $tongmon += (Int)$soluong;
    $html_cart .= '
        <div class="card" style="display: flex; flex-direction: row; margin-bottom: 20px; border: none; padding-bottom: 10px; border-bottom: 1px solid black; align-items: center; border-radius: 0px">
          <img src="layout/images/outerwear/'.$img.'" alt="" style="width: 15%; height: 15%; object-fit: cover;">
        <div class="card-body" style="display: flex; flex-direction: column;">
          <div style="display: flex; align-items: center; justify-content: space-between;">
            <span style="text-transform: uppercase;">'.$name_item.'</span>
            <button style="background: transparent; border: none">
              <i class="bi bi-heart"></i>
            </button>
          </div>
          <span>Color:</span>
          <span>Size:</span>';   
        
    if ($price_sale == 0) {
      $html_cart .= '<span>$'.$price.'</span>';
    } else {
      $html_cart .= '<span style="color: red;">$'.$price_sale.'</span>';
    }

    if ($description != '') {
      $html_cart .= '<span>'.$description.'</span>';
    }

    $html_cart .= '
      <div class="counter" style="width:15%; background: #888; border-radius: 100px; display: flex; justify-content: space-between; align-items: center;">
        <button class="decrease" data-index="'.$index.'" style="border: none; background: transparent; color: white;">
          <i class="bi bi-dash fs-4"></i>
        </button>
        <span class="count" id="count-'.$index.'" style="color: white;">'.$soluong.'</span>
        <button class="increase" data-index="'.$index.'" style="border: none; background: transparent; color: white;">
          <i class="bi bi-plus fs-4"></i>
        </button>
      </div>
      <a class="xoasanpham" href="index.php?page=remove&id='.$index.'" onclick="return confirm(\'Bạn có chắc chắn muốn xóa sản phẩm này không?\')">Remove</a>
    ';
    if ($limit_date_sale !='0000-00-00'){
      $date = date("d F",strtotime($limit_date_sale));
      $html_cart .= '<span style="color: red;">Limited-Time Offer until: '.$date.'</span>';
    }
    $html_cart .='
      <span>Tổng tiền: <span class="font-weight-bold fs-5">'.$tongtiensanpham.'</span></span>
    </div>
  </div>';
  }


  $html_voucher = '';
  $html_soluongvoucher ='';

  foreach ($voucher as $vc) {
    extract($vc);
    $slvoucher =count($voucher);

    $html_voucher .='<div class="form-check" style="display: flex; justify-content: space-between; border-top: 1px solid black; margin: 5px 0px; padding: 10px 25px">
                      <div style="display: flex; flex-direction: column">
                        <div>
                        

                          <input type="radio" class="form-check-input" name ="voucher_giam" id="radio'.$id_voucher.'" value="'.$id_voucher.'">
                          <label class="form-check-label" for="radio">'.$voucher_giam.'% - '.$voucher_name.'</label>
                        </div>  
                        <span>Expiration date: '.$voucher_date.' </span>
                        <a href="#">Chi tiết</a>
                      </div>

                      <img src="layout/images/voucher/'.$voucher_img.'" alt="" style="object-fit: cover; width: 10%">

                    </div>';
  }
  $html_soluongvoucher = $slvoucher;

  $html_breadcrumb = '';
  $html_breadcrumb .='<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item"><a href="index.php?page=men">Men</a></li>
                      <li class="breadcrumb-item active"aria-current="page">Giỏ hàng</li>

                      ';

?>



<nav class="container" aria-label="breadcrumb" style="position: sticky; top: 0; margin-top: 100px">
      
      <ol class="breadcrumb">
        <?=$html_breadcrumb;?>
      </ol>
</nav>

  




<div class="container" style="margin-top: 0px;">
    <div class="row" style="justify-content: space-between;">
      <div class="col-sm-9">

        <?=$html_cart;?>
        <?php
          if (isset($_SESSION['giohang']) && ($_SESSION['giohang'])){
            echo '<div class="container-xoatatcasanpham" >
                    <a class="xoatatcasanpham" href="index.php?page=viewcart&del=1" onclick="return confirm(\'Bạn có chắc chắn muốn xóa hết tất cả sản phẩm trong giỏ hàng\')">Xóa tất cả sản phẩm</a>
                  </div>';
          }else{
            echo '<div class="alert alert-danger" style = "border-radius: 0px; font-weight: bold; color: black">Bạn chưa có sản phẩm trong giỏ hàng</div>';
          }
        ?>


        
      </div>
      <div class="col" style="display: flex; flex-direction: column;">
        <div style="background: #DDDDDD; padding: 10px;">
          <div style="display: flex; justify-content: space-between;margin-bottom: 10px; border-bottom: 1px solid black;" class="font-weight-bold fs-4">
            <span>Tổng: </span>
            <span><?=$tongmon?> mon</span>
          </div>

          <div style="display: flex; justify-content: space-between;">
            <span>Tổng tiền sản phẩm</span>
            <span>$<?=$tongdonhang?></span>    
          </div>
          <div style="display: flex; justify-content: space-between;">
            <span>Phí vận chuyển</span>
            <span>$1</span>
          </div>
          <div style="display: flex; justify-content: space-between;">
            <span>Tổng tiền</span>  
            <span>$45.4</span>
          </div>
          <div style="display: flex; justify-content: space-between;">
            <span>Thuế VAT</span>
            <span>$0.21</span>      
          </div>
          
          <div style="display: flex; justify-content: space-between; margin-top: 10px; border-top: 1px solid black;" class="font-weight-bold fs-4">
            <span>Tổng tiền</span>
            <span><?=$tongdonhang_giamgia?></span>
          </div>
          <div></div>
        </div>

        <button class="" style="display: flex; justify-content: space-between; border: none; background: none; margin-top: 10px; border-top: 1px solid black; border-bottom: 1px solid black; padding: 10px 0px" type="button" data-bs-toggle="modal" data-bs-target="#myModal">
          <div>
            <i class="bi bi-ticket"></i>
            <span>Coupon</span>
            
            <span>(<?=$html_soluongvoucher;?>)</span>
          </div>
          <div>
            <i class="bi bi-arrow-right"></i>
          </div>
        </button>

        <div class="modal" id="myModal">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <!-- header -->
              <div class="modal-header">
                <h4 class="modal-title">Áp dụng mã giảm giá</h4>
                <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
              </div>
              <!-- modal body -->
              <div class="modal-body">
                <div>
                  <span>Nhập mã giảm giá</span>
                  <div>
                    <form action="index.php?page=viewcart&voucher=1" method="post">
                      <!-- input hidden de luu tong tien -->
                      <input type="hidden" name="tongdonhang" value="<?=$tongdonhang?>">
                      <input type="text" name="mavoucher" placeholder="Nhập mã">
                      <input type="submit" value="Thêm">
                    </form>
                  </div>
                  <span>Mã giảm giá có hiệu lực <?=$html_soluongvoucher?></span>
                  <span>Hãy chọn mã giảm giá từ danh sách và áp dụng vào đơn hàng của bạn</span>
                  
                  <!-- <div> -->
                    <!-- <?=$html_voucher;?> -->
                  <!-- </div> -->

                  <div>
                    <form action="index.php?page=viewcart&voucher=2" method="post">
                      <?=$html_voucher;?>
                      <div>
                      <input type="hidden" name="tongdonhang" value="<?=$tongdonhang?>">
                        <!-- <button class="btn btn-dark" type="button" data-bs-dismiss="modal">Áp dụng</button> -->
                        <input type="submit" value="Thêm">
                      </div>
                    </form>
                  </div>

                </div>
              </div>
              <!-- modal footer -->
              <!-- <div class="modal-footer">
                <button class="btn btn-dark" type="button" data-bs-dismiss="modal">Áp dụng</button>
                <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Hủy bỏ</button>
              </div> -->
              
            </div>
          </div>
        </div>
          

        <button class="container-checkout">
          <span class="btn-checkout">check out</span>
        </button>
      </div>
    </div>
  </div>

<style>
  .container-checkout{
    margin-top: 10px;
    background: transparent;
    border-radius: 0px;
    border: 1px solid black;
    padding: 10px;
    margin-bottom: 10px;
  }
  .btn-checkout{
    text-transform: uppercase;
  }
  .xoasanpham{
    text-decoration: none;
    margin: 5px 0px;
    color: black;
    width: 10%;
    font-weight: bold;
  }
  .xoasanpham:hover{
    color: red;
  }

  .container-xoatatcasanpham{
    margin-bottom: 20px;
  }
  .xoatatcasanpham{
    text-decoration: none;
    color: black;
    border: 1px solid black;
    padding: 10px;
    transition: 0.3s ease;
  }
  .xoatatcasanpham:hover{
    color: white;
    background: black;
  }

  a{
    text-decoration: none;
    color: black;
    transition: 0.3s ease;
  }
  a:hover{
    color: red;
  }
</style>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<!-- get javascript -->
<script src="layout/javascript/sell.js"></script>