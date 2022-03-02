<?php
/*
// PHP
// No necesitas ninguna librería adicional, solo usa el siguiente código:
// PHP versión 5
// activar en ini.php en desarrollo y producción: extension=php_curl.dll
// activar en  ini.php para ver errores en desarrollo: display_errors = on

 #########################################################
#### INTEGRACIÓN FÁCIL ####
+++++++++++++++++++++++++++++++++++++++++++++++++++++++
# ESTE CÓDIGO FUNCIONA PARA LA VERSIÓN ONLINE Y OFFLINE
# Visita www.nubefact.com/integracion para mas información
+++++++++++++++++++++++++++++++++++++++++++++++++++++++

#########################################################
#### FORMA DE TRABAJO ####
+++++++++++++++++++++++++++++++++++++++++++++++++++++++
# PASO 1: Conseguir una RUTA y un TOKEN para trabajar con NUBEFACT (Regístrate o ingresa a tu cuenta en www.nubefact.com).
# PASO 2: Generar un archivo en formato .JSON o .TXT con una estructura que se detalla en este documento.
# PASO 3: Enviar el archivo generado a nuestra WEB SERVICE ONLINE u OFFLINE según corresponda usando la RUTA y el TOKEN.
# PASO 4: Generamos el archivo XML y PDF (Según especificaciones de la SUNAT) y te devolveremos INSTANTÁNEAMENTE los datos del documento generado.
# Para ver el documento generado ingresa a www.nubefact.com/login con tus datos de acceso, y luego a la opción "Ver Facturas, Boletas y Notas"
# IMPORTANTE: Enviaremos el XML generado a la SUNAT y lo almacenaremos junto con el PDF, XML y CDR en la NUBE para que tu cliente pueda consultarlo en cualquier momento, si así lo desea.
+++++++++++++++++++++++++++++++++++++++++++++++++++++++


#########################################################
#### PASO 1: CONSEGUIR LA RUTA Y TOKEN ####
+++++++++++++++++++++++++++++++++++++++++++++++++++++++
# CUENTA DEMO PARA HACER PRUEBAS
# Puedes usar la siguiente cuenta para hacer pruebas:
#  - LINK: https://demo.nubefact.com/login
#  - USUARIO: demo@nubefact.com
#  - PASSWORD: demo@nubefact.com
# Una vez que ingreses a esta cuenta ve a la opción API (Integración) para ver la RUTA y el TOKEN los cuales son:
#  - RUTA: https://demo.nubefact.com/api/v1/03989d1a-6c8c-4b71-b1cd-7d37001deaa0
#  - TOKEN: d0a80b88cde446d092025465bdb4673e103a0d881ca6479ebbab10664dbc5677
# También puedes crear una cuenta propia para hacer pruebas más precisas.
#
# CREAR UNA CUENTA PROPIA
#  - Regístrate gratis en www.nubefact.com/register
#  - Ir la opción API (Integración).
# IMPORTANTE: Para que la opción API (Integración) de tu cuenta propia esté activada necesitas escribirnos a soporte@nubefact.com o llámanos al teléfono: 01 468 3535 (opción 2) o celular (WhatsApp) 955 598762.
+++++++++++++++++++++++++++++++++++++++++++++++++++++++
 *
 *
 */


/*++++++++++++++++++++++++++++++++++++++ CUENTA D´BANDERA +++++++++++++++++++++++++++++++++++++++++++++++++++*/

// RUTA para enviar documentos
$ruta = "https://api.nubefact.com/api/v1/5915fede-0629-456a-8fe9-89d417ae8b52";

//TOKEN para enviar documentos
$token = "acd8c0dbcc904c1ebaaed4ad37c56d4ea0e6b06957ed40798cbfe097ac70e6e2";

/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/



/*++++++++++++++++++++++++++++++++++++++ CUENTA KM DATA SAC+++++++++++++++++++++++++++++++++++++++++++++++++++++*/

// RUTA para enviar documentos
// $ruta = "https://www.nubefact.com/api/v1/f99349f5-de05-4db4-8462-19bae9136488";

//TOKEN para enviar documentos
// $token = "f3bdec2620eb44f8928287f3bd4e371e1ce8c05097024b85abe0ea7fd668553f";

