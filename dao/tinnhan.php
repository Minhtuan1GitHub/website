<?php
require_once 'pdo.php';

  function message_insert($id_user, $message, $dateCreate, $admin){
      $sql = "INSERT INTO tinnhan(id_user, content, created_at, admin) VALUES (?, ?, ?, ?)";
      pdo_execute($sql, $id_user, $message, $dateCreate, $admin);
  }
  function message_select_by_id($id_user, $id_admin){
      $sql = "SELECT *
      FROM tinnhan
      WHERE (id_user = ? AND admin = 83) 
         OR (id_user = 83 AND admin = ?)
      ORDER BY created_at ASC;";
      return pdo_query($sql, $id_user, $id_admin);
  }

  function allmess() {
    $sql = "SELECT 
        t1.id AS message_id,
        t1.id_user,
        t1.content,
        t1.created_at,
        user.ten AS user_name,
        user.email
    FROM tinnhan t1
    JOIN user ON user.id_user = t1.id_user
    JOIN (
        SELECT id_user, MAX(created_at) AS latest_created_at
        FROM tinnhan
        WHERE id_user != 83 -- Loại bỏ tin nhắn của admin
        GROUP BY id_user
    ) t2 ON t1.id_user = t2.id_user AND t1.created_at = t2.latest_created_at
    WHERE t1.id_user != 83 -- Loại bỏ tin nhắn của admin trong kết quả chính
    ORDER BY t1.created_at DESC"; // Sắp xếp theo thời gian mới nhất
    return pdo_query($sql);
}

  function dadoc($id_user){
    $sql = "UPDATE tinnhan SET trangthai = 1 WHERE id_user = ?";
    pdo_execute($sql, $id_user);
  }
?>
