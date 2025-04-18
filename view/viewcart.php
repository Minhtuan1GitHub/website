<?php 
  // echo '<pre>';
  // print_r($_SESSION);
  // print_r($_POST);
  // echo '</pre>';

  



  // session_start();
  $html_cart = '';

      if (isset($_SESSION['session_user']) && count($_SESSION['session_user']) >0){
        $user = $_SESSION['session_user']['id_user'];
      }

  $tongmon = 0;
  if (isset($_SESSION['session_user']) && count($_SESSION['session_user']) > 0) {
    $user = $_SESSION['session_user']['id_user'];
    $tongmon = 0;
    $tongtiensanpham = 0;
    if (isset($_SESSION['giohang'][$user]) && !empty($_SESSION['giohang'][$user])) {
        foreach ($_SESSION['giohang'][$user] as $index => $sp) {
            extract($sp);
            $tongtien = (int)(($price_sale == 0) ? $price : $price_sale) * (int)$soluong;
            $tongmon += (int)$soluong;
            $tongtiensanpham+=$tongtien;
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
                  <span>'.$color.'</span>
                  <span>'.$size.'</span>';   
                
            if ($price_sale == 0) {
                $html_cart .= '<span>$'.$price.'</span>';
            } else {
                $html_cart .= '<span style="color: red;">$'.$price_sale.'</span>';
            }
          
            if ($description != '') {
                $html_cart .= '<span>'.$description.'</span>';
            }
          
            $html_cart .= '
              <div class="counter" style="border: 1px solid black; display: flex; justify-content: space-between; width: 120px; align-items: center; border-radius: 100px">
                <button style="border: none; background: none" onclick="giam(this)">
                  <i class = "bi bi-dash fs-4"></i>
                </button>
                <span class="soluong">
                  '.$soluong.'
                </span>
                <button style="border: none; background: none" onclick="tang(this)">
                  <i class = "bi bi-plus fs-4"></i>
                </button>
              </div>

              <a class="xoasanpham" href="index.php?page=remove&id='.$index.'" onclick="return confirm(\'Bạn có chắc chắn muốn xóa sản phẩm này không?\')">Remove</a>
            ';
            if ($limit_date_sale != '0000-00-00') {
                $date = date("d F", strtotime($limit_date_sale));
                $html_cart .= '<span style="color: red;">Limited-Time Offer until: '.$date.'</span>';
            }
            $html_cart .= '
              <span>Tổng tiền: <span class="font-weight-bold fs-5">'.$tongtien.'</span></span>
            </div>
          </div>';
        }
    }
  

} 


  // thong tin 
  $html_thongtin = '';


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
          if (isset($_SESSION['giohang'][$_SESSION['session_user']['id_user']]) && ($_SESSION['giohang'][$_SESSION['session_user']['id_user']])){
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
            <span>$<?=$tongtiensanpham?></span>    
          </div>
          <div style="display: flex; justify-content: space-between;">
            <span>Phí vận chuyển</span>
            <span>$<?=$phivanchuyen?></span>
          </div>
          <div style="display: flex; justify-content: space-between;">
            <span>Tong tien</span>
            <span><?=$tongtienvaphivanchuyen?></span>  
          </div>
          <div style="display: flex; justify-content: space-between;">
            <span>Thuế VAT</span>
            <span><?=$thue?></span>      
          </div>
          
          <div style="display: flex; justify-content: space-between; margin-top: 10px; border-top: 1px solid black;" class="font-weight-bold fs-4">
            <span>Tổng tiền</span>
            <span><?=$_SESSION['tien']?></span>
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
          <div class="modal-dialog modal-lg modal-dialog-centered">
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
                      <input type="hidden" name="tongdonhang" value="<?=$tongtiensanpham?>">
                      <input type="text" name="mavoucher" placeholder="Nhập mã">
                      <input type="submit" value="Thêm">
                    </form>
                  </div>
                  <span>Mã giảm giá có hiệu lực <?=$html_soluongvoucher?></span> </br>
                  <span>Hãy chọn mã giảm giá từ danh sách và áp dụng vào đơn hàng của bạn</span>
                  
                  <!-- <div> -->
                    <!-- <?=$html_voucher;?> -->
                  <!-- </div> -->

                  <div>
                    <form action="index.php?page=viewcart&voucher=2" method="post">
                      <?=$html_voucher;?>
                      <div>
                        <input type="hidden" name="tongdonhang" value="<?=$tongtiensanpham?>">
                        <div style="display: flex; justify-content: end; padding-right: 25px">
                          <input type="submit" value="Thêm" style="width: 70px; background: none; border: 1px solid black">
                        </div>
                      </div>
                    </form>
                  </div>

                </div>
              </div>              
            </div>
          </div>
        </div> 

              <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Xác thực thông tin và thanh toán</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                      <div class="modal-body">
                        <!-- gui mail -->
        
                      <form action="index.php?page=transfer" method="post">
                        <div class="row">

                          <div class="col" style="display: flex; flex-direction: column;">
                            <div class="thongtinkhachhang" style="margin-bottom: 100px;">
                              <div class="title">Thông tin của bạn</div>
                              <div style="display: flex; flex-direction: column">
                                <span name="ten">Tên: <?=$_SESSION['session_user']['ten']?></span>
                                <span>Số điện thoại: <?=$_SESSION['session_user']['dienthoai']?></span>
                                <span>Địa chỉ: <?=$_SESSION['session_user']['diachi']?></span>
                              </div>
                            </div>
                            <div class="thongtindonhang">
                              <div class="thongtindonhang">
                                <div class="title">Thông tin đơn hàng</div>
                                <div style="display: flex; flex-direction: column">
                                <?php
                                  $timestamp = time();
                                  $random_string = strtoupper(substr(bin2hex(random_bytes(2)), 0, 4));                                  
                                  $ma_don_hang = $_SESSION['session_user']['id_user'] . '-' . $timestamp . '-' . $random_string;
                                ?>
                                  <input type="text" name="madonhang" value="<?=$ma_don_hang;?>">
                                  <?php
                                    $list_id = [];   
                                    foreach ($_SESSION['giohang'][$_SESSION['session_user']['id_user']] as $sp) {
                                      $list_id[] = $sp['id'];
                                      ?>
                                    <?php }
                                    $id_item_json = json_encode($list_id);
                                    ?>
                                    <input type="hidden" name="id_item" value='<?= htmlspecialchars($id_item_json, ENT_QUOTES, "UTF-8") ?>'>                                      

                                  <span> Mã đơn hàng: <?=$ma_don_hang?></span>
                                  <span>Tổng tiền: <?=$_SESSION['tien']?></span>                              
                                </div>



                              </div>
                            </div>
                          </div>

                          <div class="col">
                            <span style="color: red; font-weight: bold">Quét mã và chuyển đúng số tiền cho đơn hàng của bạn. </span>
                            <span stye="color: black !important">Người bán sẽ kiểm tra trông giây lát</span>
                            <img src="layout/images/momo.jpg" alt="QR MOMO" style="width: 100%;">
                          </div>

                        </div>
                        </div>

                        <div class="modal-footer">
                          <span>Nếu đã thanh toán hãy bấm vào đây</span>
                          <!-- button chuyen khoan -->
                          <input  type="submit" class="btn-transfer" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" value="Đã chuyển khoản" name="transfer">
                          <!-- <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Đã chuyển khoản</button> -->
                        </div>
                      </form>
                    <!-- gui form -->

                  </div>
                </div>
              </div>
              <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Lời cảm ơn</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <?php
                        $voucher_tang = "chucbanvuive"; 
                      ?>
                      <span>Cảm ơn bạn vì đã lựa chọn sản phẩm của chúng tôi giữa hàng triệu những sản phẩm ngoài kia. Chúng tôi xin tặng bạn voucher <span style="color: red; font-weight: bold"> <?=$voucher_tang?> </span>thay lời cảm ơn đến bạn.</span>
                    </div>
                    <div class="modal-footer">
                      <a href="index.php">
                                <input type="submit" class="btn " data-bs-toggle="modal" value="Hẹn gặp lại">

                      </a>
                      <!-- <button  class="btn btn-primary"  data-bs-toggle="modal">Hẹn gặp lại</button> -->
                      <!-- data-bs-target="#exampleModalToggle" -->
                    </div>
                  </div>
                </div>
              </div>
              <div style="width: 100%; margin: 20px 0px">
                <?php
                  $disable = '';
                  if (isset($_SESSION['giohang'][$_SESSION['session_user']['id_user']])){
                    ?>
                    <button class="btn-thanhtoan" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Thanh toán</button> 
                  <?php }else{
                    ?>
                    <button class="btn-thanhtoan" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" disabled>Thanh toán</button> 

                  <?php }?>

              </div>
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
  .btn-thanhtoan{
    border: 1px solid black;
    width: 100%;
    border-radius: 100px;
    background: transparent;
    padding: 10px;
    transition: 0.3s ease;
    font-weight: bold;
    font-size: 24 px;
  }
  .btn-thanhtoan:hover{
    background: black;
    color: white;
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
  .title{
    font-weight: bold;
    font-size: 20px;
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
    font-weight: bold;
  }
  .btn-transfer{
    background: green;
    border: none;
    color: white;
    padding: 10px;
  }
</style>

<script>
  document.getElementById("form-thanhtoan").addEventListener("submit", function (event) {
    const diachi = "<?= $_SESSION['session_user']['diachi'] ?>";

    if (!diachi || diachi.trim() === "") {
      alert("Vui lòng cập nhật địa chỉ giao hàng trước khi thanh toán.");
      event.preventDefault(); // Ngăn form gửi đi
    }
  });

  function tang(btn){
    let counter = btn.closest('.counter');
    let span = counter.querySelector('.soluong');
    let curr = parseInt(span.innerText);
    span.innerText = curr+1;

  }
</script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<!-- get javascript -->
<script src="layout/javascript/sell.js"></script>