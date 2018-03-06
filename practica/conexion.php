<?php
	// creación de la conexión a la base de datos con mysql_connect()
	$conexion = mysqli_connect('localhost', 'utp', 'utponiente') or die ("ERROR EN LA CONEXION");
	
	// Selección del a base de datos a utilizar
	$db = mysqli_select_db($conexion,'compras') or die ( "NO HEMOS PODIDO CONECTAR A LA BASE DE DATOS" );

	// establecer y realizar consulta. guardamos en variable.
	$consulta = "SELECT id,producto,descripcion FROM compras";
	$resultado = mysqli_query( $conexion, $consulta ) or die ( "CONSULTA NO SE HA PODIDO REALIZAR CON EXITO");
	
	//CONTRUIMOS LA TABLA CON LOS TITULOS CORRESPONDIENTES
	echo "<table border='2'>";
	echo "<tr>";
	echo "<th>id</th>";
	echo "<th>producto</th>";
	echo "<th>descripcion</th>";
	echo "</tr>";
	
	// recorre cada registro y muestra cada campo en la tabla.
	while ($columna = mysqli_fetch_array( $resultado ))
	{
		echo "<tr>";
		echo "<td>" . $columna['id'] . "</td>
		<td>" . $columna['producto'] . "</td>
		<td>" . $columna['descripcion'] . "</td>";
		
		echo "</tr>";
	}
	
	echo "</table>"; // Fin de la tabla

	// cerrar conexión de base de datos
	mysqli_close( $conexion );
?>