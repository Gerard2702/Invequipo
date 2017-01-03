<?php
session_start();
if(isset($_SESSION['usuario']) && isset($_SESSION['val'])){
	header("Location:home.php");
}
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inventario | Login</title>

     <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="public/css/animate.css" rel="stylesheet">
    <link href="public/css/style.css" rel="stylesheet">

</head>

<body class="bluedark-bg">
    <div class="middle-box text-center animated fadeInDown">
        <div> 
            <h3 class="logo-name">INSTITUTO SALVADOREÑO DEL SEGURO SOCIAL</h3>
            <h3 class="logo-subname">INFORMÁTICA, CONSULTORIO DE ESPECIALIDADES</h3>
            <h3 class="logo-subname">INVENTARIO DE EQUIPO INFORMÁTICO</h3>
        </div>
    </div>
  <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
           <h2 class="text-white"><i class="fa fa-user"></i></h2>
            <h3 class="text-white">Iniciar Sesión</h3>
            <div class="alert alert-danger alert-dismissable custom-alert" style="display: none">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                 Usuario o contraseña incorrectos
            </div>
            <form class="m-t" role="form" action="class/sesion/login.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="usuario" placeholder="Usuario" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="pass" placeholder="Contraseña" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
            </form>
            <p class="m-t text-white"> <small>Instituto salvadoreño del seguro social &copy; 2016</small> </p>
        </div>
    </div>
    
    <script>
    alerta.hide();
    </script>

    <!-- Mainly scripts -->
    <script src="public/js/jquery-2.1.1.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="public/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>


    <!-- Custom and plugin javascript -->
    <script src="public/js/inspinia.js"></script>
    <script src="public/js/plugins/pace/pace.min.js"></script>


</body>
<?php
if(isset($_GET['err'])){
?>
 <script>
  $('.custom-alert').fadeIn();
</script>

<?php   
}
?>
</html>
