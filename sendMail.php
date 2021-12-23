<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php'; 

    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';
    $mail->sIsHTML(true);


    $mail->setFrom('pltnv.sonya@gmail.com', 'Плетньова Софія ТР-03');
    $mail->addAddress('pltnv.sonya@gmail.com');
    $mail->Subject = 'Лабораторна робота №7';

    $body = '<h1>Form:</h1>';

    if(trim(!empty($_POST['name']))){
        $body.='<p><strong>Name:</strong> '.$_POST['name'].'</p>';
    }

    $mail->Body = $body;

    if(!$mail->send()){
        $message = "error";
    } else{
        $message = "yes";
    }

    $response = ['message' => $message];

    header('Content-type: application/json');
    echo json_encode($response);

?>