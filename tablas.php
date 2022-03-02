<?php 
  include 'conecta.php';
  $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
  // $query =	"select * from tbproducto order by 1";
  $query = "SELECT tbproducto.idprod, 
				         tblinea.descripcion, 
				         tbproducto.idmodelo, 
				         tbproducto.descripcion, 
				         tbproducto.*, 
				         tblinea.*
				  	FROM tbproducto, tblinea 
				  	WHERE tbproducto.idlinea = tblinea.idlinea 
				  	ORDER BY 1";

	$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
	$numReg = pg_num_rows($resultado);
?>

<table border="0">
	<thead>
		<tr>
			<th colspan="7">tbproducto</th>
		</tr>
		<tr>
			<th>idprod</th>
			<th>idlinea</th>
			<th>idgrupo</th>
			<th>idmodelo</th>
			<th>tipo</th>
			<th>descripcion</th>
			<th>afectoigv</th>
		</tr>
	</thead>
	<tbody>

	<?php while ($fila=pg_fetch_array($resultado)) { ?>		

		<tr>
			<td><?php echo $fila[0]; ?></td>
			<td><?php echo $fila[1]; ?></td>
			<td><?php echo $fila[2]; ?></td>
			<td><?php echo $fila[3]; ?></td>
			<td><?php echo $fila[4]; ?></td>
			<td><?php echo $fila[5]; ?></td>
			<td><?php echo $fila[6]; ?></td>
		</tr>
	
  <?php } ?>

	</tbody>
</table>
<?php pg_close($conexion); ?>
<br><br>




<?php 
	// date_default_timezone_set("America/Lima");
	// $hoy = date('Y-m-d');


  $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
  $query =	"select * from tbdetpedpres";

	$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
	$numReg = pg_num_rows($resultado);

?>

<table border="0">
	<thead>
		<tr>
			<th colspan="5">tbdetpedpres</th>
		</tr>		
		<tr>
			<th>iddetpedpres</th>
			<th>idpedido</th>
			<th>idpresprod</th>
			<th>cantidad</th>
			<th>porcentaje1</th>
		</tr>
	</thead>
	<tbody>

	<?php while ($fila=pg_fetch_array($resultado)) { ?>		

		<tr>
			<td><?php echo $fila[0]; ?></td>
			<td><?php echo $fila[1]; ?></td>
			<td><?php echo $fila[2]; ?></td>
			<td><?php echo $fila[3]; ?></td>
			<td><?php echo $fila[4]; ?></td>
		</tr>
	
  <?php } ?>

	</tbody>
</table>

<?php pg_close($conexion); ?>

<br><br>

<?php 
  $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
  $query =	"select * from tbdetprodpres order by 1";

	$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
	$numReg = pg_num_rows($resultado);
?>

<table border="0">
	<thead>
		<tr>
			<th colspan="3">tbdetprodpres</th>
		</tr>			
		<tr>
			<th>idpresprod</th>
			<th>idpres</th>
			<th>idprod</th>
			<th>idmoneda</th>
			<th>tipocambio</th>
			<th>preccom</th>
			<th>precvta1</th>
			<th>precvta</th>
			<th>unimin</th>
			<th>estado</th>
			<th>equivalencia</th>
			<th>actptjeganacia</th>
			<th>prtjeganancia</th>
			<th>peso</th>
			<th>actptjedescuento</th>
			<th>prtjedescuento</th>
			<th>flete</th>
		</tr>
	</thead>
	<tbody>

	<?php while ($fila=pg_fetch_array($resultado)) { ?>		

		<tr>
			<td><?php echo $fila[0]; ?></td>
			<td><?php echo $fila[1]; ?></td>
			<td><?php echo $fila[2]; ?></td>
			<td><?php echo $fila[4]; ?></td>
			<td><?php echo $fila[5]; ?></td>
			<td><?php echo $fila[6]; ?></td>
			<td><?php echo $fila[7]; ?></td>
			<td><?php echo $fila[8]; ?></td>
			<td><?php echo $fila[9]; ?></td>
			<td><?php echo $fila[10]; ?></td>
			<td><?php echo $fila[11]; ?></td>
			<td><?php echo $fila[12]; ?></td>
			<td><?php echo $fila[13]; ?></td>
			<td><?php echo $fila[15]; ?></td>
			<td><?php echo $fila[16]; ?></td>
			<td><?php echo $fila[17]; ?></td>
			<td><?php echo $fila[18]; ?></td>
		</tr>
	
  <?php } ?>

	</tbody>
</table>
<?php pg_close($conexion); ?>
<br><br>

<?php 
  $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
  $query =	"select * from tbdetingusu";

	$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
	$numReg = pg_num_rows($resultado);
