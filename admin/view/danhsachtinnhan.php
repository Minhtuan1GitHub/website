<?php
  $html_danhsachtinnhan = '';
  foreach ($allTinNhan as $tn) {
    extract($tn);
    if ($id_user == $_SESSION['session_user']['id_user']) {
      // User's message (on the right)
      $html_danhsachtinnhan .= '
        <div class="chat-bubble customer">
          <span class="timestamp">'.$tn['created_at'].'</span>
          <span class="content">'.$tn['content'].'</span>
        </div>
      ';
    } else {
      // Admin's message (on the left)
      $html_danhsachtinnhan .= '
        <div class="chat-bubble admin">
          <span class="timestamp">'.$tn['created_at'].'</span>
          <span class="content">'.$tn['content'].'</span>
        </div>
      ';
    }
  }
  if ($id_user == $_SESSION['session_user']['id_user']){
    if ($trangthai == 1){
      $html_danhsachtinnhan .= '
        <div class="d-flex" style="flex-direction: row; gap: 2px; justify-content: end">
          <i class="bi bi-eye" style="font-size: 14px"></i>
          <span class="timestamp">Đã xem</span>
        </div>
      ';
    }else{
      $html_danhsachtinnhan .= '
        <div class="d-flex" style="flex-direction: row; gap: 2px; justify-content: end">
          <i class="bi bi-check-all" style="font-size: 14px"></i>
          <span class="timestamp">Đã nhận</span>
        </div>
      ';
    }
  }
?>

<div class="chat-container">
  <div class="container-chat">
    <?=$html_danhsachtinnhan;?>
  </div>
  <form action="index.php?page=replytinnhan" method="post" class="chat-form">
    <div class="input-group">
      <input 
        type="text" 
        name="content" 
        class="form-control" 
        placeholder="Nhập tin nhắn..." 
        required 
        maxlength="255"
      >
      <input type="hidden" name="id_nguoigui" value="<?= htmlspecialchars($id_customer) ?>">
      <button type="submit" name="reply" class="btn btn-primary">
        <i class="bi bi-send text-white"></i>
      </button>
    </div>
  </form>
</div>

<style>
  /* Chat Container */
  .chat-container {
    width: 100%;
    max-width: 900px;
    margin: 30px auto;
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    border: 1px solid #e0e0e0;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow: hidden;
  }

  /* Chat Messages Container */
  .container-chat {
    max-height: 500px;
    overflow-y: auto;
    padding: 20px;
    background-color: #f8f9fa;
    display: flex;
    flex-direction: column;
    gap: 15px;
  }

  .container-chat::-webkit-scrollbar {
    width: 8px;
  }

  .container-chat::-webkit-scrollbar-thumb {
    background-color: #adb5bd;
    border-radius: 10px;
  }

  .container-chat::-webkit-scrollbar-track {
    background: #f1f1f1;
  }

  /* Chat Bubbles */
  .chat-bubble {
    max-width: 75%;
    padding: 10px 15px;
    border-radius: 10px;
    font-size: 1rem;
    word-wrap: break-word;
    position: relative;
  }

  /* Customer Messages */
  .chat-bubble.customer {
    background-color: #d1ecf1;
    border: 1px solid #bee5eb;
    align-self: flex-end;
    text-align: right;
  }

  /* Admin Messages */
  .chat-bubble.admin {
    background-color: #fff3cd;
    border: 1px solid #ffeeba;
    align-self: flex-start;
    text-align: left;
  }

  /* Timestamp */
  .chat-bubble .timestamp {
    font-size: 0.8rem;
    color: #6c757d;
    display: block;
    margin-bottom: 5px;
  }

  .chat-bubble .content {
    color: #343a40;
  }

  /* Chat Form */
  .chat-form {
    padding: 10px 20px;
    background-color: #ffffff;
    border-top: 1px solid #e0e0e0;
  }

  .chat-form .input-group {
    display: flex;
    align-items: center;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  }

  .chat-form input {
    border-radius: 0;
    flex: 1;
  }

  .chat-form button {
    border-radius: 0;
    margin-left: 10px;
  }

  .chat-form button:hover {
    background-color: #0056b3;
    color: white;
  }
</style>