<?php
require_once 'pdo.php';

function user_insert($email, $password){
    $sql = "INSERT INTO user(email, password) VALUES (?, ?)";
    pdo_execute($sql, $email, $password); 
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

function user_update($email, $password, $name, $district, $phone, $date, $gender, $role, $age ,$id_user){
    $sql = "UPDATE user set email = ?, password = ?, ten = ?, diachi = ?, dienthoai = ?, sinhnhat = ?, gioitinh = ?, role = ?, age = ?  where id_user=? ";
    pdo_execute($sql, $email, $password, $name, $district, $phone, $date, $gender, $role, $age ,$id_user);
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

// function khachhang()


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