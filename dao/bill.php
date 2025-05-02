<?php
require_once 'pdo.php';

function add_bill($id_bill, $id_user, $tongtien, $sdt, $dc, $ten, $dateCreate, $voucher, $tienbandau, $trangthaithanhtoan){
  $sql = "INSERT into bill(id_bill, id_user, tongtien, sdt, dc, ten, ngaytao, voucher, tienbandau, trangthaithanhtoan) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  pdo_execute($sql,$id_bill, $id_user, $tongtien, $sdt, $dc, $ten, $dateCreate,$voucher, $tienbandau, $trangthaithanhtoan);
}

function add_bill_detail($id_bill, $ten, $soluong, $tien, $size, $color){
  $sql = "INSERT INTO bill_details(id_bill, id_item, soluong, tien, size, color) values (?,?,?,?,?,?)";
  pdo_execute($sql, $id_bill, $ten, $soluong, $tien,$size, $color);
}

function bill_by_id($id_user){
  $sql = "SELECT distinct  bill.*, chitietbill.*, thanhtoan.name, thanhtoan.mau
          from bill 
          join chitietbill on bill.thanhtoan = chitietbill.id
          join thanhtoan on thanhtoan.id = bill.trangthaithanhtoan
          where bill.id_user = ?";
  return pdo_query($sql,$id_user);
} 

function getchitiet($id_bill){
  $sql = "select item.img, item.name_item, bill_details.soluong, bill.tienbandau, bill_details.size, bill_details.color, product.price, voucher.voucher_giam, bill.voucher, bill.tongtien
  from bill_details
  join item on item.id = bill_details.id_item
  join bill on bill.id_bill = bill_details.id_bill
  join product on product.id_item = item.id and product.id_size = bill_details.size and product.id_color = bill_details.color
  join voucher on voucher.id_voucher = bill.voucher
  where bill_details.id_bill = ?";
  return pdo_query($sql, $id_bill);
}

function tongdonhang(){
  $sql = "SELECT count(id_bill) as total from bill";
  return pdo_query_one($sql);
}

function donhangthanhcong(){
  $sql = "SELECT count(id_bill) as total 
          from bill
          join chitietbill on chitietbill.id = bill.thanhtoan
          where bill.thanhtoan = 6";
  return pdo_query_one($sql);
}
function donhangdangxuli(){
  $sql = "SELECT count(id_bill) as total 
          from bill
          join chitietbill on chitietbill.id = bill.thanhtoan
          where bill.thanhtoan in (0,1,2,3,4,5)";
  return pdo_query_one($sql);
}
function donhangbihuy(){
  $sql = "SELECT count(id_bill) as total 
          from bill
          join chitietbill on chitietbill.id = bill.thanhtoan
          where bill.thanhtoan = 7";
  return pdo_query_one($sql);
}

function tatcadonhang($ngaybatdau, $ngayketthuc, $chontrangthai){
  $sql = "SELECT bill.id_bill, bill.ten, bill.ngaytao, bill.tongtien, chitietbill.trangthai, bill.thanhtoan, chitietbill.color, chitietbill.background, bill.trangthaithanhtoan, thanhtoan.name, thanhtoan.mau
          from bill
          join chitietbill on chitietbill.id = bill.thanhtoan
          join thanhtoan on thanhtoan.id = bill.trangthaithanhtoan
          where 1";
  if (!empty($ngaybatdau) && !empty($ngayketthuc)){
    $sql .= " AND bill.ngaytao between '$ngaybatdau' and '$ngayketthuc'";
  }
  if ($chontrangthai !== '' && is_numeric($chontrangthai)) {
    $sql .= " AND bill.thanhtoan = $chontrangthai";
  }
  
  return pdo_query($sql);
}

function trangthai(){
  $sql = "SELECT * from chitietbill";
  return pdo_query($sql);
}

function updateorder($id_bill, $ten, $sdt, $dc){
  $sql = "UPDATE bill set ten = ?, sdt = ?, dc = ? where id_bill = ?";
  pdo_execute($sql, $ten, $sdt, $dc, $id_bill);
}

function updatetrangthai($id_bill, $trangthai){
  $sql = "UPDATE bill set thanhtoan = ? where id_bill = ?";
  pdo_execute($sql, $trangthai, $id_bill);
}

function thanhtoan(){
  $sql = "SELECT * from thanhtoan";
  return pdo_query($sql);
}

function tongTienTheoThang($year){
  $sql = "SELECT month(ngaytao) as thang, sum(tongtien) as tongtien, year(ngaytao) as nam
          from bill
          where year(ngaytao) = ?
          group by year(ngaytao), month(ngaytao)
          order by nam,thang";
  return pdo_query($sql, $year);
}

function tongDoanhThu($year){
  $sql = "SELECT sum(tongtien) as tongtien from bill where year(ngaytao) = ?";
  $result = pdo_query_one($sql, $year);
  return $result['tongtien'];
}

function tondDonHang($year){
  $sql = "SELECT count(id_bill) as total from bill where year(ngaytao) = ?";
  $result = pdo_query_one($sql, $year);
  return $result['total'];
}

function selectYear(){
  $sql = "SELECT distinct year(ngaytao) as nam from bill";
  return pdo_query($sql);
}

function daThanhToan($id_bill){
  $sql = "UPDATE bill set trangthaithanhtoan = 1 where id_bill = ?";
  pdo_execute($sql, $id_bill);
}


// function hang_hoa_update($ma_hh, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta){
//     $sql = "UPDATE hang_hoa SET ten_hh=?,don_gia=?,giam_gia=?,hinh=?,ma_loai=?,dac_biet=?,so_luot_xem=?,ngay_nhap=?,mo_ta=? WHERE ma_hh=?";
//     pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet==1, $so_luot_xem, $ngay_nhap, $mo_ta, $ma_hh);
// }
