<?php
echo json_encode('im here'); exit();

header('Content-Type: text/html; charset=UTF-8');
require_once('libs/class.phpmailer.php');
require_once('libs/class.smtp.php');

$mail = new PHPMailer(true);

$mail->IsSMTP(); // Define que a mensagem será SMTP

try { 
    // $mail->SMTPDebug = 2;
    // $mail->CharSet = 'UTF-8';
    // $mail->Encoding = 'base64';

    $mail->Host = 'smtp.umbler.com'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
    $mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
    $mail->Port       = 587; //  Usar 587 porta SMTP
    $mail->SMTPSecure = 'ssl';
    $mail->Username = 'site@eduardoaf.dev'; // Usuário do servidor SMTP (endereço de email)
    $mail->Password = 'Con*102030'; // Senha do servidor SMTP (senha do email usado)

    //Define o remetente
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
    $mail->SetFrom('site@eduardoaf.dev','Site'); //Seu e-mail
    $mail->AddReplyTo($email, $nome); //Seu e-mail
    $mail->Subject = 'Um novo contato via site';//Assunto do e-mail


    //Define os destinatário(s)
    //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->AddAddress($email);

    //Campos abaixo são opcionais 
    //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    //$mail->AddCC('destinarario@dominio.com.br', 'Destinatario'); // Copia
    //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
    //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo


    //Define o corpo do email
    $body = file_get_contents('email.html');
    
    $mail->MsgHTML($body); 

    ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
    //$mail->MsgHTML(file_get_contents('arquivo.html'));

    if($mail->Send()){
        $response = 1;
    }else{
        $response = 0;
    }
}catch (phpmailerException $e) {
    echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
}

echo json_encode($response);