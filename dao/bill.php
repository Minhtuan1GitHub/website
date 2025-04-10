<?php
require_once 'pdo.php';

function add_bill($id_bill, $id_user, $tongtien, $sdt, $dc, $ten){
  $sql = "INSERT into bill(id_bill, id_user, tongtien, sdt, dc, ten) values (?, ?, ?, ?, ?, ?)";
  pdo_execute($sql,$id_bill, $id_user, $tongtien, $sdt, $dc, $ten);
}

function bill_by_id($id_user){
  $sql = "SELECT * from bill where id_user = ?";
  return pdo_query($sql,$id_user);
} 