<?php
  session_start();
  ob_start();

  include "../dao/pdo.php";
  include "../dao/sanpham.php";
  include "../dao/bill.php";
  include "../dao/user.php";


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


        include "../admin/view/sanpham.php";
        break;
      
      case 'themsanpham':
        $chonSanPham = chonsanpham();
        $chonSize = chonsize();
        $chonColor = choncolor();
        // $chonPhanLoai = chonphanloai();
        include "../admin/view/themsanpham.php";
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
