<?php

include_once './inclusoes/cabecalho.php';

$recmail=$_POST['email'];

echo
'<fieldset class="janela_modal1" id="janela_modal" >
  <span class="modal1">';

echo 'Mensagem de reset de senha enviada para '.$recmail;

echo '<br>Aguarde estamos lhe direcionando para a tela de login';

echo   '</span>
</fieldset>';

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
	$mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'projetooctosbr@gmail.com';
	$mail->Password = 'batatafeijao';
	$mail->Port = 587;

	$mail->setFrom('projetooctosbr@gmail.com');
	$mail->addAddress('projetooctosbr@gmail.com');
	$mail->addAddress('digo.marins@hotmail.com');

	$mail->isHTML(true);
	$mail->Subject = 'Teste de email via gmail Canal TI';
	$mail->Body = 'Chegou o email teste do <strong>Canal TI</strong>';
	$mail->AltBody = 'Chegou o email teste do Canal TI';

	if($mail->send()) {
		echo 'Email enviado com sucesso';
	} else {
		echo 'Email nao enviado';
	}
} catch (Exception $e) {
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}






header("refresh:10,url=login.php");

?>