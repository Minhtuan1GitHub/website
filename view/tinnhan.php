<?php
$html_tinnhan = '';
foreach ($allMessage as $eachMessage) {
    extract($eachMessage);

    // Check if the message is from the user or admin
    if ($id_user != $_SESSION['session_user']['id_user']) {
        // User's message (on the left)
        $html_tinnhan .= '
        <div class="chat-bubble customer">
            <div class="timestamp">
                ' . $created_at . '
            </div>
            <div>
                ' . $content . '
            </div>
        </div>
        ';
    } else {
        // Admin's message (on the right)
        $html_tinnhan .= '
        <div class="chat-bubble admin">
            <div class="timestamp">
                ' . $created_at . '
            </div>
            <div>
                ' . $content . '
            </div>
        </div>
        ';
    }
}
if ($id_user == $_SESSION['session_user']['id_user']){
  if ($trangthai == 1){
    $html_tinnhan .= '
      <div class="d-flex" style="flex-direction: row; gap: 2px; justify-content: end">
        <i class="bi bi-eye" style="font-size: 14px"></i>
        <span class="timestamp">Đã xem</span>
      </div>
    ';
  }else{
    $html_tinnhan .= '
      <div class="d-flex" style="flex-direction: row; gap: 2px; justify-content: end">
        <i class="bi bi-check-all" style="font-size: 14px"></i>
        <span class="timestamp">Đã nhận</span>
      </div>
    ';
  }
}

  $html_breadcrumb = '';
  $html_breadcrumb .='<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Trao đổi</li>
                      ';
                      if ($titlePage!=""){
                        $html_breadcrumb .='<li class="breadcrumb-item active" aria-current="page">'.$name.'</li>
                                          ';
                      }
?>

<nav class="container" aria-label="breadcrumb" style=" margin-top: 100px; z-index: 1030;">
  <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
    <?=$html_breadcrumb;?> 
  </ol>
</nav>

<style>
  .chat-container {
    max-width: 700px;
    margin: 50px auto;
    background: #ffffff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    border: 1px solid #e0e0e0;
  }

  .chat-container h4 {
    font-weight: bold;
    color: #333333;
    font-size: 24px;
  }

  .timestamp {
    font-size: 12px;
    color: #adb5bd;
    display: block;
    margin-bottom: 5px;
  }

  /* Chat bubbles styling */
  .chat-bubble {
    padding: 15px 20px;
    border-radius: 20px;
    margin-bottom: 10px;
    max-width: 75%;
    word-wrap: break-word;
    font-size: 14px;
    position: relative;
  }

  .chat-bubble::after {
    content: '';
    position: absolute;
    border-style: solid;
    display: block;
    width: 0;
  }

  .chat-bubble.customer {
    background-color: #e0f7fa;
    align-self: flex-start;
    border: 1px solid #b2ebf2;
  }

  .chat-bubble.customer::after {
    border-width: 10px 10px 0 0;
    border-color: #e0f7fa transparent transparent transparent;
    bottom: -10px;
    left: 20px;
  }

  .chat-bubble.admin {
    background-color: #ffecb3;
    align-self: flex-end;
    border: 1px solid #ffe082;
  }

  .chat-bubble.admin::after {
    border-width: 10px 0 0 10px;
    border-color: #ffecb3 transparent transparent transparent;
    bottom: -10px;
    right: 20px;
  }

  /* Chat messages wrapper */
  .chat-messages {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-bottom: 20px;
    height: 400px;
    overflow-y: auto;
    padding-right: 10px;
    scrollbar-width: thin;
    scrollbar-color: #adb5bd #f1f1f1;
  }

  .chat-messages::-webkit-scrollbar {
    width: 8px;
  }

  .chat-messages::-webkit-scrollbar-thumb {
    background-color: #adb5bd;
    border-radius: 10px;
  }

  .chat-messages::-webkit-scrollbar-track {
    background: #f1f1f1;
  }

  /* Input field and button styling */
  .chat-input-container {
    display: flex;
    gap: 10px;
  }

  .chat-input-container input {
    flex-grow: 1;
    border: 1px solid #ced4da;
    border-radius: 20px;
    padding: 10px 15px;
    font-size: 14px;
  }

  .chat-input-container button {
    padding: 10px 20px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: bold;
  }

  .chat-input-container button:hover {
    background-color: #0056b3;
    color: #ffffff;
  }
  a{
    text-decoration: none;
  }

</style>

<div class="chat-container">
  <h4 class="text-center mb-4">Trao đổi</h4>
  <div class="chat-messages">
    <!-- Chat bubbles -->
    <?=$html_tinnhan;?>
  </div>

  <!-- Chat input -->
  <form action="index.php?page=tinnhan" method="post" id="messageForm">
  <div class="chat-input-container">
    <input type="hidden" value="<?= htmlspecialchars($_SESSION['session_user']['id_user']) ?>" name="id_user">
    <input type="text" class="form-control" placeholder="Nhập tin nhắn..." name="content" id="contentInput">
    <button class="btn btn-primary" name="tinnhan" type="submit">
      <i class="bi bi-send-fill text-white"></i>
    </button>
  </div>
</form>


</div>

<script>
   // Get the form element
   const form = document.getElementById('messageForm');
  const contentInput = document.getElementById('contentInput');

  // Add an event listener for form submission
  form.addEventListener('submit', function(event) {
    // Trim the content to check for empty or whitespace-only input
    const content = contentInput.value.trim();

    if (content === '') {
      // Prevent form submission
      event.preventDefault();

      // Optionally display an alert or message
      alert('Tin nhắn không được để trống!');
    }
  });

</script>
