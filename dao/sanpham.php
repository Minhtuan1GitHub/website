<?php
require_once 'pdo.php';

// function hang_hoa_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta){
//     $sql = "INSERT INTO hang_hoa(ten_hh, don_gia, giam_gia, hinh, ma_loai, dac_biet, so_luot_xem, ngay_nhap, mo_ta) VALUES (?,?,?,?,?,?,?,?,?)";
//     pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet==1, $so_luot_xem, $ngay_nhap, $mo_ta);
// }

// function hang_hoa_update($ma_hh, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta){
//     $sql = "UPDATE hang_hoa SET ten_hh=?,don_gia=?,giam_gia=?,hinh=?,ma_loai=?,dac_biet=?,so_luot_xem=?,ngay_nhap=?,mo_ta=? WHERE ma_hh=?";
//     pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet==1, $so_luot_xem, $ngay_nhap, $mo_ta, $ma_hh);
// }

// function hang_hoa_delete($ma_hh){
//     $sql = "DELETE FROM hang_hoa WHERE  ma_hh=?";
//     if(is_array($ma_hh)){
//         foreach ($ma_hh as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_hh);
//     }
// }

function getVoucherDiscount($mavoucher) {
    $sql = "SELECT * FROM voucher WHERE voucher_code = ?";
    return pdo_query_one($sql, $mavoucher)['voucher_giam'] ?? 0;
}

function getVoucher($id_voucher){
    $sql = "SELECT * from voucher where id_voucher = ?";
    return pdo_query_one($sql,$id_voucher)['voucher_giam'] ?? 0;
}
 

function get_dssp_home($limi){
    $sql = " SELECT * FROM sanpham order by id desc limit ".$limi; //parameter limit
    return pdo_query($sql);
}

function get_voucher($limi){
    $sql = " SELECT * from voucher order by voucher_giam asc limit ".$limi;
    return pdo_query($sql);
}

function get_dssp($keyword,$dm_id,$limi,$id_phanloai){
    $sql = "SELECT item.* 
            FROM item  
            join danhmuc
            on item.dm_id = danhmuc.dm_id
            where item.id_phanloai = ?";

    if ($dm_id > 0){    
        $sql .=" AND item.dm_id=".$dm_id;
    }
    if ($keyword!=""){
        $sql .=" AND danhmuc.name like '%".$keyword."%'";
    }

    $sql .=" order by item.id desc limit ".$limi; //parameter limit
    return pdo_query($sql, $id_phanloai);
}

function get_dsspHot($dm_id,$limi, $id_phanloai){
    $sql = "SELECT * FROM item where id_phanloai = ?";

    if ($dm_id > 0){    
        $sql .=" AND dm_id=".$dm_id;
    }

    $sql .=" order by view desc limit ".$limi; //parameter limit
    return pdo_query($sql,$id_phanloai);
}

function get_dsspLike($dm_id,$limi,$id_phanloai){
    $sql = "SELECT * FROM item where id_phanloai = ?";

    if ($dm_id > 0){    
        $sql .=" AND dm_id=".$dm_id;
    }

    $sql .=" order by love desc limit ".$limi; //parameter limit
    return pdo_query($sql,$id_phanloai);
}

function get_dsspNew($dm_id,$limi,$id_phanloai){
    $sql = "SELECT * FROM item where id_phanloai = ?";

    if ($dm_id > 0){    
        $sql .=" AND dm_id=".$dm_id;
    }

    $sql .=" order by love desc limit ".$limi; //parameter limit
    return pdo_query($sql,$id_phanloai);
}

function get_dsspSale($dm_id,$limi,$id_phanloai){
    $sql = "SELECT item.*, danhmuc.name FROM item join danhmuc on danhmuc.dm_id = item.dm_id where item.sale = 1 and item.id_phanloai = ?";

    if ($dm_id > 0){     
        $sql .=" AND item.dm_id=".$dm_id;
    }

    $sql .=" order by item.price_sale desc limit ".$limi; //parameter limit
    return pdo_query($sql,$id_phanloai);
}


function get_dssp_lienquan($dm_id, $id, $limi){
    $sql = "SELECT * from item where dm_id =?  AND id <>? ORDER BY  id DESC limit ".$limi;
    return pdo_query($sql, $dm_id, $id);
}

