<?php 
    // echo '<pre>';
    // print_r($_SESSION);
    // print_r($_POST);
    // echo '</pre>';
    
  // session_start();
  $html_cart = '';

  if (isset($_SESSION['session_user']) && count($_SESSION['session_user']) > 0) {
    $user = $_SESSION['session_user']['id_user'];
    $tongmon = 0;
    $tongtiensanpham = 0;
  
    if (isset($_SESSION['giohang'][$user]) && !empty($_SESSION['giohang'][$user])) {
      $gh = -1;
  
      foreach ($_SESSION['giohang'][$user] as $index => $sp) {
        $gh += 1;
        extract($sp);
        // $tongtien = (int)(($price_sale == 0) ? $price : $price_sale) * (int)$soluong;
        if ($price_sale == 0) {
          $tongtien = (int)$price * (int)$soluong;
        } else {
          if ($limit_date_sale >= date("Y-m-d")) {
            $tongtien = (int)$price_sale * (int)$soluong;
          } else {
            $tongtien = (int)$price * (int)$soluong;
          }
        }
        $tongmon += (int)$soluong;
        $tongtiensanpham += $tongtien; 
  
        $html_cart .= '
          <div class="card mb-3 shadow-sm border-0">
            <div class="row g-0 align-items-center">
              <div class="col-md-3">
                <a href="index.php?page=sanphamchitiet&idpro='.$sp['id'].'"><img src="layout/images/outerwear/'.$img.'" class="img-fluid rounded-start" alt="'.$name_item.'"></a>
              </div>
              <div class="col-md-9">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="card-title text-uppercase">'.$name_item.'</h5>
                    <form action="index.php?page=addcart" method="post">
                      <input type="hidden" name="id" value="'.$sp['id'].'">
                      <input type="hidden" name="name_item" value="'.$name_item.'">
                      <input type="hidden" name="img" value="'.$img.'">
                      <input type="hidden" name="size" value="'.$size.'">
                      <input type="hidden" name="color" value="'.$color.'">
                      <input type="hidden" name="price" value="'.$price.'">
                      <input type="hidden" name="price_sale" value="'.$price_sale.'">
                      <input type="hidden" name="description" value="'.$description.'">
                      <input type="hidden" name="limit_date_sale" value="'.$limit_date_sale.'">
                      <input type="hidden" name="soluong" value="1">
                      
                      <button class="btn btn-outline-danger btn-sm" name="addlike">
                        <i class="bi bi-heart"></i>
                      </button>
                    </form>
                  </div>
                  <p class="mb-1"><strong>Size:</strong> '.size($size).'</p>
                  <p class="mb-1"><strong>Color:</strong> '.color($color).'</p>';
  
        if ($price_sale == 0) {
          $html_cart .= '<p class="text-muted mb-1"><strong>Price:</strong> '.$price.' k</p>';
        } else {
          if ($limit_date_sale >= date("Y-m-d")) {
            $html_cart .= '<p class="text-muted mb-1"><strong>Price:</strong> '.$price.' k</p>';         
            $html_cart .= '<p class="text-danger mb-1"><strong>Sale Price:</strong> '.$price_sale.' k</p>';
          }else{
            $html_cart .= '<p class="text-muted mb-1"><strong>Price:</strong> '.$price.' k</p>';         
          }
        }
  
        if ($description != '') {
          $html_cart .= '<p class="text-secondary"><small>'.$description.'</small></p>';
        }
  
        $html_cart .= '
                  <div class="d-flex align-items-center my-3" style="justify-content: space-between">
                    <form action="index.php?page=upsl" method="post" class="d-flex align-items-center">
                      <input type="hidden" name="id_item" value="'.$gh.'">
                      <input type="hidden" name="id_user" value="'.$_SESSION['session_user']['id_user'].'"> 
                      <button class="btn btn-outline-secondary btn-sm" name="giam">
                        <i class="bi bi-dash"></i>
                      </button>
                      <span class="mx-3">'.$soluong.'</span>
                      <button class="btn btn-outline-secondary btn-sm" name="tang">
                        <i class="bi bi-plus"></i>
                      </button>
                    </form>
                    <a class="btn btn-outline-danger btn-sm ms-3" href="index.php?page=remove&id='.$index.'" onclick="return confirm(\'Bạn có chắc chắn muốn xóa sản phẩm này không?\')">Remove</a>
                  </div>';
  
        if ($limit_date_sale >= date("Y-m-d")) {
          $date = date("d F", strtotime($limit_date_sale));
          $html_cart .= '<p class="text-danger"><strong>Limited-Time Offer:</strong> Until '.$date.'</p>';
        }
  
        $html_cart .= '
                  <p class="mb-0"><strong>Total:</strong>'.$tongtien.' k</p>
                </div>
              </div>
            </div>
          </div>';
      }
    }
    

} 
  // thong tin 
  $html_thongtin = '';

  $html_voucher = '';
  
  $html_soluongvoucher = '';

  foreach ($voucher as $vc) {
      extract($vc);
      $slvoucher = count($voucher);
  
      $html_voucher .= '
      <div class="form-check border-top py-3 px-4 d-flex align-items-center justify-content-between">
          <div>
              <input type="radio" class="form-check-input me-2" name="voucher_giam" id="radio' . $id_voucher . '" value="' . $id_voucher . '">
              <label class="form-check-label fw-bold" for="radio' . $id_voucher . '">' . $voucher_giam . '% - ' . $voucher_name . '</label>
              <small class="d-block text-muted">Expiration date: ' . $voucher_date . '</small>
              <a href="#" class="text-decoration-none text-primary">Chi tiết</a>
          </div>
  
          <div>
              <img src="layout/images/voucher/' . $voucher_img . '" alt="Voucher" class="img-fluid rounded" style="width: 80px; height: auto;">
          </div>
      </div>';
  }
  $html_soluongvoucher = $slvoucher;

  $html_breadcrumb = '';
  $html_breadcrumb .='<li class="breadcrumb-item"><a href="index.php">Home</a></li>
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
    if (isset($_SESSION['giohang'][$_SESSION['session_user']['id_user']]) && ($_SESSION['giohang'][$_SESSION['session_user']['id_user']])) {
        echo '<div class="text-end">
                <a class="btn btn-danger" href="index.php?page=viewcart&del=1" onclick="return confirm(\'Bạn có chắc chắn muốn xóa hết tất cả sản phẩm trong giỏ hàng yêu thích\')">Remove All Items</a>
              </div>';
    } else {
        echo '<div class="alert alert-danger text-center" style="border-radius: 0px; font-weight: bold; color: black">
                Bạn chưa có sản phẩm trong giỏ hàng
              </div>';
    }
    ?>


        
      </div>
      <div class="col" style="display: flex; flex-direction: column;">
        <div>
            <div class="order-summary">
              <!-- Section Title -->
              <div class="section-title d-flex justify-content-between">
                <span>Total Items:</span>
                <span><?=$tongmon?> items</span>
              </div>

              <!-- Product Total -->
              <div class="summary-item">
                <span>Product Total:</span>
                <span><?=$tongtiensanpham?> k</span>
              </div>

              <!-- Shipping Fee -->
              <div class="summary-item">
                <span>Shipping Fee:</span>
                <span><?=$phivanchuyen?>k</span>
              </div>

              <!-- Total Before Tax -->
              <div class="summary-item">
                <span>Subtotal:</span>
                <span><?=$tongtienvaphivanchuyen?> k</span>
              </div>

              <!-- VAT -->
              <div class="summary-item">
                <span>VAT:</span>
                <span><?=$thue?>k</span>
              </div>

              <!-- Final Total -->
              <div class="total d-flex justify-content-between align-items-center">
                <span>Total:</span>
                <div>
                  <?php if ($_SESSION['tien'] > 0) { ?>
                    <del class="text-muted"><?=$tongtiensanpham?> k</del>
                    <div class="discounted-price"><?=$_SESSION['tien']?> k</div>
                  <?php } else { ?>
                    <span><?=$tongtiensanpham?>đ</span>
                  <?php } ?>
                </div>
              </div>
            </div>
        </div>

        <button
          class="btn btn-light d-flex justify-content-between align-items-center border border-transparent rounded-0 mt-3 p-3"
          type="button"
          data-bs-toggle="modal"
          data-bs-target="#myModal">
          <div class="d-flex align-items-center">
            <i class="bi bi-ticket me-2"></i>
            <span>Mã giảm</span>
            <span class="badge bg-dark text-white ms-2">(<?=$html_soluongvoucher;?>)</span>
          </div>
          <div>
            <i class="bi bi-arrow-right"></i>
          </div>
        </button>

        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="myModalLabel">Áp dụng mã giảm giá</h5>
                <button
                  type="button"
                  class="btn-close btn-close-white"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>

              <!-- Modal Body -->
              <div class="modal-body">
                <!-- Input Coupon -->
                <div class="mb-4">
                  <span class="fw-bold">Nhập mã giảm giá</span>
                  <div>
                    <form action="index.php?page=viewcart&voucher=1" method="post" class="d-flex align-items-center mt-3">
                      <input
                        type="hidden"
                        name="tongdonhang"
                        value="<?=$tongtiensanpham?>"
                      />
                      <input
                        class="form-control me-3"
                        type="text"
                        name="mavoucher"
                        id="mavoucher"
                        placeholder="Nhập mã"
                        style="max-width: 300px;"
                      />
                      <button
                        class="btn btn-dark"
                        type="submit"
                        id="themm"
                        disabled
                      >
                        Áp dụng
                      </button>
                    </form>
                  </div>
                  <small class="text-muted d-block mt-2">Mã giảm giá có hiệu lực <?=$html_soluongvoucher?></small>
                </div>

                <!-- Predefined Coupons -->
                <div>
                  <span class="fw-bold">Chọn mã giảm giá từ danh sách</span>
                  <form action="index.php?page=viewcart&voucher=2" method="post" class="mt-3">
                    <?=$html_voucher;?>
                    <input
                      type="hidden"
                      name="tongdonhang"
                      value="<?=$tongtiensanpham?>"
                    />
                    <div class="text-end mt-3">
                      <button
                        class="btn btn-outline-dark"
                        type="submit"
                        style="width: 100px;"
                      >
                        Áp dụng
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

              <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
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
                                  $ma_don_hang = $_SESSION['session_user']['id_user'].$random_string.$timestamp;
                                ?>
                                  <input type="hidden" name="madonhang" value="<?=$ma_don_hang;?>"> 
                                  <?php
                                    $list_id = [];   
                                    foreach ($_SESSION['giohang'][$_SESSION['session_user']['id_user']] as $sp) {
                                      // $list_id[] = $sp['id'];
                                      $list_id[] = [
                                        'id' => $sp['id'],
                                        'soluong' => $sp['soluong'],
                                        'size' => $sp['size'],
                                        'color' => $sp['color']
                                        
                                      ];
                                      ?>
                                    <?php }
                                    $id_item_json = json_encode($list_id);
                                    ?>
                                    <input type="hidden" name="id_item" value='<?= htmlspecialchars($id_item_json, ENT_QUOTES, "UTF-8") ?>'>                                      

                                  <span> Mã đơn hàng: <?=$ma_don_hang?></span>
                                  <input type="hidden" name="tongtien" value="<?=$tongtiensanpham?>">
                                  <input type="hidden" name="tienbaclavang" value="<?php if ($_SESSION['tien'] >0){?><?=$_SESSION['tien']?><?php }else{?><?=$tongtiensanpham?><?php }?>">
                                  <?php
                                    if ($_SESSION['tien'] >0){
                                      ?>
                                      <span>Tổng tiền: <?=$_SESSION['tien']?></span>
                                    <?php }else{
                                      ?>
                                      <span>Tổng tiền: <?=$tongtiensanpham?></span>
                                    <?php }
                                  ?>
                        
                                </div>



                              </div>
                            </div>
                          </div>

                        </div>
                        </div>

                        <div class="modal-footer">
                          <input id="form-thanhtoan1" type="submit" class="btn-transfer" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" value="Cash" name="cash">
                          <input id="form-thanhtoan2" type="submit" class="btn-transfer" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" value="Momo" name="momo" style="background-color: rgba(165,0,100,255);">
                        </div>
                      </form>

                  </div>
                </div>
              </div>
              <?php
                if (!empty($_SESSION['session_user']['ten']) && !empty($_SESSION['session_user']['dienthoai']) && !empty($_SESSION['session_user']['diachi'])) {
                  ?>
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
                        </div>
                      </div>
                    </div>
                  </div>
                <?php }else{
                  ?>
                  <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <form action="index.php?page=viewcart" method="post">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Bổ sung thông tin</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="d-flex" style="flex-direction: column;">
                              <input type="hidden" name="id_user" value="<?=$_SESSION['session_user']['id_user']?>">
                              <?php
                                if (empty($_SESSION['session_user']['ten'])){ ?>
                                  <div class="mb-3">
                                      <label for="ten" class="form-label">Tên</label>
                                      <input type="text" class="form-control" id="ten" name="ten" placeholder="Nhập tên của bạn">
                                  </div>
                                <?php }
                              ?>
                              <?php
                                if (empty($_SESSION['session_user']['dienthoai'])){ ?>
                                  <div class="mb-3">
                                    <label for="dienthoai" class="form-label">Số điện thoại</label>
                                    <input type="tel" class="form-control" id="dienthoai" name="dienthoai" placeholder="Nhập số điện thoại của bạn">
                                  </div>
                                <?php }
                              ?>
                              <?php
                                if (empty($_SESSION['session_user']['diachi'])){ ?>
                                  <div class="mb-3">
                                      <label for="diachi" class="form-label">Địa chỉ</label>
                                      <input type="text" class="form-control" id="diachi" name="diachi" placeholder="Nhập địa chỉ của bạn">
                                  </div>
                                <?php }
                              ?>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" name="capnhatthongtin">
                              <i class="bi bi-arrow-right"></i>
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                <?php }
              ?>
              <!-- <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
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
                    </div>
                  </div>
                </div>
              </div> -->
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
  .order-summary {
      background-color: #f8f9fa;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .order-summary .section-title {
      font-size: 20px;
      font-weight: bold;
      border-bottom: 2px solid #ddd;
      padding-bottom: 10px;
      margin-bottom: 20px;
    }

    .order-summary .summary-item {
      display: flex;
      justify-content: space-between;
      margin-bottom: 10px;
      font-size: 16px;
    }

    .order-summary .total {
      font-size: 20px;
      font-weight: bold;
      border-top: 2px solid #ddd;
      padding-top: 10px;
      margin-top: 20px;
    }

    .order-summary del {
      color: #888;
    }

    .order-summary .discounted-price {
      color: #28a745;
      font-weight: bold;
    }
