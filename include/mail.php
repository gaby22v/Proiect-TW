<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$call = $_POST['call'];
$website = $_POST['website'];
$priority = $_POST['priority'];
$type = $_POST['type'];
$message = $_POST['message'];
$formcontent=" De la: $name \n Telefon: $phone \n Call Back: $call \n Website: $website \n Prioritate: $priority \n Tip: $type \n Mesaj: $message";
$recipient = "patrascugabriel@hotmail.com";
$subject = "Contact";
$mailheader = "De la: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Va multumim!" . " -" . "<a href='contact.html' style='text-decoration:none;color:#ff0099;'>Inapoi</a>";
?>
