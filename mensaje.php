<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>FACTURADOR WEB - D'BANDERA - Sistema Comercial</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
 <div style="margin:0px auto; text-align: center; width:100%;">
 	FACTURADOR WEB - D'BANDERA - Sistema Comercial
 </div>

 <div id="content" style="margin:0px auto; text-align: center; width:60%;">
 	<table>
 		<thead>
 			<tr>
 				<th colspan="2">RESPUESTA DE PSE y SUNAT</th>
 			</tr>
 		</thead>
 		<tbody>
 			<tr>
 				<td colspan="2"> 
 						<div style="background-color: #D80000; border: 1px solid #000; padding: 15px; color: #FFFFFF; font-weight: bolder;" >
 							<?php

 								switch ($_GET["iderror"]) {
 									case '10':
 										$mens = "No se pudo autenticar, token incorrecto o eliminado";
 										break;
 									case '11':
 										$mens = "La ruta o URL que estás usando no es correcta o no existe. Ingresa a tu cuenta en www.nubefact.com en la opción Api-Integración para verificar este dato";
 										break;
 									case '12':
 										$mens = "Solicitud incorrecta, la cabecera (Header) no contiene un Content-Type correcto";
 										break;
 									case '20':
 										$mens = "El archivo enviado no cumple con el formato establecido";
 										break;
 									case '21':
 										$mens = "No se pudo completar la operación, se acompaña el problema con un mensaje";
 										break; 
 									case '22':
 										$mens = "Documento enviado fuera del plazo permitido";
 										break; 																													 														
 									case '23':
 										$mens = "Este documento ya existe en NubeFacT";
 										break;
 									case '24':
 										$mens = "El documento indicado no existe o no fue enviado a NubeFacT";
 										break;  																				
 									default:
 										$mens = "Error interno desconocido";
 										break;
 								}



 								echo "ERROR: ".$mens;
 							?>
 						</div>
				</td>
 			</tr>
 		</tbody>
 	</table>
 </div>
<br>
<div id="content" style="margin:0px auto; text-align: center; width:100%;">
	<a href="index.php" title="">Regresa</a>
</div>



	
</body>
</html>