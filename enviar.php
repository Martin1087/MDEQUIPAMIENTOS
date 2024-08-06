<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Formulario</title> <!-- Aquí va el título de la página -->

</head>

<body>
<?php

$Nombre = $_POST['Nombre'];
$Correo = $_POST['Correo'];
$Pais = $_POST['Pais'];
$Ciudad = $_POST['Ciudad'];
$Empresa = $_POST['Empresa'];
$Telefono = $_POST['Telefono'];
$Consulta = $_POST['Consulta'];

if ($Nombre=='' || $Correo=='' || $Ciudad=='' || $Telefono=='' || $Consulta==''){

echo "<script>alert('Los campos marcados con * son obligatorios');location.href ='javascript:history.back()';</script>";

}else{
    require("includes/class.phpmailer.php");
    require("includes/class.smtp.php");

    // Datos de la cuenta de correo utilizada para enviar vía SMTP
    $smtpHost = "c2241011.ferozo.com";  // Dominio alternativo brindado en el email de alta 
    $smtpUsuario = "noreply@mdequipamientos.com.ar";  // Mi cuenta de correo
    $smtpClave = "F0rm5g4mde";  // Mi contraseña

    // Email donde se enviaran los datos cargados en el formulario de contacto
    $emailDestino = "info@mdequipamientos.com.ar";

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Port = 465; 
    $mail->SMTPSecure = 'ssl';
    $mail->IsHTML(true); 
    $mail->CharSet = "utf-8";
   
    $mail->Host = $smtpHost; 
    $mail->Username = $smtpUsuario; 
    $mail->Password = $smtpClave;

    $mail->From = $Correo; // Email desde donde envío el correo.
    $mail->FromName = $Nombre;
    $mail->AddAddress($emailDestino); // Esta es la dirección a donde enviamos los datos del formulario

    $mail->Subject  =  "Contacto desde la pagina web";
    $mail->Body     =  "Nombre: $Nombre \n<br />".
    "Empresa: $Empresa \n<br />".
    "Email: $Correo \n<br />".
    "Tel: $Telefono \n<br />".
    "Pais: $Pais \n<br />".
    "Ciudad: $Ciudad \n<br />".
    "Consulta: $Consulta \n<br />";

    if ($mail->Send())
    echo "<script>location.href ='bodassillones.htm';</script>";
    else
    echo "<script>alert('Error al enviar el formulario');location.href ='javascript:history.back()';</script>";

}

?>
</body>
</html>