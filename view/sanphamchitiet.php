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
    $html_binhluan .='
    
      <div style="border-bottom: 1px solid black; margin-bottom: 20px; padding-bottom: 10px">
        <div style="display: flex; justify-content: space-between"> 
          <div style = "font-weight: bold ">
            '.$nickname.'
          </div>
          <div>
            '.$date.'
          </div>
        </div>


      <div>
          <div style="margin-top: 10px">
            ';
          if ($binhluan['sao']<2){
            $html_binhluan .='<i class="bi bi-star-fill"></i>';
          }else if ($binhluan['sao']<3){
            $html_binhluan .='<i class="bi bi-star-fill"></i>';
            $html_binhluan .='<i class="bi bi-star-fill"></i>';
          }else if ($binhluan['sao']<4){
            $html_binhluan .='<i class="bi bi-star-fill"></i>';
            $html_binhluan .='<i class="bi bi-star-fill"></i>';
          }else{
            $html_binhluan .='<i class="bi bi-star-fill"></i>';
            $html_binhluan .='<i class="bi bi-star-fill"></i>';
            $html_binhluan .='<i class="bi bi-star-fill"></i>';
            $html_binhluan .='<i class="bi bi-star-fill"></i>';
            $html_binhluan .='<i class="bi bi-star-fill"></i>';
          }
          $html_binhluan .= '
          </div>

          <div>
            <span>Đã mua size: '.$size.'</span> 
          </div>
          <div>
            <span>Đã mua màu: '.$color.'</span>
          </div>
        </div>
        <div style ="margin: 10px 0px">
        '.$noidung.'
        </div>
        <div style="display: flex; justify-content: end; gap: 10px">
          <div>
            '.$ten.'
          </div>
          <div>
            '.$age.'
          </div>
          <div>
            '.$diachi.'
          </div>
        </div>



        
      </div>
    
    ';
  }

  $html_size = '';
  foreach ($getsize as $sz) {
    extract($sz);
    $html_size .= 
                    // ''.$size.'' ;
                    '
                    <div class="container-size">
                    <div class="size"> 
                      <input type = "radio" name = "size" id="size-'.$size.'" value="'.$size.'">
                      <label for="size-'.$size.'">'.$size.'</label>
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
                  <i class="bi bi-pen"></i>
                  <button class="btn" data-bs-toggle="modal" data-bs-target="#binhluan">Viết bình luận</button>
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
                      <!-- header -->
                      <div class="modal-header">
  
                      </div>
                      <!-- body -->
                      <div class="modal-body">
                        <form action="index.php?page=sanphamchitiet&idpro=<?=$sanphamchitiet['id']?>" method="post">
                          <div style="display: flex; flex-direction: column">
                            <span>Nội dung bình luận</span>
                            <textarea name="noidung" id="noidung" style="width: 100%; height: 200px"></textarea>
                            <span>Size</span>
                            <input type="text" name="size" id="size">
                            <span>Color</span>
                            <input type="text" name="color" id="color">
                            <div class="rating">
                              <input value="5" name="rating" id="star5" type="radio">
                              <label for="star5"></label>
                              <input value="4" name="rating" id="star4" type="radio">
                              <label for="star4"></label>
                              <input value="3" name="rating" id="star3" type="radio">
                              <label for="star3"></label>
                              <input value="2" name="rating" id="star2" type="radio">
                              <label for="star2"></label>
                              <input value="1" name="rating" id="star1" type="radio">
                              <label for="star1"></label>
                            </div>
                            <!-- <span>Sao</span>
                            <input type="text" name="sao" id="sao"> -->
                            <span>Nickname</span>
                            <input type="text" name="nickname" id="nickname"> 
                          </div>

                          <div style="display: flex; justify-content: end">
                            <input type="submit" name="guibinhluan" value="Gửi" onclick="gui(event)">
                          </div>
                        </form>
                      </div>

                    </div>
                  </div>
                </div>
                  
                <?php 
                  }else{
                ?>
                  <div class="modal" id="binhluan">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                      <!-- header -->
                      <div class="modal-header">
                        <span>Thông báo</span>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                      </div>

                      <!-- body -->
                      <div class="modal-body">
                        <span class="body-tb">Bạn cần phải đăng nhập để có thể bình luận</span>
                        <?php 
                          $_SESSION['trang'] = "sanphamchitiet";
                          $_SESSION['idpro'] = $sanphamchitiet['id'];
                        ?>
                        <span>Nhấn vào <a href="index.php?page=dangnhap" class="i bi bi-person fs-4"></a> để đăng nhập</span>
                        <span>Nhấn vào <a href="index.php?page=dangky" class="i bi bi-person-fill-add fs-4"></a> để đăng ký</span>
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
              <input type="hidden" name="id" value="<?=$sanphamchitiet['id']?>">
              <input type="hidden" name="img" value="<?=$img?>">
              <input type="hidden" name="price" value="<?=$price?>">
              <input type="hidden" name="name_item" value="<?=$name_item?>">
              <input type="hidden" name="price_sale" value="<?=$price_sale?>">
              <input type="hidden" name="description" value="<?=$description?>">
              <input type="hidden" name="limit_date_sale" value="<?=$limit_date_sale?>">
              <input type="hidden" name="size" value="<?=$size?>">
              <input type="hidden" name="color" value="<?=$color?>">
              <div style="display: flex; flex-direction: column">

                <div style="display: flex; justify-content: space-between; text-align: center">
                  <span style="font-size: 30px;"><?=$name_item?></span>
                  <div style="display: flex;  align-items: center; gap: 10px">
                    <i class="bi bi-share"></i>
                    <i class="bi bi-heart"></i>
                  </div>
                </div>

                  <!-- color -->
                  <div style="display: flex; gap: 10px; margin-top: 10px; margin-bottom: 10px">
                    <?php foreach ($getcolor as $cl): ?>
                      <div>
                        <input type="radio" name="color" value="<?= $cl['id_color'] ?>">
                        <span><?= $cl['color'] ?></span>
                      </div>
                    <?php
                   endforeach; ?>

                  </div>
                  <!-- size -->
                  <div style="display: flex; gap: 10px; margin-top: 10px; margin-bottom: 10px">
                    <?=$html_size?>
                  </div>

                <div style="display: flex; justify-content: space-between">
                  <span style="font-size: 40px;">$<?=$price?></span>
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

                <div style="display: flex; border: 1px solid black; width: 50%; justify-content: center; border-radius: 100px; padding: 2px; margin-top: 10px; margin-bottom: 10px">
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

              <button type="submit" name="addcart" style="width: 100%; border-radius: 100px; border: none; background: black; height: 50px;"<?php if (!isset($_SESSION['session_user']) || count($_SESSION['session_user']) === 0) echo 'onclick="dangnhap(); return false;"'; ?>>>
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
</script>



<link rel="stylesheet" href="layout/css/sell.css">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<!-- get javascript -->
<!-- <script src="layout/javascript/sell.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

