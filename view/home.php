<?php
  $html_dssp_home ='';
  foreach ($dssp_new as $sp) {
    extract($sp); //extract
    $html_dssp_home .= '<div class="swiper-slide">
                          <a href="#" style="width: 100%; height: 100%">
                            <img src="layout/images/home/'.$img.'" alt="">
                          </a>
                        </div>';
  }
?>
 
 <!-- Swiper -->
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <?=$html_dssp_home;?> 
    </div>
    <div class="swiper-pagination"></div>
  </div>  