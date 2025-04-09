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
  <link rel="stylesheet" href="layout/css/home.css">
  <!-- link bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- link icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

  <div class="container-fluid">
    <div class="container">
      <nav class="navbar fixed-top navbar-expand-lg"> 
        <div class="container">
          <a class="navbar-brand d-flex justify-content-center align-items-center p-2 m-0 gap-2" href="index.php">
            <img src="layout/images/logo/cute.jpg" alt="Logo" style="width: 40px;" class="rounded-pill">
            <h4 class="logo-text m-0">Brand</h4>
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
                <?=$dm_big;?> 
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php?page=women"><span>Women</span></a>
                </li>
                <li class="nav-item">
                  <a href="index.php?page=men" class="nav-link"><span>Men</span></a>
                </li>
                <li class="nav-item">
                  <a href="index.php?page=kid" class="nav-link"><span>Baby</span></a>
                </li>
                <li class="nav-item">
                  <a href="index.php?page=baby" class="nav-link"><span>Kid</span></a>
                </li>
              </ul>
              <div class="d-flex gap-4 ">
                <a href="#" class="button">
                  <i class="bi bi-globe-asia-australia fs-5"></i>
                </a>
                <a href="#" class="button">
                  <i class="bi bi-bag-heart fs-5"></i>
                </a>
                <a href="index.php?page=viewcart" class="button">
                  <i class="bi bi-cart4 fs-5"></i>
                </a>
              </div>
            </div>
          </div>
        </div> 
      </nav>
    </div>
  </div>
