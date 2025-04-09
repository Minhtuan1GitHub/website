<?php
    // mo cua session
    session_start();
    ob_start();

    if (!isset($_SESSION["giohang"])){
        $_SESSION["giohang"]=[];
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

  if (!isset($_GET['page'])) {


        include "view/header.php";


        $dssp_new = get_dssp_home(10);


      include "view/home.php";
      include "view/bottom.php";
  } else {
      switch ($_GET['page']) {

            case 'men': // Khi chọn Men

                include "view/header1.php";
                $dsdm =dm_all();  

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

                $dssp = get_dssp($keyword,$dm_id,20);   

                $dsspHot = get_dsspHot($dm_id,4);

                $dsspLike =get_dsspLike($dm_id,4);

                $dsspNew = get_dsspNew($dm_id,4);

                $dsspSale = get_dsspSale($dm_id,4);
                

                include "view/men.php";


                

                include "view/find.php";
                include "view/footer.php";
                break;
            
            
            case 'sanphamchitiet':
                include "view/header1.php";

                if (isset($_GET['idpro'])){
                    $id = $_GET['idpro'];
                    $sanphamchitiet = get_sp_by_id($id);
                    $hinhanhlienquan = get_image_by_id($id);
                    $style = get_style_by_id($id);

                    include "view/sanphamchitiet.php";
                    $dm_id = get_dm_id($id);
                    $dssp_lienquan = get_dssp_lienquan($dm_id, $id, 10);
                    include "view/splq.php";


                }else{

                    $dsdm =dm_all();

                    $dssp = get_dssp($keyword,$dm_id,10);   


                    $dsspHot = get_dsspHot($dm_id,4);
    
                    $dsspLike =get_dsspLike($dm_id,4);
    
                    $dsspNew = get_dsspNew($dm_id,4);
    
                    $dsspSale = get_dsspSale($dm_id,4);
                    include "view/men.php";
                }



                include "view/find.php";
                include "view/footer.php";
                break;
                
            case 'addcart':


                if (isset($_POST["addcart"])){
                    // lay du lieu ve 
                    $id = $_POST["id"];
                    $img = $_POST["img"];
                    $price = $_POST["price"];
                    $name_item = $_POST["name_item"];
                    $price_sale = $_POST["price_sale"];
                    $description = $_POST["description"];
                    $soluong = $_POST["soluong"];
                    $limit_date_sale = $_POST["limit_date_sale"];

                    $sp = array("id"=>$id,"img"=>$img, "price"=>$price, "name_item" =>$name_item, "price_sale"=>$price_sale,"description"=>$description, "soluong"=>$soluong, "limit_date_sale"=>$limit_date_sale);
                    // day vao gio hang
                    array_push($_SESSION["giohang"],$sp);
                    // check xem them vao gio hang chua
                    // echo var_dump($_SESSION["giohang"]);
                    header('location: index.php?page=viewcart'); //lam viec voi session phai chuyen trang
                }
                break;
            case 'addlike':
                if (isset($_POST["addlike"])){
                    header('location: index.php?page=viewlike');
                }
                break;
            case 'viewlike':
                include "view/header1.php";
                include "view/viewlike.php";
                include "view/footer1.php";
                include "view/find.php";
                break;
            case 'remove':
                if (isset($_GET['id'])){
                    $id = $_GET['id'];
                    if (isset($_SESSION["giohang"][$id])){
                        unset($_SESSION["giohang"][$id]);
                    }
                }
                if (empty($_SESSION["giohang"])){
                    header('location: index.php?page=men');
                    exit();
                }
                header('location: index.php?page=viewcart');
                break;

            case 'viewcart':
                //xoa gio hang
                if (isset($_GET['del']) && ($_GET['del']==1)){
                    unset($_SESSION["giohang"]);
                    // $_SESSION["giohang"]=[];
                    header('location: index.php?page=men');
                }else{
                    //khong xoa thi lam viec tai day
                    //check xem gio hang co ton tai khong
                    if (isset($_SESSION['giohang'])){
                        $tongdonhang = get_tongdonhang();
                    }
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
                        
                    }

                        $tongdonhang_giamgia = $tongdonhang - ($tongdonhang * ($giatrivoucher/100));
                }
                include "view/header1.php";

                $voucher = get_voucher(10);
                include "view/viewcart.php";
                include "view/find.php";
                include "view/footer.php";
                break;

            case 'dangnhap':
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
                        //out
                        header('location: index.php?page=member');                                
                    }else{
                        $_SESSION['tb_dangnhap'] = "Tài khoản không tồn tại";
                        //out
                        header('location: index.php?page=dangnhap');
                    }
                }
                break;
            case 'logout':
                if (isset($_SESSION['session_user']) && ($_SESSION['session_user'])>0){
                    unset($_SESSION['session_user']);
                }
                header('location: index.php');
                break;

            case 'member':

                if(isset($_SESSION['session_user']) && (count($_SESSION['session_user'])>0)){
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
                    // xu li
                    user_update($email, $password, $name, $district, $phone, $date, $gender, $role ,$id_user);
                    //out
                    include "view/header1.php";
                    include "view/member_comfirm.php";
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



                    include "view/header1.php";
                    include "view/changePassword.php";
                    include "view/footer.php";
                    include "view/find.php";
                

                break;
            
            case 'dangky':
                include "view/header1.php";
                include "view/dangky.php";
                include "view/find.php";
                break;
            case 'quenmatkhau':
                include "view/header1.php";
                include "view/quenmatkhau.php";
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
                        include "view/header1.php";
                        include "view/dangnhap.php";
                    }else{
                        $alert = "<div class='alert alert-danger mt-2' id ='myAlert' role = 'alert'>Email đã tồn tại. Vui lòng sử dụng email khác.</div>";                        
                        include "view/header1.php";
                        include "view/dangky.php";
                    }
                }


                break;


            case 'women':
                include "view/women.php";
                break;
                
                    
            case 'kids':
                include "view/kid.php";
                break; 

            case 'baby':
                include "view/baby.php";
                break;

            default:
                include "view/header.php";
                $dssp_new = get_dssp_home(10);

                include "view/home.php";
                include "view/bottom.php";
                break;
      }
  }
?>
