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

function sendmail1($email, $ten, $sodienthoai, $diachi, $madonhang, $tongtien){
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
      $mail->addCC('nguyenminhtuan061205@gmail.com'); //email nguoi ban
      $mail->addAddress($email); //email nguoi mua
      $mail->isHTML(true);  // Set email format to HTML
      $mail->Subject = 'Đơn đặt hàng';
      $noidungthu = "
                            <h2>Xác nhận đơn hàng</h2>
                            <p>Xin chào Tumi,</p>
                            <p>Cảm ơn bạn đã đặt hàng tại Tumi. Dưới đây là thông tin đơn hàng của bạn:</p>
                            <ul>
                                <li><strong>Mã đơn hàng:</strong> " . htmlspecialchars($madonhang) . "</li>
                                <li><strong>Tổng tiền:</strong> $" . number_format($tongtien, 2) . "</li>
                                <li><strong>Tên người đặt:</strong> " . htmlspecialchars($ten)  . "</li>                                
                                <li><strong>Địa chỉ giao hàng:</strong> " . htmlspecialchars($diachi) . "</li>
                                <li><strong>Số điện thoại:</strong> " . htmlspecialchars($sodienthoai) . "</li>
                            </ul>
                            <p>Chúng tôi sẽ xử lý đơn hàng của bạn sớm nhất có thể.</p>
                            <p>Trân trọng,<br>Tumi</p>

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

function sendmail2($email ,$ten, $sodienthoai, $diachi, $madonhang, $tongtien){
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
        $mail->addCC('nguyenminhtuan061205@gmail.com'); //email nguoi ban
        $mail->addAddress($email); //email nguoi mua
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Đơn đặt hàng';
        $noidungthu = "
                              <h2>Yêu cầu hoàn tiền</h2>
                              <p>Xin chào Tumi,</p>
                              <p>Cảm ơn bạn đã đặt hàng tại Tumi. Dưới đây là thông tin đơn hàng của bạn:</p>
                              <ul>
                                  <li><strong>Mã đơn hàng:</strong> " . htmlspecialchars($madonhang) . "</li>
                                  <li><strong>Tổng tiền:</strong> $" . number_format($tongtien, 2) . "</li>
                                  <li><strong>Tên người đặt:</strong> " . htmlspecialchars($ten)  . "</li>                                
                                  <li><strong>Địa chỉ giao hàng:</strong> " . htmlspecialchars($diachi) . "</li>
                                  <li><strong>Số điện thoại:</strong> " . htmlspecialchars($sodienthoai) . "</li>
                              </ul>
                              <p>Chúng tôi sẽ xử lý đơn hàng của bạn sớm nhất có thể.</p>
                              <p>Trân trọng,<br>Tumi</p>
  
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