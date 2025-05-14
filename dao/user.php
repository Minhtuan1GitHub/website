<?php
require_once 'pdo.php';

function user_insert($email, $password, $ngaydangki){
    $sql = "INSERT INTO user(email, password, ngaydangki) VALUES (?, ?, ?)";
    pdo_execute($sql, $email, $password, $ngaydangki); 
}

function user_select_by_email($email){
    $sql = "SELECT email from user where email = ? ";
    return pdo_query_one($sql, $email);
}

function checkuser($email, $password){
    $sql = "SELECT * from user where email =? and password =? ";
    // neu co thi $kq se co mang 1 chieu
    return pdo_query_one($sql, $email, $password);
}

function checkEmail($email){
    $sql = "SELECT * from user where email = ?";
    return pdo_query_one($sql, $email);
}

function checkPassWord($id_user){
    $sql = "SELECT password from user where id_user=? ";
    $kq = pdo_query_one($sql, $id_user);
    if ($kq){
        return $kq['password'];
    }else{
        return false;
    }
    // return pdo_query_one($sql,$id_user);
}

function checkNewPassword($newPassword, $comfirmNewPassword){
    if ($newPassword == $comfirmNewPassword){
        return true;
    }
    return false;
}

function user_update($email, $password, $name, $district, $phone, $date, $gender, $age ,$id_user){
    $sql = "UPDATE user set email = ?, password = ?, ten = ?, diachi = ?, dienthoai = ?, sinhnhat = ?, gioitinh = ?, age = ?  where id_user=? ";
    pdo_execute($sql, $email, $password, $name, $district, $phone, $date, $gender, $age ,$id_user);
}

function trangThaiTaiKhoan($id_user){
    $sql = "SELECT taikhoan.*
            from taikhoan
            join user on user.trangthai = taikhoan.id
            where user.id_user = ?";
    // $result = pdo_query_one($sql, $id_user);
    // return $result['trangthai'];
    // return pdo_query($sql, $id_user);
    return pdo_query_one($sql, $id_user);
}



function user_update_password ($password, $id_user){
    $sql = "UPDATE user set password = ? where id_user = ? ";
    pdo_execute($sql, $password, $id_user);
}

function update_password($password, $email){
    $sql  = "UPDATE user set password = ? where email = ?";
    pdo_execute($sql, $password, $email);
}


function get_user($id_user){
    $sql = "SELECT * from user where id_user =? ";
    return pdo_query_one($sql, $id_user);
}

function get_id ($email){
    $sql = "SELECT id_user from user where email = ?";
    return pdo_query_one($sql, $email);
}

function danhsachkhachhang(){
    $sql = "SELECT user.*, taikhoan.background, taikhoan.color
            from user
            join taikhoan on taikhoan.id = user.trangthai";
    return pdo_query($sql);
}

function getOrderById($id_user){
    $sql = "SELECT COUNT(id_bill) AS total_orders FROM bill WHERE id_user = ?";
    $result = pdo_query_one($sql, $id_user);
    return $result['total_orders'];
}

function getTotalById($id_user){
    $sql = "SELECT sum(tongtien) as total from bill where id_user = ?";
    $result = pdo_query_one($sql, $id_user);
    return $result['total'];
}

function getStatusById($id_user){
    $sql = "SELECT taikhoan.trangthai
            from taikhoan
            join user on user.trangthai = taikhoan.id
            where user.id_user = ?";
    $result = pdo_query_one($sql, $id_user);
    // return pdo_query_value($sql)
    return $result['trangthai'];
}

function tongkhachhang(){
    $sql = "SELECT count(id_user) as total from user";
    $result = pdo_query_one($sql);
    return $result['total'];
}

function khachhangmoi(){
    $sql = "SELECT count(id_user) as total
            from user
            where ngaydangki >= current_date() - interval 7 day";
    $result = pdo_query_one($sql);
    return $result['total'];
}

function khachhangtiemnang(){
    $sql = "SELECT count(*) as total
            from(
                select id_user
                from bill
                group by id_user
                having sum(tongtien)>200
            )as total";
    $result = pdo_query_one($sql);
    return $result['total'];
}

function khachhangkemmuasam(){
    $sql = "SELECT count(id_user) as total
            from user
            where id_user not in (
                select distinct id_user
                from bill
            );";
    $result = pdo_query_one($sql);
    return $result['total'];
}

function khoataikhoan($id_user){
    $sql = "UPDATE user set trangthai = 2 where id_user = ?";
    pdo_execute($sql, $id_user);
}
function motaikhoan($id_user){
    $sql = "UPDATE user set trangthai = 1 where id_user = ?";
    pdo_execute($sql, $id_user);
}

function xoataikhoan($id_user){
    $sql = "DELETE from user where id_user = ?";
    pdo_execute($sql, $id_user);
}

function updateUser($id_user, $ten, $diachi, $dienthoai){
    $sql = "UPDATE user set ten = ?, diachi = ?, dienthoai = ? where id_user = ?";
    pdo_execute($sql, $ten, $diachi, $dienthoai, $id_user);
}

function user_insert2($email){
    $sql = "INSERT INTO user(email) VALUES (?)";
    pdo_execute($sql, $email);
}

function user_insert_google($email, $name, $ngaydangki) {
    $sql = "INSERT INTO user (email, ten, ngaydangki, role, trangthai) VALUES (?, ?, ?, 0, 1)";
    pdo_execute($sql, $email, $name, $ngaydangki);
}

function link_google_account($id_user, $google_email) {
    $sql = "UPDATE user SET google_email = ? WHERE id_user = ?";
    pdo_execute($sql, $google_email, $id_user);
}

// function khach_hang_update($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro){
//     $sql = "UPDATE khach_hang SET mat_khau=?,ho_ten=?,email=?,hinh=?,kich_hoat=?,vai_tro=? WHERE ma_kh=?";
//     pdo_execute($sql, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat==1, $vai_tro==1, $ma_kh);
// }

// function khach_hang_delete($ma_kh){
//     $sql = "DELETE FROM khach_hang  WHERE ma_kh=?";
//     if(is_array($ma_kh)){
//         foreach ($ma_kh as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_kh);
//     }
// }

// function khach_hang_select_all(){
//     $sql = "SELECT * FROM khach_hang";
//     return pdo_query($sql);
// }

// function khach_hang_select_by_id($ma_kh){
//     $sql = "SELECT * FROM khach_hang WHERE ma_kh=?";
//     return pdo_query_one($sql, $ma_kh);
// }

// function khach_hang_exist($ma_kh){
//     $sql = "SELECT count(*) FROM khach_hang WHERE $ma_kh=?";
//     return pdo_query_value($sql, $ma_kh) > 0;
// }

// function khach_hang_select_by_role($vai_tro){
//     $sql = "SELECT * FROM khach_hang WHERE vai_tro=?";
//     return pdo_query($sql, $vai_tro);
// }

// function khach_hang_change_password($ma_kh, $mat_khau_moi){
//     $sql = "UPDATE khach_hang SET mat_khau=? WHERE ma_kh=?";
//     pdo_execute($sql, $mat_khau_moi, $ma_kh);
// }