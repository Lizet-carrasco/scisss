<?php	

//define( 'DVWA_WEB_PAGE_TO_ROOT', '' );

//require_once DVWA_WEB_PAGE_TO_ROOT.'dvwa/dvwa/includes/dvwaPage.inc.php';

//dvwaDatabaseConnect();

$handler = mysqli_connect('127.0.0.1', 'root' , 'aicila97');

//mysqli_select_db('tecsup');
mysqli_select_db($handler, 'acme');


$html = null;

if( isset( $_POST[ 'Submit' ] ) ) { 
	// Get input 
        $id = $_POST[ 'id' ]; 

	// Check database 
        $getid  = "SELECT nombre, email FROM unica WHERE id = '$id';"; 

        $result = mysqli_query( $handler, $getid ); // Removed 'or die' to suppress mysql errors 

        // Get results 
        $num = @mysqli_num_rows( $result ); // The '@' character suppresses errors 

        if( $num > 0 ) { 
	        // Feedback for end user 
	        $html='<pre>El ID de usuario existe en la base de datos.</pre>'; 
        } 
        else { 
	        // User wasn't found, so the page wasn't! 
	        header( $_SERVER[ 'SERVER_PROTOCOL' ] . ' 404 Not Found' ); 

		// Feedback for end user 
	        $html='<pre>El ID de usuario NO existe en la base de datos.</pre>'; 
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
