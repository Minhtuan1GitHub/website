<?php
  $html_phanloai = '';
  foreach ($phanloai as $pl) {
    extract($pl);
    $html_phanloai .='
                      <li class="nav-item">
                      <a href="index.php?page='.$name_phanloai.'" class="nav-link"><span style="text-transform:capitalize;">'.$name_phanloai.'</span></a>
                      </li>
                    ';
  }
 
?>


<!DOCTYPE html>
<html lang="en"> 

<head>
  <meta charset="utf-8" /> 
  <title>Home</title>
  <link rel = "website icon" type = "png" href = "layout/images/logo/cute.jpg">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <!-- Link css -->
  <link rel="stylesheet" href="layout/css/home1.css">
  <!-- link bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- link icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

  <!-- AOS CSS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- ajax -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 


</head>


<body style="width: 65%; margin: 0 auto">

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

  <div class="container-fluid" style="margin-bottom: 100px;">
    <div class="container">
      <nav class="navbar fixed-top navbar-expand-lg" style="background: white;"> 
        <div class="container">
          <a class="navbar-brand d-flex justify-content-center align-items-center p-2 m-0 gap-2" href="index.php">
            <img src="layout/images/logo/cute.jpg" alt="Logo" style="width: 40px;" class="rounded-pill">
            <h4 class="logo-text m-0">TumiShop</h4>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header ">
              <h5 class="offcanvas-title " id="offcanvasNavbarLabel">Menu</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body d-flex justify-content-sm-center align-items-center flex-column flex-lg-row">
              <ul class="navbar-nav justify-content-center flex-grow-1 pe-3 align-items-center align-items-sm-center gap-5" >
              <?=$html_phanloai;?>

              </ul>
              <div class="d-flex gap-4 ">
                <a href="index.php?page=tinnhanpage" class="position-relative">
                  
                  <i class="bi bi-send fs-5"></i>
                </a>
                <a href="index.php?page=chuyenkhoan" class="position-relative button">
                  <i class="bi bi-tree fs-5"></i>
                  <span id="donhang-badge" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <?=$countDonHang?>
                  </span> 
                </a>
                <a href="index.php?page=viewlike" class="position-relative button">
                  <i class="bi bi-heart fs-5"></i>
                  <span id="yeuthich-badge" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <?=$_SESSION['tongmonyeuthich']?>
                  </span>
                </a>
                <?php
                  if (isset($_SESSION['session_user']) && count($_SESSION['session_user']) > 0 && $_SESSION['session_user']['role'] ==0) {
                    echo '
                          <a href="index.php?page=viewcart" class="position-relative button">
                            <i class="bi bi-cart4 fs-5"></i>
                            <span id="giohang-badge" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                              '.$_SESSION['tongmon'].'
                            </span>
                          </a>
                        ';
                  }
                  if (isset($_SESSION['session_user']['role']) && $_SESSION['session_user']['role'] ==1){
                    echo '
                          <a href="admin/index.php">
                            <i class = "bi bi-kanban fs-5"></i>
                          </a>
                          ';
                  }
                ?>  
              </div>
            </div>
          </div>
        </div> 
      </nav>
    </div>
  </div>
 


