<?php 

  $html_sanphamlienquan ='';
  foreach ($dssp_lienquan as $lq) {
    extract($lq);
    $link ="index.php?page=sanphamchitiet&idpro=".$id;
    $html_sanphamlienquan .='
                            <div class="carousel-slide">
                                <div class="card" style="border-radius: 0px ; border: none;">
                                  <a href="'.$link.'">
                                    <img class="card-img-top" src="layout/images/outerwear/'.$img.'" alt="" style="width:100%; border-radius: 0px;">
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
                                          <span>$59.90</span>
                                          <i class="bi bi-star">4.6</i>
                                        </div>  
                                  </div>
                                </div>
                            </div>

                            ';
  }
?>

<div>
  <h3>Sản phẩm cùng loại</h3>
  <div class="carousel-wrapper">
    <div class="carousel-container" id="carousel">
      <?=$html_sanphamlienquan;?>
    </div>
      <div class="controls">
        <button onclick="truoc()">
            <i class="bi bi-arrow-left-circle fs-2"></i>
        </button>
        <button onclick="sau()">
            <i class="bi bi-arrow-right-circle fs-2"></i>
        </button>
    </div>
  </div>

</div>

<style>

  .controls{
    display: flex;
    margin-top: 10px;
    position: absolute;
    top: 30%;

    width: 100%;
    justify-content: space-between;
    z-index: 10;
    
  }
  .controls button{
    background-color: transparent;
    border: none;
    
    
  }

  .carousel-wrapper {
    width: 100%;
    overflow: hidden;
    position:relative;
  }


  .carousel-container {
    display: flex;
    transition: transform 0.5s ease;
  }

  .carousel-slide {
    flex: 0 0 25%;
    box-sizing: border-box;

  }

  .carousel-slide img {
    width: 100%;
  }
  @media (max-width: 768px){ /* ipad */
    .carousel-slide{
      flex: 0 0 50%;
    }
  }
  @media (max-width: 576px){ /* moblie */
    .carousel-slide{
      flex: 0 0 100%;
    }
  }
</style>

<script>
  let trangHienTai = 0;
  const slAnh = document.querySelectorAll('.carousel-slide').length;
  const hienThiAnh = 4;
  const carousel = document.getElementById('carousel');

  function updateCarousel() {
    const tangSoLuongTrang = Math.ceil(slAnh / hienThiAnh) - 1;
    if (trangHienTai < 0) {
      trangHienTai = tangSoLuongTrang;
    }
    if (trangHienTai > tangSoLuongTrang) {
      trangHienTai = tangSoLuongTrang;
      trangHienTai = 0;

    }
    const chuyen = -100 * trangHienTai;
    carousel.style.transform = `translateX(${chuyen}%)`;
  }
  // setInterval(() => {
  //   trangHienTai++;
  //   updateCarousel();
  // }, 3000);

  function truoc() {
    trangHienTai--;
    updateCarousel();
  }

  function sau() {
    trangHienTai++;
    updateCarousel();
  }
</script>