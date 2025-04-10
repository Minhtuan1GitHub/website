<?php

  $html_dm ='';
  foreach ($dsdm as $dm) {
    extract($dm); 
    $link='index.php?page=baby&dm_id='.$dm_id; //duong dan cho cac danh muc
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
    $title = "Baby";
  }

  $html_breadcrumb = '';
  $html_breadcrumb .='<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item"><a href = "index.php?page=baby">Baby</a></li>
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

<style>
  a{
    text-decoration: none;  
    color: black;
  }
  a:hover{
    color: red;
  }
</style>