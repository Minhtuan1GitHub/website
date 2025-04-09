<?php 
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
            <span>Product ID: <?=$id?> </span>
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


            <!-- <div id="carouselExample" class="carousel slide">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="row g-0">
  
                    <div class="col-lg-4">
                      <div class="card" style="border: none;">
                        <bi class="bi-heart btn" style="position: absolute; right: 0"></bi>
                        <img src="layout/images/style/<?=$img_style?>" alt="">
                        <div class="card-body" style="display: flex; gap: 10px; align-items: center;">
                          <img src="layout/images/style/<?=$img?>" alt="" style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                          <div style="display: flex; flex-direction: column;">
                            <span><?=$name_style_1?></span>
                            <span>Size: <?=$size_style_1?></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="card" style="border: none;">
                        <bi class="bi-heart btn" style="position: absolute; right: 0"></bi>
                        <img src="layout/images/outerwear/item2.avif" alt="">
                        <div class="card-body" style="display: flex; gap: 10px; align-items: center;">
                          <img src="layout/images/outerwear/item2.avif" alt="" style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                          <div style="display: flex; flex-direction: column;">
                            <span><?=$name_style_2?></span>
                            <span><?=$size_style_2?></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="card" style="border: none;">
                        <bi class="bi-heart btn" style="position: absolute; right: 0"></bi>
                        <img src="layout/images/outerwear/item2.avif" alt="">
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

                <div class="carousel-item">
                  <div class="row g-0">
                    <div class="col-lg-4">
                      <div class="card" style="border: none;">
                        <img src="layout/images/outerwear/item2.avif" alt="">
                        <div class="card-body" style="display: flex; gap: 10px; align-items: center;">
                          <img src="/image/bg.jpg" alt="" style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                          <div style="display: flex; flex-direction: column;">
                            <span>Alan 5' 11''</span>
                            <span>Size: M</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="card" style="border: none;">
                        <img src="layout/images/outerwear/item2.avif" alt="">
                        <div class="card-body" style="display: flex; gap: 10px; align-items: center;">
                          <img src="/image/bg.jpg" alt="" style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                          <div style="display: flex; flex-direction: column;">
                            <span>Alan 5' 11''</span>
                            <span>Size: M</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="card" style="border: none;">
                        <img src="layout/images/outerwear/item2.avif" alt="">
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
                <div class="carousel-item">
                  <div class="row g-0">
                    <div class="col-lg-4">
                      <div class="card" style="border: none;">
                        <img src="layout/images/outerwear/item2.avif" alt="">
                        <div class="card-body" style="display: flex; gap: 10px; align-items: center;">
                          <img src="/image/bg.jpg" alt="" style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                          <div style="display: flex; flex-direction: column;">
                            <span>Alan 5' 11''</span>
                            <span>Size: M</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="card" style="border: none;">
                        <img src="layout/images/outerwear/item2.avif" alt="">
                        <div class="card-body" style="display: flex; gap: 10px; align-items: center;">
                          <img src="/image/bg.jpg" alt="" style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                          <div style="display: flex; flex-direction: column;">
                            <span>Alan 5' 11''</span>
                            <span>Size: M</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="card" style="border: none;">
                        <img src="layout/images/outerwear/item2.avif" alt="">
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
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" style="left: -5.9%; top: -30%;">
                <i class="bi bi-arrow-left fs-4" aria-hidden="true" style="background: #888; color: white;"></i>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next" style="right: -5.9%; top: -30%;">
                <i class="bi bi-arrow-right fs-4" aria-hidden="true" style="background: #888; color: white;"></i>
                <span class="visually-hidden">Next</span>
              </button>
            </div> -->

          </div>

          <div>
            <div style="display: flex; align-items: center; justify-content: space-between;">
              <h4>Reviews</h4>
              <div>
                <i class="bi bi-pen"></i>
                <a href="#">Write a review</a>
              </div>              
            </div>  
            <span>
              <div>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-half"></i>
              </div>
            </span>
          </div>

          <div>
            <div style="border-bottom: 2px solid #888; padding-bottom: 10px;">
              <div style="display: flex; align-items: center; justify-content: space-between;">
                <span>Great functional piece</span>
                <span>3/15/2025</span>
              </div>
              <div>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-half"></i>
              </div>
              <div style="display: flex; flex-direction: column;">
                <span>Purchased size: XXL</span>
                <span>Purchased color: 57 OLIVE</span>
                <span>How it fits: True to size</span>
              </div>
              <p>
                Very happy with this one. Light, great for layering, sleeves cuff nicely, pairs up well with most bottoms I've tried. The inside pockets were a nice surprise as well, very convenient! Just be sure to follow care instructions so it stays nice.
              </p>
              <div style="display: flex; align-items: center; justify-content: end; gap: 40px;">
                <div>
                  <i class="bi bi-flag-fill"></i>
                  <a href="#" style="text-decoration: none;">Report</a>
                </div>
                <div style="border: 1px solid #888; border-radius: 100px; padding: 5px;">
                  <i class="bi bi-magic"></i>
                  <button type="button" style="border: none; background: transparent;">Helpful</button>
                </div>
              </div>
            </div>
            <div>
              <div style="display: flex; align-items: center; justify-content: space-between;">
                <span>Great functional piece</span>
                <span>3/15/2025</span>
              </div>
              <div>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-half"></i>
              </div>
              <div style="display: flex; flex-direction: column;">
                <span>Purchased size: XXL</span>
                <span>Purchased color: 57 OLIVE</span>
                <span>How it fits: True to size</span>
              </div>
              <p>
                Very happy with this one. Light, great for layering, sleeves cuff nicely, pairs up well with most bottoms I've tried. The inside pockets were a nice surprise as well, very convenient! Just be sure to follow care instructions so it stays nice.
              </p>
              <div style="display: flex; align-items: center; justify-content: end; gap: 40px;">
                <div>
                  <i class="bi bi-flag-fill"></i>
                  <a href="#" style="text-decoration: none;">Report</a>
                </div>
                <div style="border: 1px solid #888; border-radius: 100px; padding: 5px;">
                  <i class="bi bi-magic"></i>
                  <button type="button" style="border: none; background: transparent;">Helpful</button>
                </div>
              </div>
            </div>
          </div>

          


        </div>
        <!-- col -->
        <div class="col-lg-5" style="display: flex; flex-direction: column; ">

          <div style="position: sticky; top: 100px;">
            <div style="display: flex; align-items: center; justify-content: space-between;">
              <span style="text-transform: uppercase; color: black; "><?=$name_item?></span>
              <div>
                <a href="#">
                  <i class="bi bi-box-arrow-in-up"></i>
                </a>
                <a href="#">
                  <i class="bi bi-heart"></i>
                </a>
              </div>
            </div>

            <div style="display: flex; flex-direction: column;">
              <div style="display: flex;">
                <div class="form-check">
                    <input type="radio" class="form-check-input custom-radio" id="flexRadioDefault1" name="flexRadioDefault" style="background: red;">
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input custom-radio" id="flexRadioDefault2" name="flexRadioDefault" style="background: red;">
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input custom-radio" id="flexRadioDefault3" name="flexRadioDefault" style="background: red;">
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input custom-radio" id="flexRadioDefault4" name="flexRadioDefault" style="background: red;">
                </div>
              </div>
              <span>Color: 08 Dark Gray</span>
            </div>

            <div>
              <div style="display: flex; gap: 10px;">
                <label class="radio-container">
                  <input type="radio" class="radio-custom" name="flexRadioDefault">
                  <span>XXL</span>
                </label>
                <label class="radio-container">
                  <input type="radio" class="radio-custom" name="flexRadioDefault">
                  <span>XL</span>
                </label>
                <label class="radio-container">
                  <input type="radio" class="radio-custom" name="flexRadioDefault">
                  <span>L</span>
                </label>
                <label class="radio-container">
                  <input type="radio" class="radio-custom" name="flexRadioDefault">
                  <span>M</span>
                </label>
                <label class="radio-container">
                  <input type="radio" class="radio-custom" name="flexRadioDefault">
                  <span>S</span>
                </label>
                <label class="radio-container">
                  <input type="radio" class="radio-custom" name="flexRadioDefault">
                  <span>XS</span>
                </label>
              </div>
              <div style="display: flex; justify-content: space-between;">
                <span>
                  Size: UNISEX XXL
                </span>
                <span>
                  Recommended size: -
                </span>
              </div>
            </div>
            
            <div style="display: flex; justify-content: end; gap: 4px;">
              
              <i class="bi bi-rulers"></i>
              <a href="#" style="text-decoration: none;" onclick="showAlert()">Check my size</a>


              <div id="myAlert" class="alert d-none" role="alert">
                <div>
                  <span>Check my size</span>
                  <button onclick="closeAlert()"><i class="bi bi-x-lg"></i></button>
                </div>
              </div>

            </div>

            <div style="display: flex; align-items: center; justify-content: space-between;">
              <div>
                <?php
                  if ($price_sale!=0){
                    echo "<h5 style='color: #888; text-decoration: line-through'>$".$price."</h5>";
                    echo "<h3 style='color: red;'>$".$price_sale."</h3>";
                  }else{
                    echo "<h3>$".$price."</h3>";
                  }
                ?>


              </div>
              <div>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-half"></i>
              </div>
            </div>

            <div>
              <span>Made with recycled materials</span>
            </div>

            <div class="counter" style="background: #888; border-radius: 100px; display:flex; justify-content: space-between; width: 160px; height: 40px; align-items: center;">
              <button id="decrease" style="border: none; background: transparent; color: white;"><i class="bi bi-dash fs-4"></i></button>
              <span id="count" style="color: white;">0</span>
              <button id="increase" style="border: none; background: transparent; color: white;"><i class="bi bi-plus fs-4"></i></button>
            </div>

            <div style="display: flex; justify-content: center;">
            <!-- tao form cart -->
            <form action="index.php?page=addcart" method="post"> 
              <input type="hidden" name="id" value="<?=$id?>">
              <input type="hidden" name="img" value="<?=$img?>">
              <input type="hidden" name="price" value="<?=$price?>">
              <input type="hidden" name="name_item" value="<?=$name_item?>">
              <input type="hidden" name="price_sale" value="<?=$price_sale?>">
              <input type="hidden" name="description" value="<?=$description?>">
              <input type="hidden" name="soluong" value="<?=$soluong?>">
              <input type="hidden" name="limit_date_sale" value="<?=$limit_date_sale?>">
              <button type="submit" name="addcart" style="width: 100%; border-radius: 100px; border: none; background: black; height: 50px;">
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



<style>
  a{
    text-decoration: none;
    color: black;
    transition: 0.3s ease;
  }
  a:hover{
    color: red;
  }
</style>




<link rel="stylesheet" href="layout/css/sell.css">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<!-- get javascript -->
<script src="layout/javascript/sell.js"></script>
