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
    $mail = new PHPMailer();

    $mail->From     = ("noreply@mdequipamientos.com.ar"); //Dirección desde la que se enviarán los mensajes. Debe ser la misma de los datos de el servidor SMTP.
    $mail->FromName = $Nombre;
    $mail->From = $Correo;
    $mail->AddAddress("info@mdequipamientos.com.ar"); // Dirección a la que llegaran los mensajes.

// Aquí van los datos que apareceran en el correo que reciba

    $mail->WordWrap = 50; 
    $mail->IsHTML(true);     
    $mail->Subject  =  "Contacto desde la pagina web";
    $mail->Body     =  "Nombre: $Nombre \n<br />".
    "Empresa: $Empresa \n<br />".
    "Email: $Correo \n<br />".
    "Tel: $Telefono \n<br />".
    "Pais: $Pais \n<br />".
    "Ciudad: $Ciudad \n<br />".
    "Consulta: $Consulta \n<br />";

// Datos del servidor SMTP

    $mail->IsSMTP(); 
    $mail->Host = "c2241011.ferozo.com";  // Servidor de Salida.
    $mail->SMTPAuth = true; 
    $mail->Username = "noreply@mdequipamientos.com.ar";  // Correo Electrónico
    $mail->Password = "F0rm5g4mde"; // Contraseña
    $mail->Port = 465;

    if ($mail->Send())
    echo "<script>location.href ='bodassillones.htm';</script>";
    else
    echo "<script>alert('Error al enviar el formulario');location.href ='javascript:history.back()';</script>";

}

?>
</body>
</html>