<?php

  $html_dm ='';
  foreach ($dsdm as $dm) {
    extract($dm); 
    $link='index.php?page=women&dm_id='.$dm_id; //duong dan cho cac danh muc
    $html_dm .='<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                  <div class="card align-items-center border-0">
                    <a href="'.$link.'" class="img-item">
                      <img src="layout/images/dm/'.$img.'" alt="Item" style="width: 60px;">
                    </a>
                    <h6 class="card-title">'.$name.'</h6>
                  </div> 
                </div>'; 
  }
  $html_dsdm = '';
  foreach ($dssp as $sp) {  
    extract($sp);
    $link ="index.php?page=sanphamchitiet&idpro=".$id;
    $html_dsdm .='<div class="col-lg-3 col-sm-6 ">
                    <div class="card" style="border-radius: 0px ; border: none;">
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
                          <span>UNISEX, XXS-3XL</span>
                          <span>Zip-Up Blouson Jacket</span>
                          <span>$'.$price.'</span>
                          <i class="bi bi-star">'.$star.'</i>
                        </div>
                      </div>
                    </div>
                  </div>';
  }
  if ($titlePage!=""){
    $title=$titlePage;
  }else{
    $title = "Women";
  }
  $html_sanPhamHot ='';
  foreach ($dsspHot as $hot ) {
    extract($hot);
    $link = "index.php?page=sanphamchitiet&idpro=".$id; 
    $html_sanPhamHot .='<div class="col-lg-3 col-sm-6 ">
                    <div class="card" style="border-radius: 0px ; border: none;">
                    <a href="'.$link.'">

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
                    <div class="card" style="border-radius: 0px ; border: none;">
                    <a href="'.$link.'">
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
                    <div class="card" style="border-radius: 0px ; border: none;">
                    <a href ="'.$link.'">
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
                    <div class="card" style="border-radius: 0px ; border: none;">
                    <a href ="'.$link.' ">
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
                          <span style="color: red;">$'.$price_sale.'</span>                          
                          <i class="bi bi-star">'.$star.'</i>
                        </div>
                      </div>
                    </div>
                  </div>';
  }

  $html_breadcrumb = '';
  $html_breadcrumb .='<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item"><a href = "index.php?page=women">Women</a></li>
                      ';
                      if ($titlePage!=""){
                        $html_breadcrumb .='<li class="breadcrumb-item active" aria-current="page">'.$title.'</li>
                                          ';
                      }
?>

<nav class="container" aria-label="breadcrumb" style="position: sticky; top: 0; margin-top: 100px">
      
      <ol class="breadcrumb">
        <?=$html_breadcrumb;?> 
      </ol>
</nav>

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
  }
  a:hover{
    color: red;
  }
</style>