?>

<table border="0">
	<thead>
		<tr>
			<th>header1</th>
			<th>header2</th>
			<th>header3</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td colspan="3">tbdetingusu</td>
		</tr>

	<?php while ($fila=pg_fetch_array($resultado)) { ?>		

		<tr>
			<td><?php echo $fila[0]; ?></td>
			<td><?php echo $fila[1]; ?></td>
			<td><?php echo $fila[2]; ?></td>
		</tr>
	
  <?php } ?>

	</tbody>
</table>
<?php pg_close($conexion); ?>
<br><br>


<?php 
  $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
  $query =	"select * from tbdetpedusu";

	$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
	$numReg = pg_num_rows($resultado);
?>

<table border="0">
	<thead>
		<tr>
			<th>header1</th>
			<th>header2</th>
			<th>header3</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td colspan="3">tbdetpedusu</td>
		</tr>

	<?php while ($fila=pg_fetch_array($resultado)) { ?>		

		<tr>
			<td><?php echo $fila[0]; ?></td>
			<td><?php echo $fila[1]; ?></td>
			<td><?php echo $fila[2]; ?></td>
		</tr>
	
  <?php } ?>

	</tbody>
</table>
<?php pg_close($conexion); ?>
<br><br>

<?php 
  $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
  $query =	"select * from tbdetprodusu";

	$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
	$numReg = pg_num_rows($resultado);
?>

<table border="0">
	<thead>
		<tr>
			<th>header1</th>
			<th>header2</th>
			<th>header3</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td colspan="3">tbdetprodusu</td>
		</tr>

	<?php while ($fila=pg_fetch_array($resultado)) { ?>		

		<tr>
			<td><?php echo $fila[0]; ?></td>
			<td><?php echo $fila[1]; ?></td>
			<td><?php echo $fila[2]; ?></td>
		</tr>
	
  <?php } ?>

	</tbody>
</table>
<?php pg_close($conexion); ?>
<br><br>


<?php 
  $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
  $query =	"select * from tbdetsalpres";

	$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
	$numReg = pg_num_rows($resultado);
?>

<table border="0">
	<thead>
		<tr>
			<th>header1</th>
			<th>header2</th>
			<th>header3</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td colspan="3">tbdetsalpres</td>
		</tr>

	<?php while ($fila=pg_fetch_array($resultado)) { ?>		

		<tr>
			<td><?php echo $fila[0]; ?></td>
			<td><?php echo $fila[1]; ?></td>
			<td><?php echo $fila[2]; ?></td>
		</tr>
	
  <?php } ?>

	</tbody>
</table>
<?php pg_close($conexion); ?>
<br><br>


<?php 
  $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
  $query =	"select * from tbsalida";

	$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
	$numReg = pg_num_rows($resultado);
?>

<table border="0">
	<thead>
		<tr>
			<th>header1</th>
			<th>header2</th>
			<th>header3</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td colspan="3">tbsalida</td>
		</tr>

	<?php while ($fila=pg_fetch_array($resultado)) { ?>		

		<tr>
			<td><?php echo $fila[0]; ?></td>
			<td><?php echo $fila[1]; ?></td>
			<td><?php echo $fila[2]; ?></td>
		</tr>
	
  <?php } ?>

	</tbody>
</table>
<?php pg_close($conexion); ?>
<br><br>


<?php 
  $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
  $query =	"select * from tbdetsalusu";

	$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
	$numReg = pg_num_rows($resultado);
?>

<table border="0">
	<thead>
		<tr>
			<th>header1</th>
			<th>header2</th>
			<th>header3</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td colspan="3">tbdetsalusu</td>
		</tr>

	<?php while ($fila=pg_fetch_array($resultado)) { ?>		

		<tr>
			<td><?php echo $fila[0]; ?></td>
			<td><?php echo $fila[1]; ?></td>
			<td><?php echo $fila[2]; ?></td>
		</tr>
	
  <?php } ?>

	</tbody>
</table>
<?php pg_close($conexion); ?>
<br><br>


<?php 
  $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
  $query =	"select * from tbpedido";

	$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
	$numReg = pg_num_rows($resultado);
?>

<table border="0">
	<thead>
		<tr>
			<th>header1</th>
			<th>header2</th>
			<th>header3</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td colspan="3">tbpedido</td>
		</tr>

	<?php while ($fila=pg_fetch_array($resultado)) { ?>		

		<tr>
			<td><?php echo $fila[0]; ?></td>
			<td><?php echo $fila[1]; ?></td>
			<td><?php echo $fila[2]; ?></td>
		</tr>
	
  <?php } ?>

	</tbody>
</table>
<?php pg_close($conexion); ?>
<br><br>