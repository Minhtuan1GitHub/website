<?php 

function sendmail($email, $matkhaumoi){
  //thu vien giup gui mail
  require "PHPMailer-master/src/PHPMailer.php"; 
  require "PHPMailer-master/src/SMTP.php"; 
  require 'PHPMailer-master/src/Exception.php'; 
  $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
  try {
      $mail->SMTPDebug = 0; //0,1,2: chế độ debug
      $mail->isSMTP();  
      $mail->CharSet  = "utf-8";
      $mail->Host = 'smtp.gmail.com';  //SMTP servers
      $mail->SMTPAuth = true; // Enable authentication
      $mail->Username = 'minhtuank27tdtu@gmail.com'; // SMTP username
      $mail->Password = 'biwtdolfhigdnvam';   // SMTP password
      $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
      $mail->Port = 465;  // port to connect to                
      $mail->setFrom('minhtuank27tdtu@gmail.com', 'Tumi' ); 
      $mail->addAddress($email); 
      $mail->isHTML(true);  // Set email format to HTML
      $mail->Subject = 'Gửi lại mật khẩu';
      $noidungthu = "<p>Bạn nhận thư này do bạn hoặc người khác yêu cầu <p>
                    Mật khẩu của bạn là: {$matkhaumoi} 
      "; 
      $mail->Body = $noidungthu;
      $mail->smtpConnect( array(
          "ssl" => array(
              "verify_peer" => false,
              "verify_peer_name" => false,
              "allow_self_signed" => true
          )
      ));
      $mail->send();
      return true;
      // echo 'Đã gửi mail xong';
  } catch (Exception $e) {
      echo 'Error: ', $mail->ErrorInfo;
  }
}
?>