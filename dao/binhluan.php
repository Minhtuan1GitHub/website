<?php
require_once 'pdo.php';

function binhluan_insert($id_user, $id, $noidung, $size, $color, $sao, $nickname, $date, $ten, $age, $diachi){
  $sql = "INSERT INTO binhluan(id_user, id, noidung, size, color, sao, nickname, date, ten, age, diachi) values (?,?,?,?,?,?,?,?,?,?,?)";
  pdo_execute($sql, $id_user, $id, $noidung, $size, $color, $sao, $nickname, $date, $ten, $age, $diachi);
} 

function binhluan_all($id, $limi){
  $sql = "SELECT binhluan.*, item.name_item, danhmuc.name, danhmuc.dm_id 
          from binhluan 
          join item on item.id = binhluan.id 
          join danhmuc on danhmuc.dm_id = item.dm_id 
          where binhluan.id = ? and binhluan.view = 1";
  $sql .= " order by id_binhluan desc limit ".$limi;
  return pdo_query($sql, $id);
}

function binhluan_count($id){
  $sql = "SELECT count(id_binhluan) as count_binhluan from binhluan where id = ?";
  $result = pdo_query($sql, $id);
  return $result[0]['count_binhluan'];
  // return pdo_query($sql, $id);
}

// function huuich($id_user, $id, $noidung){
//   $sql = "UPDATE binhluan SET huuich = huuich + 1 WHERE id_user = ? and id = ? and noidung = ?";
//   pdo_execute($sql, $id_user, $id, $noidung);
// }

