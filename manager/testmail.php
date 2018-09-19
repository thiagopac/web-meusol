<?php

$to = "thiagopac@gmail.com\r\n";
$subject = "[ Meu Sol - Fazenda Solar ] - Teste de e-mail";
$message = "Teste de e-mail. Clique no link para ir para o site: <p><a href='http://meusol.net'>http://meusol.net</a></p>";
$headers = "From: contato@meusol.net\r\n";
$headers .= "Reply-To: contato@meusol.net\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

mail($to, $subject, $message, $headers);

?>