/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/


/*++++++++++++++++++++++++++++++++++++++ CUENTA DEMO+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

// RUTA para enviar documentos
// $ruta = "https://demo.nubefact.com/api/v1/03989d1a-6c8c-4b71-b1cd-7d37001deaa0";

// //TOKEN para enviar documentos
// $token = "d0a80b88cde446d092025465bdb4673e103a0d881ca6479ebbab10664dbc5677";

/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/




/*
#########################################################
#### PASO 2: GENERAR EL ARCHIVO PARA ENVIAR A NUBEFACT ####
+++++++++++++++++++++++++++++++++++++++++++++++++++++++
# - MANUAL para archivo JSON en el link: https://goo.gl/WHMmSb
# - MANUAL para archivo TXT en el link: https://goo.gl/Lz7hAq
+++++++++++++++++++++++++++++++++++++++++++++++++++++++
 */

$data_txt = file_get_contents("reporteOK.txt");

/*
#########################################################
#### PASO 3: ENVIAR EL ARCHIVO A NUBEFACT ####
+++++++++++++++++++++++++++++++++++++++++++++++++++++++
# SI ESTÁS TRABAJANDO CON ARCHIVO JSON
# - Debes enviar en el HEADER de tu solicitud la siguiente lo siguiente:
# Authorization = Token token="8d19d8c7c1f6402687720eab85cd57a54f5a7a3fa163476bbcf381ee2b5e0c69"
# Content-Type = application/json
# - Adjuntar en el CUERPO o BODY el archivo JSON o TXT
# SI ESTÁS TRABAJANDO CON ARCHIVO TXT
# - Debes enviar en el HEADER de tu solicitud la siguiente lo siguiente:
# Authorization = Token token="8d19d8c7c1f6402687720eab85cd57a54f5a7a3fa163476bbcf381ee2b5e0c69"
# Content-Type = text/plain
# - Adjuntar en el CUERPO o BODY el archivo JSON o TXT
+++++++++++++++++++++++++++++++++++++++++++++++++++++++
*/

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $ruta);
curl_setopt(
	$ch, CURLOPT_HTTPHEADER, array(
	'Authorization: Token token="'.$token.'"',
	'Content-Type: text/plain',
	)
);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS,$data_txt);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$respuesta  = curl_exec($ch);
curl_close($ch);

/*
 #########################################################
#### PASO 4: LEER RESPUESTA DE NUBEFACT ####
+++++++++++++++++++++++++++++++++++++++++++++++++++++++
# Recibirás una respuesta de NUBEFACT inmediatamente lo cual se debe leer, verificando que no haya errores.
# Debes guardar en la base de datos la respuesta que te devolveremos.
# Puedes imprimir el PDF que nosotros generamos como también generar tu propia representación impresa previa coordinación con nosotros.
# La impresión del documento seguirá haciéndose desde tu sistema. Enviaremos el documento por email a tu cliente si así lo indicas en el archivo JSON o TXT.
# Escríbenos a soporte@nubefact.com o llámanos al teléfono: 01 468 3535 (opción 2) o celular (WhatsApp) 955 598762
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 */

// AQUI DEBES LEER NUESTRA RESPUESTA

print_r($respuesta);


	$respuesta_link = explode("enlace_del_pdf|", $respuesta);
	$body = explode("|", $respuesta_link[1]);

// 	echo $body[0];
// 	echo "<br>";

// echo "<a href='".$body[0]."' title='ver pdf' target='_blank'>Ver PDF EN NUEVA VENTANA</a>"; 


	include 'conecta.php';
	$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
	if ($body[0] != '') {
		$query =	"UPDATE tbpedido SET observacion = '".$body[0]."' WHERE idpedido = ".$_GET['idped'];
		$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
		header("Location: ".$body[0]);
	}else{
		$respuesta_arr = explode("errors|", $respuesta);
		$rpta_error = explode("codigo|", $respuesta_arr[1]);
		$rpta_err_cod = explode("|", $rpta_error[1]);
		echo $rpta_err_cod[0];
    header("Location: mensaje.php?iderror=".$rpta_err_cod[0]);
	}
	//echo $query;

?>

