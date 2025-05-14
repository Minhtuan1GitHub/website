<?php
  session_start();
  ob_start();
  // phpinfo();

  include "../dao/pdo.php";
  include "../dao/sanpham.php";
  include "../dao/bill.php";
  include "../dao/user.php";
  include "../dao/tinnhan.php";

  include "../admin/view/header.php"; 

  if (isset($_GET['page'])){
    $page = $_GET['page'];
    switch ($page) {
      case 'sanpham':

        $sort = $_GET['sort'];
        switch ($sort) {
          case 'sortBy0':
            $order_by = '0';
            break;
          case 'sortBy1':
            $order_by = '1';
            break;
          case 'sortBy2':
            $order_by = '2';
            break;
          case 'sortBy3':
            $order_by = '3';
            break;    
          default:
            $order_by = '0';
            break;
        }

        $getProduct = getProduct($order_by);
        $sapxepdanhmuc = sapxepdanhmuc();

        $chonSize = chonsize();
        include "../admin/view/sanpham.php";
        break;
      
      case 'themsanpham':
        $chonSanPham = chonsanpham();
        $chonSize = chonsize();
        $chonColor = choncolor();
        // $chonPhanLoai = chonphanloai();
        include "../admin/view/themsanpham.php";
        break;
      case 'themitem':
        $allPhanLoai = selectAllPhanLoai();
        $allDanhMuc = selectAllDanhMuc();
        include "../admin/view/themitem.php";
        break;

      case 'xoasanpham':
        if (isset($_GET['id'])){
          $id = $_GET['id'];
          $id_color = $_GET['id_color'];
          $id_size = $_GET['id_size'];
          xoasanpham($id, $id_color, $id_size);
        }
        $getProduct = getProduct($order_by);
        $sapxepdanhmuc = sapxepdanhmuc();

        include "../admin/view/sanpham.php";
        break;
      case 'suasanpham':
        if (isset($_GET['id'])){
          $id = $_GET['id'];
          $id_color = $_GET['id_color'];
          $id_size = $_GET['id_size'];
          
        } 
        $getProduct = getProduct($order_by);
        $sapxepdanhmuc = sapxepdanhmuc();
        header('location: index.php?page=sanpham');
        break;
      case 'luusanpham':
        if (isset($_POST['luusanpham'])){
          foreach ($_POST['id_item'] as $index => $id_item){ {
            $stock = $_POST['stock'][$index];
            $id_size = $_POST['id_size'][$index];
            $id_color = $_POST['id_color'][$index];
            $price = $_POST['price'][$index];
            $price_sale = $_POST['price_sale'][$index];
            $limit_date_sale = $_POST['limit_date_sale'][$index];
            // updatesanpham($stock, $id_item);
            updatesanpham($stock, $id_size, $id_color, $price, $price_sale, $limit_date_sale, $id_item, $id_color, $id_size);
            header('location: index.php?page=sanpham');
            }
          }
        }
        break;
      case 'addproduct':

        if(isset($_POST['themsanpham'])){
          $id_item = $_POST['id_item'];
          $id_size = $_POST['id_size'];
          $id_color = $_POST['id_color'];
          $price = $_POST['price'];
          $stock = $_POST['stock'];
          $price_sale = $_POST['price_sale'];
          $limit_date_sale = $_POST['date_sale'];
          themsanpham($id_item, $id_size, $id_color, $price, $stock, $limit_date_sale, $price_sale);
          header('location: index.php?page=sanpham');
        }

        if (isset($_POST['themitem'])) {

          // themvaoimage_item($idMoiThem);

          $target_dir = "../layout/images/outerwear/";
          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
          $img = basename($_FILES["fileToUpload"]["name"]);
          $uploadOk = 1;
          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

          // Check if image file is a actual image or fake image
          if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
              echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
            } else {
              echo "File is not an image.";
              $uploadOk = 0;
            }
          }

          // Check if file already exists
          if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
          }

          // Check file size
          if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
          }

          // Allow certain file formats
          if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
          && $imageFileType != "gif" && $imageFileType != "avif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
          }

          // Check if $uploadOk is set to 0 by an error
          if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
          } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
              echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
            } else {
              echo "Sorry, there was an error uploading your file.";
            }
          }
          $phanloai = $_POST['id_phanloai'];
          $danhmuc = $_POST['id_danhmuc'];
          $tensanpham = $_POST['ten-san-pham'];
          date_default_timezone_set('Asia/Ho_Chi_Minh');
          $date = date('Y-m-d H:i:s');
          // Call the function to insert the item
          item_insert($img, $phanloai, $danhmuc, $tensanpham, $date);
          $idMoiThem = sanphammoithem();
          themvaostyle($idMoiThem);
          themvaoimage_item($idMoiThem);

          // Redirect to the product page
          header('location: index.php?page=sanpham');
          exit;
        }
        break;
      case 'donhang':
        $ngaybatdau = '';
        $ngayketthuc ='';
        $chontrangthai = '';
        if (isset($_POST['loc'])){
          $ngaybatdau = $_POST['ngaybatdau'];
          $ngayketthuc = $_POST['ngayketthuc'];
          $chontrangthai = $_POST['trangthai'];
        }
        $tongdonhang = tongdonhang();
        $donhangthanhcong = donhangthanhcong();
        $donhangdangxuli = donhangdangxuli();
        $donhangbihuy = donhangbihuy();
        $tatcadonhang = tatcadonhang($ngaybatdau, $ngayketthuc, $chontrangthai);
        $ds_trangthai = trangthai();
        $ds_thanhtoan = thanhtoan();
        include "../admin/view/donhang.php";
        break;
      case 'khachhang':
        $danhsachkhachhang = danhsachkhachhang();
        $tongkhachhang = tongkhachhang();
        $khachhangmoi = khachhangmoi();
        $khachhangtiemnang = khachhangtiemnang();
        $khachhangkemmuasam = khachhangkemmuasam();
        include "../admin/view/khachhang.php";
        break;
      case 'magiam':
        include "../admin/view/magiam.php";
        break;
      case 'unlocktaikhoan':
        if (isset($_POST['lock'])){
          $id_user = $_POST['id_user'];
          khoataikhoan($id_user);
          header('location: index.php?page=khachhang');
        }
        if (isset($_POST['unlock'])){
          $id_user = $_POST['id_user'];
          motaikhoan($id_user);
          header('location: index.php?page=khachhang');
        }
        if (isset($_POST['xoa'])){
          $id_user = $_POST['id_user'];
          xoataikhoan($id_user);
          header('location: index.php?page=khachhang');
        }
        break;
      case 'binhluan':
        include "../admin/view/binhluan.php";
        break;
      case 'dashboard':
        if (isset($_GET['month'])){
          $nam = $_GET['month'];
        }else{
          $nam = date('Y');
        }
        $selectYear = selectYear();
        $tongTienTheoThang = tongTienTheoThang($nam);
        $tongDoanhThu = tongDoanhThu($nam);
        $tongDonHang = tondDonHang($nam);
        $khachhangmoi = khachhangmoi();
        include "../admin/view/dashboard.php";
        break;
      case 'tinnhan':
        $customers = allmess();
        include "../admin/view/chat.php";
        break;
      case 'danhsachtinnhan':
        // header('location: index.php?page=danhsachtinnhan');
        $id_customer = $_POST['id_customer'];
        dadoc($id_customer);
        $allTinNhan = message_select_by_id($id_customer, $id_customer);
        include "../admin/view/danhsachtinnhan.php";
        break;
      case 'replytinnhan':
        if (isset($_POST['reply'])){
          $content = $_POST['content'];
          $id_nguoinhan = $_POST['id_nguoigui'];
          $id_nguigui = $_SESSION['session_user']['id_user'];
          date_default_timezone_set('Asia/Ho_Chi_Minh');
          $dateCreate = date('Y-m-d H:i:s');
          message_insert($id_nguigui, $content, $dateCreate, $id_nguoinhan);
          header('location: index.php?page=tinnhan');
        }
        break;
      case 'capnhatsanpham':
        $id_bill = $_POST['id_bill'];
        $trangthaithanhtoan = $_POST['thanhtoan'];
        $allTrangThai = getAllTrangThai();
        $allThanhToan = getAllThanhToan();
        include "../admin/view/capnhatsanpham.php";
        break;
      case 'capnhattrangthaimoi':
        if (isset($_POST['gui'])){
          $id_bill = $_POST['id_bill'];
          $trangthaithanhtoan = $_POST['trangthaithanhtoan'];
          if ($trangthaithanhtoan != 8){
            $trangthaimoi = $_POST['trangthaimoi'];
            updateTrangThaiMoi($trangthaimoi, $id_bill);
          }else{
            $thanhtoanmoi = $_POST['thanhtoanmoi'];
            updateThanhToanMoi($thanhtoanmoi, $id_bill);
            // lam them gui mail cho nay ! 
          }
          
          header('location: index.php?page=donhang');

        }
        break;
      default:
        include "../admin/view/dashboard.php";
      break;
    }
  }else{
    if (isset($_GET['month'])){
      $nam = $_GET['month'];
    }else{
      $nam = date('Y');
    }
    $selectYear = selectYear();
    $tongTienTheoThang = tongTienTheoThang($nam);
    $tongDoanhThu = tongDoanhThu($nam);
    $tongDonHang = tondDonHang($nam);
    $khachhangmoi = khachhangmoi();

    include "../admin/view/dashboard.php";
  }



  include "../admin/view/footer.php";

?>
