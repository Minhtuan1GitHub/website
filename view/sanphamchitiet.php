<?php 
      // echo '<pre>';
      // print_r($_SESSION);
      // print_r($_POST);
      // print_r($_GET); 
      // echo '</pre>';
  $html_sanphamchitiet = '';

    if ($sanphamchitiet){
      extract($sanphamchitiet);
    }
    extract($hinhanhlienquan);

    extract($style);

    $link='index.php?page=men&dm_id='.$dm_id; 
    $html_breadcrumb = '';
    $html_breadcrumb .='<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="index.php?page=men">Men</a></li>
                        <li class="breadcrumb-item"><a href="'.$link.'">'.$name.'</a></li>
                        ';
                        if ($name_item!=""){
                          $html_breadcrumb .='<li class="breadcrumb-item active" aria-current="page">'.$name_item.'</li>
                          ';
                        }
    $html_binhluan = '';
    foreach ($danhsachbinhluan as $binhluan) {
      extract($binhluan);
      $html_binhluan .= '
        <div class="card mb-3 shadow-sm border-0 rounded">
          <div class="card-body">
            <!-- Header: Nickname and Date -->
            <div class="d-flex justify-content-between align-items-center mb-3">
              ' . htmlspecialchars($nickname) . '
              <small class="text-muted">' . htmlspecialchars($date) . '</small>
            </div>

            <!-- Rating -->
            <div class="mb-3 text-warning">';
              for ($i = 1; $i <= 5; $i++) {
                if ($i <= $sao) {
                  $html_binhluan .= '<i class="fas fa-star"></i>'; // Filled star
                } else {
                  $html_binhluan .= '<i class="far fa-star"></i>'; // Empty star
                }
              }
      $html_binhluan .= '
            </div>

            <!-- Content: Size, Color, and Comment -->
            <p class="mb-1"><strong>Đã mua size:</strong> ' . htmlspecialchars($size) . '</p>
            <p class="mb-1"><strong>Đã mua màu:</strong> ' . htmlspecialchars($color) . '</p>
            <p class="card-text mt-3">' . htmlspecialchars($noidung) . '</p>

            <!-- Footer: User Details -->
            <div class="d-flex justify-content-end text-muted small">
              <div class="me-3"><strong>Tên:</strong> ' . htmlspecialchars($ten) . '</div>
              <div class="me-3"><strong>Tuổi:</strong> ' . htmlspecialchars($age) . '</div>
              <div><strong>Địa chỉ:</strong> ' . htmlspecialchars($diachi) . '</div>
            </div>
          </div>
        </div>
      ';
    }


  extract($getavg); 
  
  

?>


<nav class="container" aria-label="breadcrumb" style="position: sticky; top: 0; margin-top: 100px">
      
      <ol class="breadcrumb">
        <?=$html_breadcrumb;?>
      </ol>
</nav>




