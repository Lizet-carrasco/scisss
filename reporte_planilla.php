<?php

$var_combo_planilla = $_POST['combo_planilla'];

//echo "var_combo_planilla=".$var_combo_planilla;


if( $var_combo_planilla == 1) {
    header ('Location: reporte01.php');
    exit();
}

if( $var_combo_planilla == 2) {
    header ('Location: reporte02.php');
    exit();
}

if( $var_combo_planilla == 3) {
    header ('Location: reporte03.php');
    exit();
}

echo "Ud. no tiene autorizacion para acceder a esta funcionalidad.."

?>

