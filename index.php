<?php
    // mo cua session
    session_start();
    ob_start();
    


    if (!isset($_SESSION["giohang"][$id_user])){
        $_SESSION["giohang"][$id_user]=[];
    }
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);

  // nhung ket noi database
  include "dao/pdo.php";
  include "dao/danhmuc.php";
  include "dao/sanpham.php";
  include "dao/giohang.php";
  include "dao/voucher.php";
  include "dao/user.php";
  include "dao/mail.php";
  include "dao/bill.php";
  include "dao/binhluan.php";

  if (!isset($_GET['page'])) {

        $phanloai = get_phanploai();
        include "view/header.php";


        $dssp_new = get_dssp_home(10);


      include "view/home.php";
      include "view/bottom.php";
  } else {
      switch ($_GET['page']) {

            case 'men': // Khi chọn Men

                $phanloai = get_phanploai();
                include "view/header1.php";
                $dsdm =dm_all(1);  

                $keyword ="";
                $titlePage =""; 
                
                if(!isset($_GET['dm_id'])){
                    $dm_id=0;
                }else{
                    $dm_id = $_GET['dm_id'];
                    $titlePage=get_name_dm($dm_id);
                }

       
                
                // kiem tra xem co cick button khong
                if (isset($_POST["find"])&&($_POST["find"])){
                // lay keyword
                  $keyword = $_POST["keyword"];
                //   title
                  $titlePage ="".$keyword;  
                }

                $dssp = get_dssp($keyword,$dm_id,20,1);   

                $dsspHot = get_dsspHot($dm_id,4,1);

                $dsspLike =get_dsspLike($dm_id,4,1);

                $dsspNew = get_dsspNew($dm_id,4,1);

                $dsspSale = get_dsspSale($dm_id,4,1);
                

                include "view/men.php";


                

                include "view/find.php";
                include "view/footer.php";
                break;
            
            
            case 'sanphamchitiet':
                $phanloai = get_phanploai();
                include "view/header1.php";

                if (isset($_GET['idpro'])){
                    $id = $_GET['idpro'];
                    $sanphamchitiet = get_sp_by_id($id);
                    $hinhanhlienquan = get_image_by_id($id);
                    $style = get_style_by_id($id);

                    if (isset($_POST['guibinhluan'])){
                        $id_user = $_SESSION['session_user']['id_user'];
                        $id = $_GET['idpro'];
                        $noidung = $_POST['noidung'];
                        $size = $_POST['size'];
                        $color = $_POST['color'];
                        $nickname = $_POST['nickname'];
                        $sao = $_POST['rating'];
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $date = date("l jS \of F Y h:i:s A");

                        $ten = $_SESSION['session_user']['ten'];
                        $diachi = $_SESSION['session_user']['diachi'];

                        $birthDate = new DateTime($_SESSION['session_user']['sinhnhat']);
                        $today = new DateTime();
                        $age = $today->diff($birthDate)->y;

                        binhluan_insert($id_user, $id, $noidung, $size, $color, $sao, $nickname, $date, $ten, $age, $diachi); 
                        header("location: index.php?page=sanphamchitiet&idpro=$id");          
                    }

                    $danhsachbinhluan = binhluan_all($id,4);

                    $getcolor = get_color_by_id($id);

                    
                    // $getsize =getsizebycolor($_SESSION['idpro'],$_SESSION['id_color']); 
                    $getsize = get_size_by_id($id);
 
                    $getavg = getavg($id);
                    $count_binhluan = binhluan_count($id);
                    include "view/sanphamchitiet.php";
                    $dm_id = get_dm_id($id);
                    $dssp_lienquan = get_dssp_lienquan($dm_id, $id, 10);
                    include "view/splq.php";


                }else{

                    $dsdm =dm_all(1);

                    $dssp = get_dssp($keyword,$dm_id,10,1);   


                    $dsspHot = get_dsspHot($dm_id,4,0);
    
                    $dsspLike =get_dsspLike($dm_id,4,1);
    
                    $dsspNew = get_dsspNew($dm_id,4,1);
    
                    $dsspSale = get_dsspSale($dm_id,4,1);
                    include "view/men.php";
                }



                include "view/find.php";
                include "view/footer.php";
                break;
                
            case 'addcart':

                if (isset($_SESSION['session_user']) && count($_SESSION['session_user'])>0){

                    if (isset($_POST["addcart"])){

                        $id_user = $_SESSION['session_user']['id_user'];

                        // lay du lieu ve 
                        $id = $_POST["id"];
                        $img = $_POST["img"];
                        $price = $_POST["price"];
                        $name_item = $_POST["name_item"];
                        $price_sale = $_POST["price_sale"];
                        $description = $_POST["description"];
                        $soluong = $_POST["soluong"];
                        $limit_date_sale = $_POST["limit_date_sale"];
                        $size = $_POST["size"];
                        $color = $_POST["color"];
                        $sp = array("id"=>$id,"img"=>$img, "price"=>$price, "name_item" =>$name_item, "price_sale"=>$price_sale,"description"=>$description, "soluong"=>$soluong, "limit_date_sale"=>$limit_date_sale, "size"=>$size, "color"=>$color);
                        // day vao gio hang
                        if (!isset($_SESSION["giohang"][$id_user])) {
                            $_SESSION["giohang"][$id_user] = [];
                        }

                        $tontai = false;
                        foreach ($_SESSION["giohang"][$id_user] as $key => $item) {
                            if ($item['id'] == $id){
                                $_SESSION["giohang"][$id_user][$key]['soluong'] +=$soluong;
                                $tontai = true;
                                break;
                            }
                        }
                        if (!$tontai){
                            array_push($_SESSION["giohang"][$id_user], $sp);

                        }


                        // check xem them vao gio hang chua
                        // echo var_dump($_SESSION["giohang"]);
                        header('location: index.php?page=viewcart'); //lam viec voi session phai chuyen trang
                    }
                }else{
                    $id = $_POST["id"];
                    $_SESSION['tb_chuadangnhap'] = "Bạn chưa truy cập vào tài khoản";
                    header('location: index.php?page=sanphamchitiet&idpro='.$id.'');
                }
                break;
            case 'addlike':
                if (isset($_POST["addlike"])){
                    header('location: index.php?page=viewlike');
                }
                break;
            case 'viewlike': 
                      $phanloai = get_phanploai();
                include "view/header1.php";
                include "view/viewlike.php";
                include "view/footer1.php";
                include "view/find.php";
                break;
            case 'remove':
                if (isset($_SESSION['session_user']) &&count($_SESSION['session_user'])>0){
                    $user = $_SESSION['session_user']['id_user'];

                    if (isset($_GET['id'])){
                        $id = $_GET['id'];
                        if(isset($_SESSION["giohang"][$user][$id])){
                            unset($_SESSION["giohang"][$user][$id]);
                        }
                    }
                    if (empty($_SESSION["giohang"][$user])){
                        header('location: index.php?page=men');
                        exit();
                    }
                }

                header('location: index.php?page=viewcart');
                break;

            case 'viewcart':
                //xoa gio hang
                if (isset($_GET['del']) && ($_GET['del']==1)){
                    if (isset($_SESSION['session_user']) && count($_SESSION['session_user'])>0){
                        $user = $_SESSION['session_user']['id_user'];
                            unset($_SESSION["giohang"][$user]);
                        header('location: index.php?page=men');
                    }
                }else{
                    //khong xoa thi lam viec tai day
                    //check xem gio hang co ton tai khong
                    if (isset($_SESSION['session_user']) && count($_SESSION['session_user'])>0){
                        $user = $_SESSION['session_user']['id_user'];
                    
                        $giatrivoucher = 0;
                    if (isset($_GET['voucher']) && ($_GET['voucher']==1)){
                        $tongdonhang = $_POST['tongdonhang'];
                        $mavoucher = $_POST['mavoucher'];
                    
                        $giatrivoucher = getVoucherDiscount($mavoucher);

                    } 

                    // viet tiep phan voucer
                    if (isset($_GET['voucher']) && ($_GET['voucher']==2)){
                        $tongdonhang = $_POST['tongdonhang'];
                        $id_voucher=  $_POST['voucher_giam'];
                        
   
                        $giatrivoucher = getVoucher($id_voucher);
                        // header('location: index.php');
                    }
                }

                        $_SESSION['tien']= $tongdonhang - ($tongdonhang * ($giatrivoucher/100));
                }
                      $phanloai = get_phanploai();
                include "view/header1.php";

                $voucher = get_voucher(10);
                include "view/viewcart.php";
                include "view/find.php";
                include "view/footer.php";
                break;

            case 'dangnhap':
                      $phanloai = get_phanploai();
                include "view/header1.php";
                include "view/dangnhap.php";
                include "view/find.php";

                break;
            case 'login':

                // input
                if (isset($_POST["dangnhap"]) && ($_POST["dangnhap"])){
                    $email = $_POST["email"];
                    $password = $_POST["password"];

                    //xu li
                    $kq = checkuser($email, $password);

                    
                    if(is_array($kq) && (count($kq))){
                        $_SESSION['session_user'] = $kq;
                        $_SESSION['tb_dangnhap'] = 'Đăng nhập thành công';
                        
                        if (isset($_SESSION['trang']) && $_SESSION['trang'] == "sanphamchitiet"){
                            header('location: index.php?page=sanphamchitiet&idpro='.$_SESSION['idpro']);
                            unset($_SESSION['trang']);
                            unset($_SESSION['idpro']);
                        }else{
                            header('location: index.php?page=member');
                        }
                                                  
                    }
                    else{
                        $_SESSION['tb_dangnhap'] = "Tài khoản không tồn tại";
                        //out
                        header('location: index.php?page=dangnhap');
                    }
                }
                break;
            case 'logout':
                if (isset($_SESSION['session_user']) && ($_SESSION['session_user'])>0){
                    unset($_SESSION['session_user']);
                    unset($_SESSION['trang']);
                }
                header('location: index.php');
                break;

            case 'member':

                if(isset($_SESSION['session_user']) && (count($_SESSION['session_user'])>0)){
                          $phanloai = get_phanploai();
                include "view/header1.php";
                    include "view/member.php";
                    include "view/footer.php";
                    include "view/find.php";
                }


                break;
            case 'updateuser':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])){
                    $email = $_POST["email"];
                    $password = $_POST["password"];
                    $name = $_POST["name"];
                    $district = $_POST["district"];
                    $phone = $_POST["phone"];
                    $date = $_POST["date"];
                    $gender = $_POST["gender"];
                    $role = 0;
                    $id_user = $_POST["id_user"];
                    date_default_timezone_set('Asia/Ho_Chi_Minh');

                    $birthDate = new DateTime($date);
                    $today = new DateTime();
                    $age = $today->diff($birthDate)->y;
                    // xu li
                    user_update($email, $password, $name, $district, $phone, $date, $gender, $role, $age ,$id_user);
                    //out
                          $phanloai = get_phanploai();
                    include "view/header1.php";
                    include "view/member_comfirm.php";
                    include "view/footer.php";
                    include "view/find.php";
                }
                break;
            case 'updatepassword':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])){
                    $oldPass = $_POST["password"];
                    $newPass = $_POST["newPassword"];
                    $confirmNewPass = $_POST["confirmNewPassword"];

                    $id_user = $_POST["id_user"];
                    //xuli
                    $check = checkPassWord($id_user);

                    if ($oldPass != $check){
                        $_SESSION['tb_xacthuc'] = "Mật khẩu hiện tại chưa đúng";
                        header('location: index.php?page=changePassword');
                    }else{
                        if (($newPass != $confirmNewPass) || ($newPass == "" && $confirmNewPass =="")){
                            $_SESSION['tb_xacthuc'] = "Mật khẩu mới chưa trùng khớp";
                            header('location: index.php?page=changePassword');
                        }else{
                            user_update_password($newPass, $id_user);
                            $_SESSION['tb_xacthuc'] = "Thay đổi mật khẩu thành công";
                            header('location: index.php?page=member');
                        }
                    }
                    // include "view/header1.php";
                    // include "view/member_comfirm.php";
                }

                break;
            

            
            case 'changePassword':



                          $phanloai = get_phanploai();
                include "view/header1.php";
                    include "view/changePassword.php";
                    include "view/footer.php";
                    include "view/find.php";
                

                break;
            
            case 'dangky':
                      $phanloai = get_phanploai();
                include "view/header1.php";
                include "view/dangky.php";
                include "view/find.php";
                break;
            case 'quenmatkhau':
                $phanloai = get_phanploai();
                include "view/header1.php";
                include "view/quenmatkhau.php";
                include "view/find.php";
                break;
            case 'forgetpassword':
                //input
                if (isset($_POST["nutguiyeucau"]) && ($_POST["nutguiyeucau"])){
                    $email = $_POST['email'];
                    $check = checkEmail($email);
                    if ($check ==""){
                        $_SESSION['tb'] = "<div class='alert alert-danger'>Bạn chưa có tài khoản</div>";   
                        header('location: index.php?page=quenmatkhau');                     
                    }else{
                        $newPassWord = substr( md5( rand(0,999999)) , 0, 8);
                        update_password ($newPassWord, $email);

                        // $_SESSION['tb'] = "<div class='alert alert-success'>Thành công </div>";
                        // header('location: index.php?page=quenmatkhau');
                        $kq = sendmail($email, $newPassWord);
                        if ($kq == true){
                            $_SESSION['tb_dangnhap'] = "Kiểm tra email của bạn";
                            header('location: index.php?page=dangnhap');
                        }

                    }
                    // header('location: index.php?page=quenmatkhau');
                }
                //xu li
                //out
                    // header('location: index.php?page=quenmatkhau');
                break;
            case 'transfer':
                $email = '';
                $ten = '';
                
                if (isset($_POST["transfer"]) && ($_POST["transfer"])){


                    if (isset($_SESSION['session_user']) && ($_SESSION['session_user'])){
                        if (isset($_SESSION['session_user']['email']) && ($_SESSION['session_user']['email'])){
                            $email = $_SESSION['session_user']['email'];
                        }
                        if (isset($_SESSION['session_user']['id_user']) && ($_SESSION['session_user']['id_user'])){
                            $id_user = $_SESSION['session_user']['id_user'];
                        }
                        if (isset($_SESSION['session_user']['ten']) && ($_SESSION['session_user']['ten'])){
                            $ten = $_SESSION['session_user']['ten'];
                        }
                        if (isset($_SESSION['session_user']['dienthoai']) && ($_SESSION['session_user']['dienthoai'])){
                            $sodienthoai = $_SESSION['session_user']['dienthoai'];
                        }
                        if (isset($_SESSION['session_user']['diachi']) && ($_SESSION['session_user']['diachi'])){
                            $diachi = $_SESSION['session_user']['diachi'];
                        }
                        $madonhang = $_POST['madonhang'];
                        if (isset($_SESSION['tien'])){
                            $tongtien = $_SESSION['tien'];
                        }


                        add_bill($madonhang, $id_user, $tongtien, $sodienthoai, $diachi, $ten);
                        sendmail1($email, $ten, $sodienthoai, $diachi, $madonhang, $tongtien);
                        header('location: index.php?page=chuyenkhoan');

                    }

                }
                break;
            case 'chuyenkhoan':
                $phanloai = get_phanploai();
                include "view/header1.php";
                if (isset($_SESSION['session_user']) && count($_SESSION['session_user'])){
                    $id_user = $_SESSION['session_user']['id_user'];
                    $get_bill = bill_by_id($id_user);
                }
                include "view/chuyenkhoan.php";
                include "view/footer.php";
                include "view/find.php";
                break;
            case 'adduser':
                //kiem tra ton tai thi moi lay du lieu
                if (isset($_POST["dangky"]) && ($_POST["dangky"])){
                    $email = $_POST["email"];
                    $password = $_POST["password"];
                    //xu li
                    $tontai = user_select_by_email($email);
                    $alert = '';
                    if ($tontai == false){
                        
                        user_insert($email, $password);
                        $alert = "<div class='alert alert-success mt-2' id ='myAlert' role = 'alert'>Đăng ký thành công</div>";
                        $phanloai = get_phanploai();
                        include "view/header1.php";
                        include "view/dangnhap.php";
                    }else{
                        $alert = "<div class='alert alert-danger mt-2' id ='myAlert' role = 'alert'>Email đã tồn tại. Vui lòng sử dụng email khác.</div>";                        
                              $phanloai = get_phanploai();
                include "view/header1.php";
                        include "view/dangky.php";
                    }
                }


                break;


            case 'women':


                $phanloai = get_phanploai();
                include "view/header1.php";
                $dsdm =dm_all(0); 

                $keyword ="";
                $titlePage =""; 
                
                if(!isset($_GET['dm_id'])){
                    $dm_id=0;
                }else{
                    $dm_id = $_GET['dm_id'];
                    $titlePage=get_name_dm($dm_id);
                }

                $dssp = get_dssp($keyword,$dm_id,20,0); 
                $dsspHot = get_dsspHot($dm_id,4,0);
                $dsspLike =get_dsspLike($dm_id,4,0);

                $dsspNew = get_dsspNew($dm_id,4,0);

                $dsspSale = get_dsspSale($dm_id,4,0);
                
                

                include "view/women.php";

                include "view/footer1.php";
                include "view/find.php";
                break;
                
                    
            case 'kid':

                $phanloai = get_phanploai();
                include "view/header1.php";
                $dsdm =dm_all(2); 

                $keyword ="";
                $titlePage =""; 
                
                if(!isset($_GET['dm_id'])){
                    $dm_id=0;
                }else{
                    $dm_id = $_GET['dm_id'];
                    $titlePage=get_name_dm($dm_id);
                }

                $dssp = get_dssp($keyword,$dm_id,20,2);  
                

                include "view/kid.php";

                include "view/footer1.php";
                include "view/find.php";
                break; 

            case 'baby':
                $phanloai = get_phanploai();
                include "view/header1.php";
                $dsdm =dm_all(3); 

                $keyword ="";
                $titlePage =""; 
                
                if(!isset($_GET['dm_id'])){
                    $dm_id=0;
                }else{
                    $dm_id = $_GET['dm_id'];
                    $titlePage=get_name_dm($dm_id);
                }

                $dssp = get_dssp($keyword,$dm_id,20,3);  
                

                include "view/baby.php";

                include "view/footer1.php";
                include "view/find.php";
                break; 
            case 'danhgia':
                $phanloai = get_phanploai();
                include "view/header1.php";
                if (isset($_SESSION['idpro'])){
                    $id = $_SESSION['idpro'];
                }
                $danhsachbinhluan = binhluan_all($id,10);
                $count_binhluan = binhluan_count($id);

                include "view/danhgia.php";
                include "view/find.php";
                include "view/footer.php";
                break;
            case 'admin':
                include "view/admin.php";
                break;
            case 'color':
                // if (!isset($_POST['color'])){
                //     $_SESSION['id_color'] =1;
                // }
                break;
            default:
                $phanloai = get_phanploai();
                include "view/header.php";
                $dssp_new = get_dssp_home(10);

                include "view/home.php";
                include "view/bottom.php";
                break;
      }
  }
?>