</style>

<script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById("form-thanhtoan1");
            form.addEventListener("click", function (event) {
                const diachi = "<?= $_SESSION['session_user']['diachi'] ?>";
                const dienthoai = "<?= $_SESSION['session_user']['dienthoai'] ?>";
                const ten = "<?= $_SESSION['session_user']['ten'] ?>";

                if (!ten || ten.trim() === "" || !dienthoai || dienthoai.trim() === "" || !diachi || diachi.trim() === "") {
                    alert("Vui lòng cập nhật đầy đủ thông tin (Tên, Số điện thoại, và Địa chỉ) trước khi thanh toán.");
                    event.preventDefault(); // Prevent form submission
                }
            });
        });
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById("form-thanhtoan2");
            form.addEventListener("click", function (event) {
                const diachi = "<?= $_SESSION['session_user']['diachi'] ?>";
                const dienthoai = "<?= $_SESSION['session_user']['dienthoai'] ?>";
                const ten = "<?= $_SESSION['session_user']['ten'] ?>";

                if (!ten || ten.trim() === "" || !dienthoai || dienthoai.trim() === "" || !diachi || diachi.trim() === "") {
                    alert("Vui lòng cập nhật đầy đủ thông tin (Tên, Số điện thoại, và Địa chỉ) trước khi thanh toán.");
                    event.preventDefault(); // Prevent form submission
                }
            });
        });

  function tang(btn){
    let counter = btn.closest('.counter');
    let span = counter.querySelector('.soluong');
    let curr = parseInt(span.innerText);
    span.innerText = curr+1;
  }

  document.addEventListener('DOMContentLoaded', function() {
    const mavoucher = document.getElementById('mavoucher');
    const them = document.getElementById('themm');

    function check() {
      if (mavoucher.value.trim() === '') {
        them.disabled = true;
        them.type = "password";
      } else {
        them.disabled = false; // Nếu có chữ thì mở nút
        them.type = "password";

      }
    }

    check(); // Kiểm tra ngay khi load trang
    mavoucher.addEventListener('input', check); // Kiểm tra mỗi lần người dùng gõ
  });

</script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<!-- get javascript -->
<script src="layout/javascript/sell.js"></script>