<div class="container-fluid" style="margin-top: 0px;">

    <!-- container -->
    <div class="container">
      <!-- row -->
      <div class="row">
        <!-- col -->
        <div class="col-lg-7"> 
          <!-- img -->
          <div>
            <div class="row g-0">

              <div class="col-sm-6 col-xs-12">
                <div class="card" style="border: none;">
                  <img src="layout/images/outerwear/<?=$img?>" alt="" style="width: 100%;">
                </div>
              </div>
              <div class="col-sm-6 d-none d-sm-block">
                <div class="card" style="border: none;">
                  <img src="layout/images/item_lienQuan/<?=$hinh2?>" alt="" style="width: 100%;">
                </div>
              </div>
              <div class="col-sm-6 d-none d-sm-block">
                <div class="card" style="border: none;">
                  <img src="layout/images/item_lienQuan/<?=$hinh3?>" alt="" style="width: 100%;">
                </div>
              </div>
              <div class="col-sm-6 d-none d-sm-block">
                <div class="card" style="border: none;">
                  <img src="layout/images/item_lienQuan/<?=$hinh4?>" alt="" style="width: 100%;">
                </div>
              </div>
            </div>
          </div>

          <div>
            <h4>Description</h4>
            <span>Product ID: <?=$sanphamchitiet['id']?> </span>
          </div>

          <div>

            
            <?php
              if (!empty($name_style_1)) {
                  echo <<<HTML
                  <div>
                    <h4>Gợi ý phong cách</h4>
                  </div>
                  <div id="carouselExample" class="carousel slide">
                      <div class="carousel-inner">
                          <div class="carousel-item active">
                              <div class="row g-0">
                                  <div class="col-lg-4">
                                      <div class="card" style="border: none;">
                                          <i class="bi bi-heart btn" style="position: absolute; right: 0"></i>
                                          <img src="layout/images/style/{$img_style_1}" alt="">
                                          <div class="card-body" style="display: flex; gap: 10px; align-items: center;">
                                              <img src="layout/images/style/{$img}" alt="" style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                                              <div style="display: flex; flex-direction: column;">
                                                  <span>{$name_style_1}</span>
                                                  <span>Size: {$size_style_1}</span>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="col-lg-4">
                                      <div class="card" style="border: none;">
                                          <i class="bi bi-heart btn" style="position: absolute; right: 0"></i>
                                          <img src="layout/images/style/{$img_style_2}" alt="">
                                          <div class="card-body" style="display: flex; gap: 10px; align-items: center;">
                                              <img src="layout/images/outerwear/item2.avif" alt="" style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                                              <div style="display: flex; flex-direction: column;">
                                                  <span>{$name_style_2}</span>
                                                  <span>Size: {$size_style_2}</span>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="col-lg-4">
                                      <div class="card" style="border: none;">
                                          <i class="bi bi-heart btn" style="position: absolute; right: 0"></i>
                                          <img src="layout/images/style/{$img_style_3}" alt="">
                                          <div class="card-body" style="display: flex; gap: 10px; align-items: center;">
                                              <img src="/image/bg.jpg" alt="" style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                                              <div style="display: flex; flex-direction: column;">
                                                  <span>Alan 5' 11''</span>
                                                  <span>Size: M</span>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="carousel-item ">
                              <div class="row g-0">
                                  <div class="col-lg-4">
                                      <div class="card" style="border: none;">
                                          <i class="bi bi-heart btn" style="position: absolute; right: 0"></i>
                                          <img src="layout/images/style/{$img_style_1}" alt="">
                                          <div class="card-body" style="display: flex; gap: 10px; align-items: center;">
                                              <img src="layout/images/style/{$img}" alt="" style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                                              <div style="display: flex; flex-direction: column;">
                                                  <span>{$name_style_1}</span>
                                                  <span>Size: {$size_style_1}</span>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="col-lg-4">
                                      <div class="card" style="border: none;">
                                          <i class="bi bi-heart btn" style="position: absolute; right: 0"></i>
                                          <img src="layout/images/style/{$img_style_2}" alt="">
                                          <div class="card-body" style="display: flex; gap: 10px; align-items: center;">
                                              <img src="layout/images/outerwear/item2.avif" alt="" style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                                              <div style="display: flex; flex-direction: column;">
                                                  <span>{$name_style_2}</span>
                                                  <span>Size: {$size_style_2}</span>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="col-lg-4">
                                      <div class="card" style="border: none;">
                                          <i class="bi bi-heart btn" style="position: absolute; right: 0"></i>
                                          <img src="layout/images/style/{$img_style_3}" alt="">
                                          <div class="card-body" style="display: flex; gap: 10px; align-items: center;">
                                              <img src="/image/bg.jpg" alt="" style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                                              <div style="display: flex; flex-direction: column;">
                                                  <span>Alan 5' 11''</span>
                                                  <span>Size: M</span>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- Các slide khác -->
                      </div>

                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" style="left: -5.9%; top: -30%;">
                          <i class="bi bi-arrow-left fs-4" aria-hidden="true" style="background: #888; color: white;"></i>
                          <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next" style="right: -5.9%; top: -30%;">
                          <i class="bi bi-arrow-right fs-4" aria-hidden="true" style="background: #888; color: white;"></i>
                          <span class="visually-hidden">Next</span>
                      </button>
                  </div>
              HTML;
              }
              ?>
          </div>

              <div style="display: flex; justify-content: space-between; margin: 10px 0px">
                <h3>Bình luận</h3>
                <div style="display: flex; align-items: center; gap: 0px; justify-content: space-between">
                  <?php 
                    if ($_SESSION['session_user']['trangthai'] =="Khóa"){
                      ?>
                    <button class="btn text-secondary" onclick="alert('Tài khoản của bạn đã bị khóa. Bạn không thể viết bình luận!')">
                      <i class="bi bi-pen text-secondary"></i>
                      <span>Viết bình luận</span>
                    </button>
                    <?php }else{ ?>
                      <button class="btn" data-bs-toggle="modal" data-bs-target="#binhluan">
                        <i class="bi bi-pen"></i>
                        <span>Viết bình luận</span>
                      </button>
                    <?php }
                  ?>
                </div>
              </div>

              <div>
                <?=$html_binhluan;?>
              </div>

              <!-- modal -->
              <?php
                if (isset($_SESSION['session_user']) && (count($_SESSION['session_user']) >0)){
                  $_SESSION['idpro'] = $sanphamchitiet['id'];
                ?>
                  <div class="modal" id="binhluan">
                  <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h5 class="modal-title" id="commentModalLabel">Bình luận</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <!-- Modal Body -->
                  <div class="modal-body">
                    <form action="index.php?page=sanphamchitiet&idpro=<?=$sanphamchitiet['id']?>" method="post">
                      <!-- Comment Content -->
                      <div class="mb-3">
                        <label for="noidung" class="form-label">Nội dung bình luận</label>
                        <textarea class="form-control" name="noidung" id="noidung" rows="5" placeholder="Nhập nội dung bình luận"></textarea>
                      </div>

                      <!-- Size -->
                      <div class="mb-3">
                        <label for="size" class="form-label">Size</label>
                        <input type="text" class="form-control" name="size" id="size" placeholder="Nhập size">
                      </div>

                      <!-- Color -->
                      <div class="mb-3">
                        <label for="color" class="form-label">Color</label>
                        <input type="text" class="form-control" name="color" id="color" placeholder="Nhập màu sắc">
                      </div>

                      <!-- Rating -->
                      <div class="mb-3">
                        <label class="form-label">Đánh giá</label>
                        <div class="rating d-flex gap-1">
                          <input value="5" name="rating" id="star5" type="radio">
                          <label for="star5" class="bi bi-star-fill"></label>
                          <input value="4" name="rating" id="star4" type="radio">
                          <label for="star4" class="bi bi-star-fill"></label>
                          <input value="3" name="rating" id="star3" type="radio">
                          <label for="star3" class="bi bi-star-fill"></label>
                          <input value="2" name="rating" id="star2" type="radio">
                          <label for="star2" class="bi bi-star-fill"></label>
                          <input value="1" name="rating" id="star1" type="radio">
                          <label for="star1" class="bi bi-star-fill"></label>
                        </div>
                      </div>

                      <!-- Nickname -->
                      <div class="mb-3">
                        <label for="nickname" class="form-label">Nickname</label>
                        <input type="text" class="form-control" name="nickname" id="nickname" placeholder="Nhập nickname">
                      </div>

                      <!-- Submit Button -->
                      <div class="modal-footer">
                        <button type="submit" name="guibinhluan" class="btn btn-submit w-100">Gửi</button>
                      </div>
                    </form>
                  </div>
                </div>
                  </div>
                </div>
                  
                <?php 
                  }else{
                ?>
                    <div class="modal fade" id="binhluan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content custom-modal">

                          <!-- Header -->
                          <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                            <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>

                          <!-- Body -->
                          <div class="modal-body text-center">
                            <p class="body-tb">Bạn cần phải đăng nhập để có thể bình luận</p>
                            <?php 
                              $_SESSION['trang'] = "sanphamchitiet";
                              $_SESSION['idpro'] = $sanphamchitiet['id'];
                            ?>
                            <p>
                              Nhấn vào 
                              <a href="index.php?page=dangnhap" class="btn btn-outline-primary btn-sm mx-1">
                                <i class="bi bi-person"></i> Đăng nhập
                              </a>
                            </p>
                            <p>
                              Nhấn vào 
                              <a href="index.php?page=dangky" class="btn btn-outline-success btn-sm mx-1">
                                <i class="bi bi-person-fill-add"></i> Đăng ký
                              </a>
                            </p>
                          </div>

                        </div>
                      </div>
                    </div>
                  <?php
                  
                  }?>
    
 
          


        </div>
        <!-- col -->
      <div class="col-lg-5" style="display: flex; flex-direction: column; ">

        <div style="position: sticky; top: 100px;">

          <div style="display: flex">
            <!-- tao form cart -->
            <form action="index.php?page=addcart" method="post" style="display: flex; flex-direction: column; width: 100%"> 
                <div>
                  <div>
                    <input type="hidden" name="id" value="<?=$sanphamchitiet['id']?>">
                    <input type="hidden" name="img" value="<?=$img?>">
                    <input type="hidden" name="name_item" value="<?=$name_item?>">
                    <input type="hidden" name="description" value="<?=$description?>">
                    <input type="hidden" name="limit_date_sale" value="<?=$limit_date_sale?>">
                    <input type="hidden" name="price" id="selected_price" value="<?=$defaultPrice['price']?>">
                    <input type="hidden" name="price_sale" id="selected_price_sale" value="<?=$defaultPrice['price_sale']?>">
                    <div style="display: flex; flex-direction: column">

                    <div style="display: flex; justify-content: space-between; text-align: center">
                      <span style="font-size: 30px;"><?=$name_item?></span>
                      <div style="display: flex;  align-items: center; gap: 10px">
                        <i class="bi bi-share"></i>
                        <button style="border: none; background: none" name="addlike"<?php if (!isset($_SESSION['session_user']) || count($_SESSION['session_user']) === 0) echo 'onclick="dangnhap(); return false;"'; ?>>
                          <i class="bi bi-heart"></i>
                        </button>
                      </div>
                    </div> 

                    <!-- color -->
                    <div style="display: flex; gap: 10px; margin-top: 10px; margin-bottom: 10px">
                      <?php 
                        $defaultColor = null;
                        $colorsWithStock = getColorWithStock($sanphamchitiet['id']);
                        foreach ($colorsWithStock as $cl) {
                          if ($defaultColor === null) {
                            $defaultColor = $cl;
                          }
                          ?>
                          <button type="button" class="color-btn <?= (!isset($_GET['color']) && $cl === $defaultColor) || (isset($_GET['color']) && $_GET['color'] == $cl['id_color']) ? 'selected' : '' ?>" 
                                  data-color-id="<?=htmlspecialchars($cl['id_color'])?>" 
                                  onclick="chonMau(this, '<?=htmlspecialchars($cl['id_color'])?>')">
                            <?=htmlspecialchars($cl['color'])?>
                            
                          </button>
                        <?php }
                      ?>
                    </div>
                    <!-- size -->
                    <div id="size-container" style="display: flex; gap: 10px; margin-top: 10px; margin-bottom: 10px">
                      <?php
                        $defaultSize = null;
                        $selectedColorId = isset($_GET['color']) ? $_GET['color'] : ($defaultColor ? $defaultColor['id_color'] : null);
                        $sizesWithStock = getSizeWithStock($sanphamchitiet['id'], $selectedColorId);
                        if ($sizesWithStock) {
                          foreach ($sizesWithStock as $sz) {
                            if ($defaultSize === null) {
                              $defaultSize = $sz;
                            }
                            $stock = getStock($sanphamchitiet['id'], $selectedColorId, $sz['id_size']);
                            ?>
                            <button type="button" 
                                    class="size-btn <?= (!isset($_GET['size']) && $sz === $defaultSize) || (isset($_GET['size']) && $_GET['size'] == $sz['id_size']) ? 'selected' : '' ?>"
                                    data-size-id="<?=htmlspecialchars($sz['id_size'])?>" 
                                    onclick="chonSize(this, '<?=htmlspecialchars($sz['id_size'])?>')"
                                    <?= $stock <= 0 ? 'disabled' : '' ?>>
                              <?=htmlspecialchars($sz['size'])?>
                              <?php if ($stock <= 0): ?>
                                <span class="out-of-stock">(Hết hàng)</span>
                              <?php endif; ?>
                            </button>
                          <?php 
                          }
                        }
                      ?>
                    </div>

                    <input type="hidden" name="color" id="selected-color" value="<?= isset($_GET['color']) ? htmlspecialchars($_GET['color']) : ($defaultColor ? htmlspecialchars($defaultColor['id_color']) : '') ?>">
                    <input type="hidden" name="size" id="selected-size" value="<?= isset($_GET['size']) ? htmlspecialchars($_GET['size']) : ($defaultSize ? htmlspecialchars($defaultSize['id_size']) : '') ?>">

                    <div style="display: flex; justify-content: space-between">
                        <div style="display: flex; text-align: center; gap: 10px; align-items: center">
                          <?php
                            if ($defaultPrice['price_sale'] == 0): ?>
                                <div class="text-primary" style="font-size: 40px;"><?=$defaultPrice['price']?>k</div>
                            <?php else: ?>
                                <?php if ($defaultPrice['limit_date_sale'] >= date('Y-m-d H:i:s')): ?>
                                    <div class="text-primary" style="font-size: 20px; text-decoration: line-through;"><?=$defaultPrice['price']?>k</div>
                                    <div class="text-danger" style="font-size: 40px;"><?=$defaultPrice['price_sale']?>k</div>
                                <?php else: ?>
                                    <div class="text-primary" style="font-size: 40px;"><?=$defaultPrice['price']?>k</div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <div style="display: flex; text-align: center; gap: 10px; align-items: center">

                          <?php
                            if ($getavg['avg_sao'] == 0){
                          ?>
                            <div>Chưa có lượt đánh gia nào</div>
                          <?php
                          }else{?>
                            <?php if (number_format($getavg['avg_sao']) <2){
                              ?>
                              <div>
                                <i class="bi bi-star-half"></i>
                              </div>
                            <?php }else if (number_format($getavg['avg_sao'])<3){
                              ?>
                              <div>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                              </div>
                            <?php }else if (number_format($getavg['avg_sao'])<4){
                              ?>
                              <div>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                              </div>
                            <?php }else if (number_format($getavg['avg_sao'])<5){
                              ?>
                              <div>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                              </div>
                            <?php }else{
                              ?>
                              <div>
                              <i class="bi bi-star-fill"></i>
                              <i class="bi bi-star-fill"></i>
                              <i class="bi bi-star-fill"></i>
                              <i class="bi bi-star-fill"></i>
                              <i class="bi bi-star-half"></i>
                              </div>
                            <?php }?>
                            <a href="index.php?page=danhgia" style="color: blue;"><span>(<?=$count_binhluan?>)</span></a>

                          <?php
                          }
                          ?>
                          </div>

                      </div>
                      <div style="margin-top: 10px; margin-bottom: 10px">
                        <?=$description?> 
                      </div>
                      
                      <div style="display: flex; justify-content: start">
                        <div class="counter" style="display: flex; flex-direction: row; border: 1px solid black; justify-content: space-between; border-radius: 100px; margin-bottom: 20px">
                          <button type="button" onclick="giam()" style="background: none; border: none"><i class="bi bi-dash fs-4"></i></button>
                          <input name="soluong" type="number" id="tanggiam" value="1" min="1" style="border: none; display: flex; text-align: center ">
                          <button type="button" onclick="tang()" style="background: none; border: none"><i class="bi bi-plus fs-4"></i></button>
                          <!-- script -->
                          <script>
                            function giam(){
                              const inp = document.getElementById('tanggiam');
                              let curr = parseInt(inp.value);
                              if (curr>1){
                                inp.value = curr - 1;
                              }
                            }
                            function tang(){
                              const inp = document.getElementById('tanggiam');
                              let curr =parseInt(inp.value);
                              inp.value = curr+1;
                            }
                          </script>
                        </div>
                      </div>

                </div>
                
              <button id="addtocart" type="submit" name="addcart" style="width: 100%; border-radius: 100px; border: none; background: black; height: 50px;"<?php if (!isset($_SESSION['session_user']) || count($_SESSION['session_user']) === 0) echo 'onclick="dangnhap(); return false;"'; ?>>
                <i class="bi bi-cart fs-5" style="color: white;"></i>
                <span style="color: white;">Add to cart</span>
              </button>

            </form>
          </div>
        </div>
      </div>

      </div>

    </div>
