<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$second_name = $_POST['user_second_name'];
$IIN = $_POST ['user_IIN'];
$email = $_POST ['user_email'];


//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'shardara.daryn@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'aAfT3rINr3p^'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('shardara.daryn@mail.ru'); // от кого будет уходить письмо?
$mail->addAddress('shardara.daryn@mail.ru');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment($_FILES['upload']['tmp_name'], $_FILES['upload']['name']);
$mail->addAttachment($_FILES['upload2']['tmp_name'], $_FILES['upload2']['name']);
$mail->addAttachment($_FILES['upload3']['tmp_name'], $_FILES['upload3']['name']);
$mail->addAttachment($_FILES['upload4']['tmp_name'], $_FILES['upload4']['name']);      // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка с тестового сайта';
$mail->Body    = ' Үміткердің есімі: ' .$name . ' <br> Үміткердің тегі: ' .$second_name. '<br> Үміткердің ЖСН-і: ' .$IIN. '<br> Электронды почтасы:' .$email. '<br> телефон номері: '.$phone;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: thank-you.html');
}
?>


