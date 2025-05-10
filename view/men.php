<?php
  $html_dm =''; 
  foreach ($dsdm as $dm) {
    extract($dm); 
    $link='index.php?page=men&dm_id='.$dm_id; //duong dan cho cac danh muc
    $html_dm .='<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                  <div class="card align-items-center border-0">
                    <a href="'.$link.'" class="img-item" data-aos="zoom-in" data-aos-duration="1500">
                      <img class="card-img-top" src="layout/images/dm/'.$img.'" alt="Item" style="width: 60px;">
                    </a>
                    <h6 class="card-title">'.$name.'</h6>
                  </div> 
                </div>'; 
  }
  $html_dsdm = '';
  foreach ($dssp as $sp) {  
    extract($sp);
    $link ="index.php?page=sanphamchitiet&idpro=".$sp['id'];
    $html_dsdm .='<div class="col-lg-3 col-sm-6">
                    <div class="card" style="border-radius: 0px ; border: none;" data-aos="fade-up"
                                                                                data-aos-duration="1500"
                                                                                data-aos-delay="200"
                                                                                data-aos-easing="ease-in-out"
                                                                                data-aos-offset="200">
                      <a href="'.$link.'">
                      <img class="card-img-top " src="layout/images/outerwear/'.$img.'" alt="Card image" style="width:100%; border-radius: 0px;">
                      </a>
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="d-flex" style="gap: 7px;">
                            <div style="width: 15px; height: 15px; border-radius: 50%; background: red;"></div>
                            <div style="width: 15px; height: 15px; border-radius: 50%; background: blue;"></div>
                            <div style="width: 15px; height: 15px; border-radius: 50%; background: yellowgreen;"></div>
                          </div>
                          
                          <form action="index.php?page=addlike" method="post">
                            <button style="border: none; background: none;" type="submit" name="addlike">
                              <i class="bi bi-heart fs-5"></i>
                            </button>
                          </form>
                        </div>
                        <div class="d-flex flex-column">
                          <span style="text-transform: uppercase; font-weight: bold">'.$name_item.'</span>
                          <span>UNISEX, XXS-3XL</span>
                          <span>Zip-Up Blouson Jacket</span>
                          <span>$'.$price.'</span>
                          <i class="bi bi-star">'.$star.'</i>
                        </div>
                      </div>
                    </div>
                  </div>';
  }

  $html_sanPhamHot ='';
  foreach ($dsspHot as $hot ) {
    extract($hot);
    $link = "index.php?page=sanphamchitiet&idpro=".$id; 
    $html_sanPhamHot .='<div class="col-lg-3 col-sm-6 ">
                    <div class="card" style="border-radius: 0px ; border: none;" data-aos="fade-up"
                                                                                data-aos-duration="1500"
                                                                                data-aos-delay="300"
                                                                                data-aos-easing="ease-in-out"
                                                                                data-aos-offset="200">                    <a href="'.$link.'">

                      <img class="card-img-top" src="layout/images/outerwear/'.$img.'" alt="Card image" style="width:100%; border-radius: 0px;">
                      </a>
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="d-flex" style="gap: 7px;">
                            <div style="width: 15px; height: 15px; border-radius: 50%; background: red;"></div>
                            <div style="width: 15px; height: 15px; border-radius: 50%; background: blue;"></div>
                            <div style="width: 15px; height: 15px; border-radius: 50%; background: yellowgreen;"></div>
                          </div>
                          <i class="bi bi-heart fs-5"></i>
                        </div>
                        <div class="d-flex flex-column">
                          <span>UNISEX, XXS-3XL</span>
                          <span>Zip-Up Blouson Jacket</span>
                          <span>$'.$price.'</span>
                          <i class="bi bi-star">'.$star.'</i>
                        </div>
                      </div>
                    </div>
                  </div>';
  }
  $html_sanPhamLike ='';
  foreach ($dsspLike as $like ) {
    extract($like);
    $link = "index.php?page=sanphamchitiet&idpro=".$id;
    $html_sanPhamLike .='<div class="col-lg-3 col-sm-6 ">
                    <div class="card" style="border-radius: 0px ; border: none;" data-aos="fade-up"
                                                                                data-aos-duration="1500"
                                                                                data-aos-delay="300"
                                                                                data-aos-easing="ease-in-out"
                                                                                data-aos-offset="200">                    <a href="'.$link.'">
                      <img class="card-img-top" src="layout/images/outerwear/'.$img.'" alt="Card image" style="width:100%; border-radius: 0px;">
                    </a>
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="d-flex" style="gap: 7px;">
                            <div style="width: 15px; height: 15px; border-radius: 50%; background: red;"></div>
                            <div style="width: 15px; height: 15px; border-radius: 50%; background: blue;"></div>
                            <div style="width: 15px; height: 15px; border-radius: 50%; background: yellowgreen;"></div>
                          </div>
                          <i class="bi bi-heart fs-5"></i>
                        </div>
                        <div class="d-flex flex-column">
                          <span>UNISEX, XXS-3XL</span>
                          <span>Zip-Up Blouson Jacket</span>
                          <span>$'.$price.'</span>
                          <i class="bi bi-star">'.$star.'</i>
                        </div>
                      </div>
                    </div>
                  </div>';
  }
  $html_sanPhamNew ='';
  foreach ($dsspNew as $new ) {
    extract($new);
    $link = "index.php?page=sanphamchitiet&idpro=".$id;
    $html_sanPhamNew .='<div class="col-lg-3 col-sm-6 ">
                    <div class="card" style="border-radius: 0px ; border: none;" data-aos="fade-up"
                                                                                data-aos-duration="1500"
                                                                                data-aos-delay="300"
                                                                                data-aos-easing="ease-in-out"
                                                                                data-aos-offset="200">                    <a href ="'.$link.'">
                      <img class="card-img-top" src="layout/images/outerwear/'.$img.'" alt="Card image" style="width:100%; border-radius: 0px;">
                    </a>  
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="d-flex" style="gap: 7px;">
                            <div style="width: 15px; height: 15px; border-radius: 50%; background: red;"></div>
                            <div style="width: 15px; height: 15px; border-radius: 50%; background: blue;"></div>
                            <div style="width: 15px; height: 15px; border-radius: 50%; background: yellowgreen;"></div>
                          </div>
                          <i class="bi bi-heart fs-5"></i>
                        </div>
                        <div class="d-flex flex-column">
                          <span>UNISEX, XXS-3XL</span>
                          <span>Zip-Up Blouson Jacket</span>
                          <span>$'.$price.'</span>
                          <i class="bi bi-star">'.$star.'</i>
                        </div>
                      </div>
                    </div>
                  </div>';
  }

  $html_sanPhamSale ='';
  foreach ($dsspSale as $sale ) {
    extract($sale);
    $link = "index.php?page=sanphamchitiet&idpro=".$id;
    $html_sanPhamSale .='<div class="col-lg-3 col-sm-6 ">
                    <div class="card" style="border-radius: 0px ; border: none;" data-aos="fade-up"
                                                                                data-aos-duration="1500"
                                                                                data-aos-delay="300"
                                                                                data-aos-easing="ease-in-out"
                                                                                data-aos-offset="200">                    <a href ="'.$link.' ">
                      <img class="card-img-top" src="layout/images/outerwear/'.$img.'" alt="Card image" style="width:100%; border-radius: 0px;">
                    </a> 
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="d-flex" style="gap: 7px;">
                            <div style="width: 15px; height: 15px; border-radius: 50%; background: red;"></div>
                            <div style="width: 15px; height: 15px; border-radius: 50%; background: blue;"></div>
                            <div style="width: 15px; height: 15px; border-radius: 50%; background: yellowgreen;"></div>
                          </div>
                          <i class="bi bi-heart fs-5"></i>
                        </div>
                        <div class="d-flex flex-column">
                          <span>UNISEX, XXS-3XL</span>
                          <span>Zip-Up Blouson Jacket</span>
                          <span style="color: #888;">$'.$price.'</span>
                          <span style="color: red;">$'.$price.'</span>                          
                          <i class="bi bi-star">'.$star.'</i>
                        </div>
                      </div>
                    </div>
                  </div>';
  }


  if ($titlePage!=""){
    $title=$titlePage;
  }else{
    $title = "Men";
  }

  $html_breadcrumb = '';
  $html_breadcrumb .='<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item"><a href = "index.php?page=men">Men</a></li>
                      ';
                      if ($titlePage!=""){
                        $html_breadcrumb .='<li class="breadcrumb-item active" aria-current="page">'.$name.'</li>
                                          ';
                      }

                     


