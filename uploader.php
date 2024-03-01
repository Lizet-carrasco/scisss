<?php
$target_path = "/var/www/html/acme/reportes/";

$target_path = $target_path . basename( $_FILES["uploadedfile"]["name"]); 


//validar mimetype
$mimes = ['application/vnd.ms-excel']; //,'text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet'];


if( in_array($_FILES["uploadedfile"]["type"], $mimes) &&  move_uploaded_file($_FILES["uploadedfile"]["tmp_name"], $target_path)) {
    echo "The file <a href=reportes/>".  basename( $_FILES['uploadedfile']['name'])."</a> has been uploaded";
} else{
    echo "There was an error uploading the file, please try again!";// . $_FILES["uploadedfile"]["error"];
}
?>


