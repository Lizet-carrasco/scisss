<?php	

//define( 'DVWA_WEB_PAGE_TO_ROOT', '' );

//require_once DVWA_WEB_PAGE_TO_ROOT.'dvwa/dvwa/includes/dvwaPage.inc.php';

//dvwaDatabaseConnect();

function mysqli_result($res, $row, $field=0) { 
	$res->data_seek($row); 
	$datarow = $res->fetch_array(); 
	return $datarow[$field]; 
} 

$handler=mysqli_connect('127.0.0.1', 'root' , 'aicila97');
//mysqli_select_db('tecsup');
mysqli_select_db($handler,'acme');

session_start();
if(!isset($_SESSION['name'])){
	//if(!session_is_registered(user))	{
	//header("location:adiestra/www.adiestra.pe/login.php");
	header("location:login.php");
}

if(!isset($_SESSION['antiloginbypass'])){
	//if(!session_is_registered(user))      {
        //header("location:adiestra/www.adiestra.pe/login.php");
	header("location:login.php");
}


$html = null;


if(isset($_POST['Submit'])) {

	// Retrieve data

	$id = $_POST['id'];

	$getid = "SELECT nombre, email FROM unica WHERE id = '$id'";
	$result = mysqli_query($handler,$getid) or die('<pre>' . mysqli_error($handler) . '</pre>' );

	$num = mysqli_num_rows($result);

	$i = 0;

	while ($i < $num) {

		$first = mysqli_result($result,$i,"nombre");
		$last = mysqli_result($result,$i,"email");
		
		$html .= '<pre>';
		$html .= 'ID: ' . $id . '<br>Nombre: ' . $first . '<br>E-mail: ' . $last;
		$html .= '</pre>';

		$i++;
	}
}

echo "<div class=\"body_padded\" align=\"center\">
        
        <br />

        <p> <img src=\"http://acme.open-sec.com/acme/osah2022-polo.png\"  width=\"256\"> </p> 

        <br />
        <h1>Bienvenido a las consultas del Admin</h1>


        <div class=\"vulnerable_code_area\">

                <h3>ID del Usuario:</h3>

                <form action=\"#\" method=\"POST\">
                        <input type=\"text\" name=\"id\" size=\"4\" maxlength=\"4\">
                        <input type=\"submit\" name=\"Submit\" value=\"Consultar\">
                </form>
        $html

        </div>
	</div>
</div>
";

mysqli_close($handler);
?>

