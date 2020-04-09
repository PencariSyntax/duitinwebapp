<?php
include "classes/class.phpmailer.php";
$mail = new PHPMailer; 
$mail->IsSMTP();
$mail->SMTPSecure = 'ssl'; 
$mail->Host = "mail.duitindonesia.id"; //host masing2 provider email
$mail->SMTPDebug = 2;
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = "support@duitindonesia.id"; //user email
$mail->Password = "Supports100%"; //password email 
$mail->SetFrom("support@duitindonesia.id", "DUITIN Support"); //set email pengirim
$mail->Subject = "Testing"; //subyek email
$mail->AddAddress("reza.mypal@gmail.com","Reza Palupi");  //tujuan email
$mail->MsgHTML("Testing...");
if($mail->Send()) echo "Message has been sent";
else echo "Failed to sending message";
?>