<?php

require_once 'PHPMailer/PHPMailer.php';
require_once 'PHPMailer/SMTP.php';
require_once 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$_POST = array_map('trim', $_POST);


if (!isset($_POST['name'])|| !empty($_POST['name'])) return;
if (!isset($_POST['fname']) || empty($_POST['fname'])) return ;
if (!isset($_POST['tnum']) || empty($_POST['tnum'])) return ;
if (!isset($_POST['message']) || empty($_POST['message'])) return ;
if (!isset($_POST['email']) || empty($_POST['email']) || !PHPMailer::ValidateAddress($_POST['email'])) return ;	
if (!isset($_POST['check']) || empty($_POST['check']) || (int) $_POST['check'] !== ((int) $_POST['sum'][0] * (int) $_POST['sum'][1])) return ;


$fname= $_POST['fname'];
$lname= $_POST['lname'];
$tnum= $_POST['tnum'];
$message= $_POST['message'];
$email= $_POST['email'];

$text=$fname.' '.$lname."\n\r numer telefonu: ".$tnum."\n\r adres email: ".$email."\n\r treść wiadomości: \n\r".$message;



$mail = new PHPMailer();
	
	$mail->isSMTP();
	$mail->CharSet = 'UTF-8';  
	$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
	);	
	$mail->Host = 'smtp.poczta.onet.pl'; 
	$mail->Port = 587; 
	$mail->SMTPSecure = 'tls'; 
    $mail->SMTPAuth = true;                               
    $mail->Username = 'test.test.test5@onet.pl';                 
    $mail->Password = '';                                              
	$mail->setFrom('test.test.test5@onet.pl', 'srutututu');
	$mail->AddAddress('test.test.test5@onet.pl');
	$mail->Subject = 'srutututu';
	$mail->Body = $text;

 if (!$mail->Send()) {
     return;
 }


 exit('ok');