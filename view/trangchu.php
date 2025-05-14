<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Improved Layout with Bootstrap</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body, html {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      height: 100vh;
      display: flex;
      flex-direction: column;
      background-color: #f8f9fa; /* Light gray background */
    }

    .swiper-container {
      flex: 0 1 auto; /* Swiper ở phần trên */
    }

    .content {
      flex: 1 0 auto; /* Main content */
      padding: 20px;
    }

    .swiper {
      width: 100%;
      height: 75vh; /* Swiper height */
    }

    .swiper-slide img {
      object-fit: cover;
      width: 100%;
      height: 100%;
      transition: transform 0.3s ease-in-out;
    }

    .swiper-slide:hover img {
      transform: scale(1.1);
    }

    .category, .newsAndDiscount {
      margin-bottom: 40px;
      padding: 20px;
      background-color: #ffffff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .header-category, .header-newsAndDiscount {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
      color: #333;
      text-align: center;
    }

    .row {
      gap: 20px;
      justify-content: center;
    }

    .card {
      border: none;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-body {
      text-align: center;
    }

    .card-title {
      font-size: 18px;
      font-weight: bold;
      color: #333;
    }

    .card-price {
      font-size: 16px;
      color: #4caf50;
      font-weight: bold;
    }

    .add-to-cart {
      background-color: #4caf50;
      color: #fff;
      border: none;
      transition: background-color 0.3s ease;
    }

    .add-to-cart:hover {
      background-color: #45a049;
    }

    button {
      margin: 20px auto;
      display: block;
      padding: 10px 20px;
      border-radius: 8px;
      background-color: #007bff;
      color: #fff;
      font-size: 16px;
      border: none;
      transition: all 0.3s;
    }

    button:hover {
      background-color: #0056b3;
      transform: scale(1.05);
    }
    a{
      text-decoration: none;
    }
    .bi {
      font-size: 1.5rem;
      color: black;
    }
    .col-3{
      flex: 0 0 23%;
      max-width: 23%;
    }
  </style>
</head>
<body>
  <!-- Swiper -->
  <div class="swiper-container">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <?php
          foreach ($dssp_new as $dssp) {
            extract($dssp);
            ?>
            <div class="swiper-slide">
              <a href="#" style="width: 100%; height: 100%">
                <img src="layout/images/home/<?=$img?>" alt="">
              </a>
            </div>
          <?php }
        ?>
      </div>
      <div class="swiper-pagination"></div>
    </div> 
  </div>

  <!-- Content -->
  <div class="container">
    <div class="content">
      <!-- Men -->
      <div class="category">
        <h1 class="header-category">Mặt hàng nam mới</h1>
        <div>
          <div class="row">
            <?php
              showProductColumn($getMenOne);
              showProductColumn($getMenTwo);
              showProductColumn($getMenThree);
              showProductColumn($getMenFour);
              showProductColumn($getMenFive);
            ?>
          </div>
          <div class="text-center">
            <button class="btn btn-primary">Xem thêm</button>
          </div>        </div>
      </div>

      <!-- Women -->
      <div class="category">
        <h1 class="header-category">Sản phẩm nữ bán chạy</h1>
        <div>
          <div class="row">
            <?php
              showProductColumn($getWomenOne);
              showProductColumn($getWomenTwo);
              showProductColumn($getWomenThree);
              showProductColumn($getWomenFour);
              showProductColumn($getWomenFive);
            ?>
          </div>
          <div class="text-center">
            <button class="btn btn-primary">Xem thêm</button>
          </div>        </div>
      </div>

      <!-- Kids -->
      <div class="category">
        <h1 class="header-category">Sản phẩm trẻ em bán chạy</h1>
        <div>
          <div class="row">
            <?php
              showProductColumn($getKidOne);
              showProductColumn($getKidTwo);
              showProductColumn($getKidThree);
              showProductColumn($getKidFour);
              showProductColumn($getKidFive);
            ?>
          </div>
          <div class="text-center">
            <button class="btn btn-primary">Xem thêm</button>
          </div>        </div>
      </div>

      <!-- Baby -->
      <div class="category">
        <h1 class="header-category">Sản phẩm em bé bán chạy</h1>
        <div>
          <div class="row">
            <?php
              showProductColumn($getBabyOne);
              showProductColumn($getBabyTwo);
              showProductColumn($getBabyThree);
              showProductColumn($getBabyFour);
              showProductColumn($getBabyFive);
            ?>
          </div>
          <div class="text-center">
            <button class="btn btn-primary">Xem thêm</button>
          </div>
        </div>
      </div>

      <!-- News -->
      <div class="newsAndDiscount">
        <h1 class="header-newsAndDiscount">Tin tức và khuyến mãi</h1>
        <div class="row">
          <?php foreach ($getNews as $news): 
            extract($news);
          ?>
            <div class="col-3 mb-4">
              <a href="index.php?page=news&news=<?=$id?>" class="text-decoration-none text-dark">
                <div class="card h-100">
                  <div class="card-header p-0">
                    <img src="layout/images/news/<?= $img ?>" alt="<?= $title ?>" class="card-img-top">
                  </div>
                  <div class="card-body">
                    <h5 class="card-title"><?= $title ?></h5>
                    <p class="card-text"><?= $content ?></p>
                    <span class="text-muted"><?= $date ?></span>
                  </div>
                </div>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="text-center">
          <button class="btn btn-primary">Xem thêm</button>
        </div>
      </div>

    </div>
  </div>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Initialize Swiper
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 30,
      hashNavigation: { watchState: true },
      direction: "vertical",
      slidesPerView: 1,
      mousewheel: true,
      loop: true,
      autoplay: { delay: 5000, disableOnInteraction: false },
      pagination: { el: ".swiper-pagination", clickable: true },
    });
  </script>
</body>
</html>