function get_dm_id($id){
    $sql = "SELECT dm_id from item where id =?";
    return pdo_query_value($sql,$id);
}




function get_sp_by_id($id){
    $sql = "SELECT item.*, danhmuc.name from item left join danhmuc on danhmuc.dm_id = item.dm_id where item.id=?";
    return pdo_query_one($sql, $id);
}

function get_image_by_id($id){
    $sql = "SELECT * from image_item where id=?";
    return pdo_query_one($sql, $id);
}

function get_style_by_id($id){
    $sql = "SELECT * from style where id=?";
    return pdo_query_one($sql, $id);
}

function get_size_by_id($id){
    $sql = "SELECT * from size join product on product.id_size = size.id where product.id_item = ? and product.stock !=0";
    $sql .= " order by product.id_size asc";
    return pdo_query($sql, $id);
} 

function get_color_by_id($id){
    $sql = "SELECT * from color join product on product.id_color = color.id where product.id_item = ? and product.stock !=0";
    $sql .= " order by product.id_size desc";
    return pdo_query($sql, $id);
}

function getavg($id){
    $sql = "SELECT avg(sao) as avg_sao from binhluan where id = ?";
    return pdo_query_one($sql, $id);
}

function getsize($id){
    $sql ="SELECT * from product join size on size.id = product.id_size where product.id_item = ?";
    return pdo_query($sql, $id);
}
// function getsizebycolor($id_item,$id_color){
//     $sql = "SELECT size
//             from product
//             join size on size.id = product.id_size
//             join color on color.id = product.id_color
//             where  product.id_item = ?  and product.id_color = ?";
//     return pdo_query($sql, $id_item, $id_color);
// }
function getcolor($id){
    $sql ="SELECT * from product join color on color.id = product.id_color where product.id_item = ?";
    return pdo_query($sql, $id);
}


// function get_style($id,$limi){
//     $sql = "SELECT *
//             from style
//             where id 1";
//     if ($id > 0){
//         $sql .=" AND idpro=".$id;
//     }
//     $sql .=" order by id_style desc limit".$limi;
//     return pdo_query($sql);
// }






// function hang_hoa_select_by_id($ma_hh){
//     $sql = "SELECT * FROM hang_hoa WHERE ma_hh=?";
//     return pdo_query_one($sql, $ma_hh);
// }

// function hang_hoa_exist($ma_hh){
//     $sql = "SELECT count(*) FROM hang_hoa WHERE ma_hh=?";
//     return pdo_query_value($sql, $ma_hh) > 0;
// }

// function hang_hoa_tang_so_luot_xem($ma_hh){
//     $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 WHERE ma_hh=?";
//     pdo_execute($sql, $ma_hh);
// }

// function hang_hoa_select_top10(){
//     $sql = "SELECT * FROM hang_hoa WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 10";
//     return pdo_query($sql);
// }

// function hang_hoa_select_dac_biet(){
//     $sql = "SELECT * FROM hang_hoa WHERE dac_biet=1";
//     return pdo_query($sql);
// }

// function hang_hoa_select_by_loai($ma_loai){
//     $sql = "SELECT * FROM hang_hoa WHERE ma_loai=?";
//     return pdo_query($sql, $ma_loai);
// }

// function hang_hoa_select_keyword($keyword){
//     $sql = "SELECT * FROM hang_hoa hh "
//             . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
//             . " WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
//     return pdo_query($sql, '%'.$keyword.'%', '%'.$keyword.'%');
// }

// function hang_hoa_select_page(){
//     if(!isset($_SESSION['page_no'])){
//         $_SESSION['page_no'] = 0;
//     }
//     if(!isset($_SESSION['page_count'])){
//         $row_count = pdo_query_value("SELECT count(*) FROM hang_hoa");
//         $_SESSION['page_count'] = ceil($row_count/10.0);
//     }
//     if(exist_param("page_no")){
//         $_SESSION['page_no'] = $_REQUEST['page_no'];
//     }
//     if($_SESSION['page_no'] < 0){
//         $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
//     }
//     if($_SESSION['page_no'] >= $_SESSION['page_count']){
//         $_SESSION['page_no'] = 0;
//     }
//     $sql = "SELECT * FROM hang_hoa ORDER BY ma_hh LIMIT ".$_SESSION['page_no'].", 10";
//     return pdo_query($sql);
// }