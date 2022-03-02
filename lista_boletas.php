<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Listado de Boletas Electrónicas</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
 <div style="margin:0px auto; text-align: center; width:100%;">
 	LISTADO DE BOLETAS - D'BANDERA - Sistema Comercial
 </div>


 <div id="content" style="margin:0px auto; text-align: center; width:100%;">
	
 	<?php 
	
	date_default_timezone_set("America/Lima");
	$hoy = date('Y-m-d');
	echo $hoy;

	include 'conecta.php';
  $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
  $query =	"select idtiporef, docref,
						position('-' in docref),
						substring(docref from position('-' in docref)+1 for 2),
						rtrim(substring(docref from 1 for position(' ' in docref)),' '),
						substring(docref from position('-' in docref)+1),
						(substring(docref from position('-' in docref)+1 for 2) 
						 || rtrim(substring(docref from 1 for position(' ' in docref)),' ')) as Serie,
						 idtipodocid, tbpersona.nrodoc, razonsocial, (nombres || ' ' || ape_pat || ' ' || ape_mat) as nombres,
						 tbpersona.direccion, fecemi, tipocambio, idigv, total, igv, percepcion, idmoneda, idpedido, SUBSTRING (docref, 8), otrodoc, tbpedido.observacion
						from tbpedido, tbpersona where tbpedido.idcli = tbpersona.idpersona
						and fecemi is not null and fecemi >= date('"."2019-09-06"."') and fecemi <= date('"."2019-09-30"."')
						and rtrim(substring(docref from 1 for position(' ' in docref)),' ') = '001'
						and ltrim(substring(docref from position('-' in docref)+1 for 2)) = 'B'
						and idtiporef in (
						    select idref from tbctas_cobrar 
						    where fecemi >= date('"."2019-09-06"."') and fecemi <= date('"."2019-09-30"."') 
						    and estado = true) order by 1 desc";
	
	$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
	$numReg = pg_num_rows($resultado);

?>
<br>
<a href="index.php" title="">Regresa</a>

<?php 

		if($numReg>0){
			echo "<table border='0' width='100%'>
							<tr bgcolor='skyblue'>
								<th>DOC</th>
								<th>docref</th>
								<th>serie</th>
								<th>Nro</th>
								<th>RUC</th>
								<th>DNI</th>
								<th>RAZ. SOCIAL</th>
								<th>NOMBRES</th>
								<th>DIRECCION</th>
								<th>&nbsp;&nbsp;&nbsp;&nbsp;FECHA&nbsp;&nbsp;&nbsp;&nbsp;</th>
								<th>TIPO</th>
								<th>MONTO</th>
								<th>IGV</th>
								<th align='center'>IDPEDIDO</th>
								<th>NUBEFACT</th>
							</tr>";
			while ($fila=pg_fetch_array($resultado)) {

				$primero = explode("//", $fila['observacion']);
				if ($primero[0]=="https:") {
					$enlace_cp=$fila['observacion'];
					$inilink = "<a href='".$enlace_cp."' title='ticker' target='_blank'>";
					$finlink = "</a>";
					$colorfila = "<img src='img/portapapeles.png' alt='ticket'>";

				}else{
					$enlace_cp="";
					$inilink = "";
					$finlink = "";
					$colorfila = "";
				}			

			echo "<tr>";
				echo "<td>".$fila[0]."</td>";
				echo "<td>".$fila[1]."</td>";
				echo "<td>".$inilink.$colorfila.$fila[6].$finlink."</td>";
				echo "<td>".$fila[7]."</td>";
				echo "<td>".$fila[8]."</td>";
				echo "<td>".$fila['otrodoc']."</td>";
				echo "<td>".$fila[9]."</td>";
				echo "<td>".$fila[10]."</td>";
				echo "<td>".$fila[11]."</td>";
				echo "<td>".$fila[12]."</td>";

				echo "<td align='right'>".$fila[14]."</td>";
				echo "<td align='right'>".round($fila[15],2)."</td>";
				echo "<td align='right'>".round($fila[16],2)."</td>";
				echo "<td align='center'>".$fila[19]."</td>";
				echo "<td align='center'><a href='enviar.php?idped=$fila[19]&tc=B' style='text-decoration:none;' target='_blank'>"."ENVIAR"."</a></td>";
			echo "</tr>";
			

				// echo "<tr><td colspan='15'>".$fila['observacion']."</td></tr>";

			}
	
			echo "</table>";
	
	}else{
		echo "<br>";
	    echo "No hay cabecera <br>";
	}


?>


 </div>
<?php pg_close($conexion); ?>

</body>
</html>