<?php     
$to_email = 'slim187@outlook.fr';
$subject = 'Testing PHP Mail';
$message = 'This mail is sent using the PHP mail function';
$headers = 'From: norepl@company.com';
mail($to_email,$subject,$message,$headers);
?>
Outpu