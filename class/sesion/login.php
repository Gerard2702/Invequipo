<?php 
  try{
	$usuario=$_POST['usuario'];
	$contrasena1=$_POST['pass'];
	$contrasena=md5($contrasena1);
	include("../conexion/conexion.php");
	$conn = new Conexion();
	$conn->conectar();
	$query="SELECT * FROM usuario WHERE usuario='$usuario' AND pass='$contrasena'";
	$resp=$conn->query($query);
    if(mysqli_num_rows($resp)>0){
		$user=$resp->fetch_assoc(); 
		$conn->desconectar();
        session_start();
        $_SESSION['usuario']=$user['usuario'];
        $_SESSION['val']="true";
        header("Location:../../home.php#");
	   exit();
	} 
	else{
	header("Location:../../?err=1");
	exit();
	}
  }
  catch(Exception $e){
  header("Location:../../?err=2");
  exit();
  }
?>