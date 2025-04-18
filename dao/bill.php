<?php
require_once 'pdo.php';

function add_bill($id_bill, $id_user, $tongtien, $sdt, $dc, $ten, $dateCreate){
  $sql = "INSERT into bill(id_bill, id_user, tongtien, sdt, dc, ten, ngaytao) values (?, ?, ?, ?, ?, ?, ?)";
  pdo_execute($sql,$id_bill, $id_user, $tongtien, $sdt, $dc, $ten, $dateCreate);
}

function add_bill_detail($id_bill, $ten, $soluong){
  $sql = "INSERT INTO bill_details(id_bill, id_item, soluong) values (?,?,?)";
  pdo_execute($sql, $id_bill, $ten, $soluong);
}

function bill_by_id($id_user){
  $sql = "SELECT distinct  bill.*, chitietbill.*
          from bill 
          join chitietbill
          on bill.thanhtoan = chitietbill.id
          where bill.id_user = ?";
  return pdo_query($sql,$id_user);
} 

function getchitiet($id_bill){
  $sql = "SELECT DISTINCT
            bill_details.id_item,
            bill_details.id_bill,
            item.img,
            bill_details.soluong , 
            item.name_item , 
            product.price

          FROM bill_details
          JOIN item ON bill_details.id_item = item.id
          JOIN product ON product.id_item = item.id
          JOIN bill ON bill.id_bill = bill_details.id_bill
          WHERE bill.id_bill = ?";
  return pdo_query($sql, $id_bill);
}