?>

<nav class="container" aria-label="breadcrumb" style="position: sticky; top: 0; margin-top: 100px">
      
      <ol class="breadcrumb">
        <?=$html_breadcrumb;?> 
      </ol>
</nav>
<div>

<div class="container border-bottom" style="margin-top: 0px;">
    <div class="row g-1 m-0 p-0">
      <?=$html_dm;?>  <!-- danh muc -->
    </div>
</div>


<div class="container-fluid" style="margin-top: 72px;">
    <div class="container">
      <h3 class="titlte">
        <?=$title?>
      </h3>
      <div class="row g-0 m-0 p-0">
      <!-- san pham -->
        <?=$html_dsdm;?> 
      </div>
    </div>
</div>

<div class="container-fluid" style="margin-top: 72px;">
    <div class="container">
      <h3>Sản Phẩm Nhiều Người Xem</h3>
        <div class="row g-0 m-0 p-0" >
        <!-- san phan hot -->
        <?=$html_sanPhamHot;?>
        </div>
    </div>
</div>
 
<div class="container-fluid" style="margin-top: 72px;">
    <div class="container">
      <h3>Sản Phẩm Nhều Người Yêu Thích</h3>
        <div class="row g-0 m-0 p-0" >
        <!-- san phan nhieu nguoi xem -->
        <?=$html_sanPhamLike;?>
        </div>
    </div>
</div>

<div class="container-fluid" style="margin-top: 72px;">
    <div class="container">
      <h3>Sản Phẩm Mới</h3>
        <div class="row g-0 m-0 p-0">
        <!-- san phan moi -->
        <?=$html_sanPhamNew;?>
        </div>
    </div>
</div>


<div class="container-fluid" style="margin-top: 72px;">
    <div class="container">
      <h3>Sản Phẩm Giảm Giá</h3>
        <div class="row g-0 m-0 p-0">
        <!-- san phan giam gia -->
        <?=$html_sanPhamSale;?>
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
    font-weight: bold;
  }
  
  .card:hover{
    border-color: red;

  }
  .card-img-top {
  transition: transform 0.5s ease;
}

.card-img-top:hover {
  transform: scale(1.1);
}
.breadcrumb {
        background: #f8f9fa;
        padding: 10px 15px;
        border-radius: 5px;
    }

    .breadcrumb-item a {
        color: #007bff;
        text-decoration: none;
    }

    .breadcrumb-item a:hover {
        text-decoration: underline;
    }
</style>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <script src="layout/javascript/main.js"></script>

    <!-- AOS JS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  
</body>

</div>

</html>