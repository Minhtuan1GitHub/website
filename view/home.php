<?php
  $html_dssp_home ='';
  foreach ($dssp_new as $sp) {
    extract($sp); //extract
    $html_dssp_home .= '<div class="swiper-slide">
                          <img src="layout/images/home/'.$img.'" alt="">

                        </div>';
  }
?>
 
 <!-- Swiper -->
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <?=$html_dssp_home;?> <!-- hien thi du lieu -->
      <!-- <img src="layout/images/logo/'.$logo.'" alt="">
                              '.$brand.'
                              '.$description.' -->
    </div>
    <div class="swiper-pagination"></div>
  </div>  