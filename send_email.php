<?php
// 引入 PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // 如果您使用 Composer 安裝 PHPMailer

$mail = new PHPMailer(true);

try {
    // 設置 SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Gmail SMTP 伺服器
    $mail->SMTPAuth = true;
    $mail->Username = 'your_email@gmail.com'; // 發件人電子郵件
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // 設置發件人和收件人
    $mail->setFrom($_POST['email'], $_POST['name']);  // 使用表單中提供的電子郵件作為發件人
    $mail->addAddress('linbairenlin@gmail.com'); // 收件人的電子郵件

    // 設置郵件內容
    $mail->isHTML(true);
    $mail->Subject = '新的聯繫表單提交';
    $mail->Body    = "姓名: {$_POST['name']}<br>電子郵件: {$_POST['email']}<br>留言: {$_POST['message']}";

    // 發送郵件
    $mail->send();
    echo '郵件已發送';
} catch (Exception $e) {
    echo "郵件發送失敗. Mailer Error: {$mail->ErrorInfo}";
}
?>
