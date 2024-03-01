<?php
session_start();

if(!isset($_SESSION['name'])){
	//if(!session_is_registered(user)){
        //header("location:adiestra/www.adiestra.pe/login.php");
	header("location:login.php");
}
echo "Bienvenido ".$_SESSION['name'] 
?>

Reporte Planilla Sueldos

<br>
<br>
<br>

<form action="reporte_planilla.php" method="post">
	<select name="combo_planilla">
		<option value="1">Planilla Proveedores</option>
		<option value="2">Planilla Empleados</option>
		<option value="">Planilla Gerentes</option>
	</select> 
	<input type=submit value="Ver Reporte">
</form>


