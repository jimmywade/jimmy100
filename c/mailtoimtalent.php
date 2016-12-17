<?php
/*
$data = json_decode(file_get_contents("php://input"));
$idPersona=$data->persona;
$tituloMail=$data->titulo;
$mensajeMail=$data->mensaje;
*/


$idPersona=3;
$tituloMail='hola';
$mensajeMail='eudes maria';

require_once 'mailto.php';

$objPersona = new correo();
//$objPersona -> remitente($idPersona);

$objPersona -> mailPersona($idPersona,$tituloMail,$mensajeMail);

echo '<h2> ------------------------------------------------------------------------ </h2>';
echo '<h2>'.$idPersona.'</h2>';
echo '<h2>'.$esteRemitente.'</h2>';
echo '<h2>'.$esteNombre.'</h2>';
echo '<h2>'.$tituloMail.'</h2>';
echo '<h2>'.$mensajeMail.'</h2>';



?>