<?php 
	$link =mysqli_connect("localhost","root","");
	if($link){
		mysqli_select_db($link , "jorpazbd_14-may-2020");
	}
	$checkbox=$_POST['checkbox'];
	foreach($checkbox as $llave => $valor) {
		$ficha2="INSERT INTO journeys SET gobernador='$valor' ";
		$ejecutar_insertar_ficha2=mysqli_query($link , $ficha2);
	}
 ?>