</div>

<html>

</html>

<style>
  a{
    text-decoration: none;
    color: black;
    transition: 0.3s ease;
  }
  a:hover{
    color: red;
  }
  .body-tb{
    color: red;
    font-size: 22px;
    font-weight: bold;
  }
  .modal-body{
    display: flex;
    flex-direction: column;
  }
  
  .rating{
    display: inline-block;
  }
  .rating input{
    display: none;
  }
  .rating label{
    float: right;
    color: #ccc;
    transition: 0.3s ease;
  }
  .rating label::before{
    font-size: 30px;
    content: '\2605';  
  }
  .rating input:checked ~ label,
  .rating label:hover,
  .rating label:hover~label {
    color: black;
    transition: 0.3s ease;
  }
  .container-size{
    padding: 10px;
    border: 1px solid black;
    height: 45px;
    width: 45px;

  }
  .size{
    display: inline-block;
    text-align: center;
    justify-content: center;
    display: flex;

  }
  .size label{
    border: 1px solid transparent;
    text-align: center;
    justify-content: center;
    font-size: 13px;
    width: 45px;
  }
  .size input{
    display: none; 
  }

  .size label:hover,
  .size input:checked ~ label{
    color: white;
    font-weight: bold;
    font-size: 15px;
    background: black;
  }
  .size:hover{
    border-radius: 1px solid black;
  }
  .custom-modal {
  border-radius: 10px;
  overflow: hidden;
  }

  .custom-modal .modal-header {
    border-bottom: none;
    padding: 1rem 1.5rem;
  }

  .custom-modal .modal-body {
    font-family: 'Arial', sans-serif;
    padding: 2rem;
  }

  .custom-modal .modal-body p {
    margin: 1rem 0;
    font-size: 16px;
  }

  .custom-modal .btn {
    transition: all 0.3s ease-in-out;
  }

  .custom-modal .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
  }
  .modal-content {
      border-radius: 10px;
    }

    .modal-header {
      background-color: #007bff;
      color: white;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }

    .form-label {
      font-weight: bold;
    }

    .rating label {
      font-size: 24px;
      color: #ddd;
      cursor: pointer;
      transition: color 0.3s ease;
    }

    .rating input[type="radio"] {
      display: none;
    }

    .rating input[type="radio"]:checked ~ label,
    .rating label:hover,
    .rating label:hover ~ label {
      color: #f1c40f;
    }

    .modal-footer {
      border-top: none;
    }

    .btn-submit {
      background-color: #007bff;
      color: white;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    .btn-submit:hover {
      background-color: #0056b3;
    }

    .color-btn, .size-btn {
      padding: 8px 16px;
      border: 1px solid #ddd;
      background: white;
      border-radius: 4px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .color-btn:hover, .size-btn:hover {
      border-color: #333;
    }

    .color-btn.selected, .size-btn.selected {
      background: #333;
      color: white;
      border-color: #333;
    }

    .color-btn:disabled, .size-btn:disabled {
      opacity: 0.5;
      cursor: not-allowed;
    }

    .size-btn:disabled {
      opacity: 0.5;
      cursor: not-allowed;
      background-color: #f5f5f5;
    }
    .out-of-stock {
      font-size: 0.8em;
      color: #999;
    }

</style>
<script>
  function dangnhap(){
    Swal.fire({
      icon: 'info',
      title: 'Bạn chưa truy cập vào tài khoản',
      html: "Nếu chưa có tài khoản nhấn vào <a href='index.php?page=dangnhap' style='text-decoration:none;'><i class='bi bi-person fs-3'></i></a> để đăng kí miễn phí",
      confirmButtonText: 'OK'
    });  
  }

  function gui(event){
    const noidung = document.getElementById('noidung').value.trim();
    const size = document.getElementById('size').value.trim();
    const color = document.getElementById('color').value.trim();
    // const sao = document.getElementById('rating').value.trim();
    const sao = document.querySelector('input[name="rating"]:checked');
    const nickname = document.getElementById('nickname').value.trim();
    
    if (noidung ==="" || size === "" || color === "" || sao === null || nickname === ""){
      alert("vui long nhap noi dung");  
      event.preventDefault();
    }
  
  }
  function checkStock(colorId, sizeId) {
    return fetch(`ajax/product_handler.php?action=check_stock&color_id=${colorId}&size_id=${sizeId}&id_item=<?=$sanphamchitiet['id']?>`)
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          return data.stock > 0;
        }
        return false;
      })
      .catch(error => {
        console.error('Error:', error);
        return false;
      });
  }

  function chonMau(btn, colorId) {
    // Remove selected class from all color buttons
    document.querySelectorAll('.color-btn').forEach(b => b.classList.remove('selected'));
    // Add selected class to clicked button
    btn.classList.add('selected');
    
    // Update hidden input
    document.getElementById('selected-color').value = colorId;
    
    // Fetch available sizes for this color
    fetch(`ajax/product_handler.php?action=get_sizes&color_id=${colorId}&id_item=<?=$sanphamchitiet['id']?>`)
      .then(response => response.json())
      .then(data => {
        if (data.success && data.sizes) {
          const sizeContainer = document.getElementById('size-container');
          sizeContainer.innerHTML = data.sizes.map(size => `
            <button type="button" 
                    class="size-btn" 
                    data-size-id="${size.id_size}" 
                    onclick="chonSize(this, '${size.id_size}')">
              ${size.size}
            </button>
          `).join('');
          
          // Select first available size
          const firstSizeBtn = sizeContainer.querySelector('.size-btn');
          if (firstSizeBtn) {
            const sizeId = firstSizeBtn.getAttribute('data-size-id');
            firstSizeBtn.classList.add('selected');
            document.getElementById('selected-size').value = sizeId;
            updatePrice(colorId, sizeId);
          }
        }
      })
      .catch(error => console.error('Error:', error));
  }

  function chonSize(btn, sizeId) {
    if (btn.disabled) return;
    
    // Remove selected class from all size buttons
    document.querySelectorAll('.size-btn').forEach(b => b.classList.remove('selected'));
    // Add selected class to clicked button
    btn.classList.add('selected');
    
    // Update hidden input
    document.getElementById('selected-size').value = sizeId;
    
    // Update price based on current color and new size selection
    const colorId = document.getElementById('selected-color').value;
    if (colorId) {
      updatePrice(colorId, sizeId);
    }
  }

  function updatePrice(colorId, sizeId) {
    fetch(`ajax/product_handler.php?action=get_price&color_id=${colorId}&size_id=${sizeId}&id_item=<?=$sanphamchitiet['id']?>`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const priceContainer = document.querySelector('.text-primary');
                const salePriceContainer = document.querySelector('.text-danger');
                
                if (data.price_sale > 0 && new Date(data.limit_date_sale) > new Date()) {
                    // Có giá sale và còn trong thời gian sale
                    if (priceContainer) {
                        priceContainer.style.fontSize = '20px';
                        priceContainer.style.textDecoration = 'line-through';
                        priceContainer.textContent = `${data.price}k`;
                    }
                    if (!salePriceContainer) {
                        // Tạo container cho giá sale nếu chưa có
                        const newSalePriceContainer = document.createElement('div');
                        newSalePriceContainer.className = 'text-danger';
                        newSalePriceContainer.style.fontSize = '40px';
                        newSalePriceContainer.textContent = `${data.price_sale}k`;
                        priceContainer.parentNode.appendChild(newSalePriceContainer);
                    } else {
                        salePriceContainer.style.display = 'block';
                        salePriceContainer.style.fontSize = '40px';
                        salePriceContainer.textContent = `${data.price_sale}k`;
                    }
                } else {
                    // Không có giá sale hoặc hết thời gian sale
                    if (priceContainer) {
                        priceContainer.style.fontSize = '40px';
                        priceContainer.style.textDecoration = 'none';
                        priceContainer.textContent = `${data.price}k`;
                    }
                    if (salePriceContainer) {
                        salePriceContainer.style.display = 'none';
                    }
                }

                // Cập nhật giá trong form
                document.querySelector('input[name="price"]').value = data.price;
                document.querySelector('input[name="price_sale"]').value = data.price_sale || 0;
            }
        })
        .catch(error => console.error('Error:', error));
  }

  // Select default color and size on page load
  window.addEventListener('DOMContentLoaded', () => {
    const defaultColor = document.getElementById('selected-color').value;
    const defaultSize = document.getElementById('selected-size').value;
    if (defaultColor && defaultSize) {
      updatePrice(defaultColor, defaultSize);
    }
  });
</script>



<link rel="stylesheet" href="layout/css/sell.css">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<!-- get javascript -->
<!-- <script src="layout/javascript/sell.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

