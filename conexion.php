<?php  
function conectar(){
	$servidor="localhost";
	$usuario="root";
	$bd="sapce";
	$pass="";
	$conexion=mysqli_connect($servidor,$usuario,$pass,$bd);
	
	if($conexion->connect_errno){
		echo"Error de conexion:".$conexion->connect_errno;
	}
	//$conexion->set_charset("utf8");
	$conexion->set_charset("utf8");
	return $conexion;
}
?>