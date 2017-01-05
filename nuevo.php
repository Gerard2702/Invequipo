<?php
session_start();
if(!isset($_SESSION['usuario']) && !isset($_SESSION['val'])){
	header("Location:class/sesion/signout.php");
}
include("class/conexion/conexion.php");
$conn = new Conexion();
$conn->conectar();
$acentos = $conn->query("SET NAMES 'utf8'");
$query="SELECT * FROM tipo_equipo order by nombre";
$resp= $conn->query($query);
$num = mysqli_num_rows($resp);

$query2="SELECT * FROM marca order by nombre";
$resp2= $conn->query($query2);
$num2 = mysqli_num_rows($resp2);

$query3="SELECT * FROM dvd order by nombre";
$resp3= $conn->query($query3);
$num3 = mysqli_num_rows($resp3);

$query4="SELECT * FROM direccion order by nombre";
$resp4= $conn->query($query4);
$num4 = mysqli_num_rows($resp4);

$query5="SELECT * FROM dominio order by nombre";
$resp5= $conn->query($query5);
$num5 = mysqli_num_rows($resp5);

$query6="SELECT * FROM estado_equipo order by nombre";
$resp6= $conn->query($query6);
$num6 = mysqli_num_rows($resp6);

$query7="SELECT * FROM nivel order by nombre";
$resp7= $conn->query($query7);
$num7 = mysqli_num_rows($resp7);
?>

<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.3/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Sep 2015 13:10:07 GMT -->
<head>

    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nuevo | New</title>

    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/font-awesome/css/font-awesome.css" rel="stylesheet">
    
    <link href="public/css/animate.css" rel="stylesheet">
    <link href="public/css/style.css" rel="stylesheet">
    
   <!-- Toastr style -->
    <link href="public/css/plugins/toastr/toastr.min.css" rel="stylesheet">

  
   
    
</head>

<body id="inicio">
    <div id="wrapper">
       
        <div id="" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
           <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="home.php"><i class="fa fa-home"></i></a>
            </div>  
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-white welcome-message"><strong>Inventario de Equipo Informatico</strong> </span>
                </li>
                <li>
                    <a href="class/sesion/signout.php">
                        <i class="fa fa-sign-out"></i> Cerrar sesión
                    </a>
                </li>
            </ul>
        </nav>
        </div>
           <br>
            <div class="row">
            <div class="col-lg-12">
            <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h3>Agregar nuevo Elemento</h3>
            </div>
            <div class="ibox-content">
            <div class="alert alert-success alert-dismissable custom-alert" style="display: none">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <strong>Registro Exitoso.</strong> El registro se ha guardado exitosamente.
            </div>
            <form class="form-horizontal" name="nuevo" id="nuevo">
               <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <h3>DATOS GENERALES</h3>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Tipo de Equipo</label>
                    <div class="col-md-5">
                        <select class="select2_demo_1 form-control" name="stipoequipo" id="stipoequipo">
                            <?php if($num >0){ 
                                while($tipo_equipo = mysqli_fetch_array($resp,MYSQLI_ASSOC)){?>
                                <option value="<?php echo $tipo_equipo['nombre'];?>"><?php echo $tipo_equipo['nombre'];?></option>
                            <?php }} ?>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Nivel</label>
                    <div class="col-md-5">
                        <select class="select2_demo_1 form-control" name="snivel" id="snivel">
                            <?php if($num7 >0){ 
                                while($nivel = mysqli_fetch_array($resp7,MYSQLI_ASSOC)){?>
                                <option value="<?php echo $nivel['nombre'];?>"><?php echo $nivel['nombre'];?></option>
                            <?php }} ?>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal7"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Ubicacion</label>
                    <div class="col-lg-5"><input type="text" placeholder="Ubicacion" class="form-control" name="ubicacion" id="ubicacion" ></div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Nombre de Usuario</label>
                    <div class="col-lg-5"><input type="text" placeholder="Nombre de Usuario" class="form-control" name="nombreuser" id="nombreuser" ></div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Centro de Costo</label>
                    <div class="col-lg-5"><input type="number" placeholder="Centro de Costo" class="form-control" name="centrocosto" id="centrocosto" ></div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Numero de Inventario</label>
                    <div class="col-lg-5"><input type="text" placeholder="Numero de Inventario" class="form-control" min="0" name="numeroinv" id="numeroinv" ></div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Marca</label>
                    <div class="col-md-5">
                        <select class="select2_demo_1 form-control" name="smarca" id="smarca">
                            <?php if($num2 >0){ 
                                while($marca = mysqli_fetch_array($resp2,MYSQLI_ASSOC)){?>
                                <option value="<?php echo $marca['nombre'];?>"><?php echo $marca['nombre'];?></option>
                            <?php }} ?>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Modelo</label>
                   <div class="col-lg-5"><input type="text" placeholder="Modelo" class="form-control" name="modelo" id="modelo" ></div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Serie</label>
                    <div class="col-lg-5"><input type="text" placeholder="Serie" class="form-control" name="serie" id="serie" ></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <h3>CARACTERISTICAS BASICAS</h3>
                        <spam>Procesador</spam>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Marca y Modelo</label>
                    <div class="col-lg-5"><input type="text" placeholder="Marca y Modelo" class="form-control" name="marcamodelo" id="marcamodelo" ></div>
                </div> 
                <div class="form-group">
                    <label class="col-md-2 control-label">Velocidad</label>
                    <div class="col-md-4"><input type="number" step='0.01' placeholder="Velocidad" class="form-control" name="velocidad" id="velocidad" ></div>
                    <div class="col-md-1">
                        <select class="form-control" name="svelocidad" id="svelocidad" disabled>
                            <option value="GHz">GHz</option>
                        </select>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-md-2 control-label">RAM</label>
                    <div class="col-md-4"><input type="number" placeholder="RAM" class="form-control" name="ram" id="ram" ></div>
                    <div class="col-md-1">
                        <select class="form-control" name="sram" id="sram">
                            <option value="GB">GB</option>
                             <option value="MB">MB</option>
                        </select>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-md-2 control-label">HDD</label>
                    <div class="col-md-4"><input type="number" placeholder="HDD" class="form-control" name="hdd" id="hdd" ></div>
                    <div class="col-md-1">
                        <select class="form-control" name="shdd" id="shdd">
                            <option value="TB">TB</option>
                             <option value="GB">GB</option>
                             <option value="MB">MB</option>
                        </select>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-md-2 control-label">CD/DVC</label>
                    <div class="col-md-5">
                        <select class="select2_demo_1 form-control" name="sdvd" id="sdvd">
                            <?php if($num3 >0){ 
                                while($dvd = mysqli_fetch_array($resp3,MYSQLI_ASSOC)){?>
                                <option value="<?php echo $dvd['nombre'];?>"><?php echo $dvd['nombre'];?></option>
                            <?php }} ?>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal3"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <h3>SOFTWARE</h3>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-md-2 control-label">Sistema Operativo</label>
                    <div class="col-lg-5"><input type="text" placeholder="Sistema Operativo" class="form-control" name="sisoperativo" id="sisoperativo" ></div>
                </div> 
                <div class="form-group">
                    <label class="col-md-2 control-label">Licencia S.O.</label>
                    <div class="col-lg-5"><input type="text" placeholder="Licencia S.O" class="form-control" name="licenciaso" id="licenciaso" ></div>
                </div> 
                <div class="form-group">
                    <label class="col-md-2 control-label">Version de Office</label>
                    <div class="col-lg-5"><input type="text" placeholder="Version de Office" class="form-control" name="versionofice" id="versionofice" ></div>
                </div> 
                <div class="form-group">
                    <label class="col-md-2 control-label">Licencia de Office</label>
                    <div class="col-lg-5"><input type="text" placeholder="Licencia de Office" class="form-control" name="licenciaofice" id="licenciaofice" ></div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Sistemas Institucionales</label>
                    <div class="col-lg-5"><textarea rows="4" type="text" placeholder="Agregar un sistema por linea." class="form-control" name="sisinstitucionales" id="sisinstitucionales" ></textarea></div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Otros Software(Utilitarios)</label>
                    <div class="col-lg-5"><textarea rows="4" type="text" placeholder="Agregar un software por linea." class="form-control" name="otrossoftware" id="otrossoftware" ></textarea></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <h3>IDENTIFICACI&Oacute;N DE RED</h3>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-md-2 control-label">Nombre del Equipo</label>
                    <div class="col-lg-5"><input type="text" placeholder="Nombre del Equipo" class="form-control" name="equiponombre" id="equiponombre" ></div>
                </div> 
                <div class="form-group">
                    <label class="col-md-2 control-label">Direcci&oacute;n IP</label>
                    <div class="col-md-5">
                        <select class="select2_demo_1 form-control" name="sdireccion" id="sdireccion">
                            <?php if($num4 >0){ 
                                while($direccion = mysqli_fetch_array($resp4,MYSQLI_ASSOC)){?>
                                <option value="<?php echo $direccion['nombre'];?>"><?php echo $direccion['nombre'];?></option>
                            <?php }} ?>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal4"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Nombre del Dominio</label>
                    <div class="col-md-5">
                        <select class="select2_demo_1 form-control" name="sdominio" id="sdominio">
                            <?php if($num5 >0){ 
                                while($dominio = mysqli_fetch_array($resp5,MYSQLI_ASSOC)){?>
                                <option value="<?php echo $dominio['nombre'];?>"><?php echo $dominio['nombre'];?></option>
                            <?php }} ?>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal5"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <h3>ESTADO DEL EQUIPO</h3>
                    </div>
                </div>  
                <div class="form-group">
                    <label class="col-md-2 control-label">Fecha de Adquisición</label>
                    <div class="col-lg-5"><input type="text" placeholder="Fecha de Adquisición" class="form-control" name="fechaadqui" id="fechaadqui" ></div>
                </div> 
                <div class="form-group">
                    <label class="col-md-2 control-label">Fecha de Vencimiento de Garant&iacute;a</label>
                    <div class="col-lg-5"><input type="text" placeholder="Fecha de Vencimiento de Garant&iacute;a" class="form-control" name="fechagarantia" id="fechagarantia" ></div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Estado del Equipo</label>
                    <div class="col-md-5">
                        <select class="select2_demo_1 form-control" name="sestado" id="sestado">
                            <?php if($num6 >0){ 
                                while($estado = mysqli_fetch_array($resp6,MYSQLI_ASSOC)){?>
                                <option value="<?php echo $estado['nombre'];?>"><?php echo $estado['nombre'];?></option>
                            <?php }} ?>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal6"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Observaciones</label>
                    <div class="col-lg-5"><textarea rows="4" type="text" placeholder="Agregar una observacion por linea." class="form-control" name="observaciones" id="observaciones" ></textarea></div>
                </div>     
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <button class="btn btn-sm btn-primary" type="submit">Agregar</button>
                    </div>
                </div>
            </form>
            </div>
            </div>
            </div>
            </div>
        </div>
        
        
    </div>
    <div class="modal inmodal" id="myModal1" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated fadeIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>                                     
                    <h6 class="modal-title">Agregar Tipo de Equipo</h6>
                </div>
                <form class="form-horizontal" id="ftipoequipo">
                <div class="modal-body">
                    
                        <div class="form-group">
                            <label class="col-md-4 control-label">Tipo de Equipo</label>
                            <div class="col-md-8"><input type="text" placeholder="Tipo de Equipo" class="form-control" name="ltipoequipo" id="ltipoequipo" required></div>
                        </div> 
                   
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" name="gtipoequipo" id="gtipoequipo">Guardar</button>
                </div>
                 </form>
            </div>
        </div>
    </div>
    <div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated fadeIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>                                     
                    <h6 class="modal-title">Agregar Marca</h6>
                </div>
                <form class="form-horizontal" id="fmarca">
                <div class="modal-body">
                    
                        <div class="form-group">
                            <label class="col-md-4 control-label">Marca</label>
                            <div class="col-md-8"><input type="text" placeholder="Tipo de Equipo" class="form-control" name="lmarca" id="lmarca" required></div>
                        </div> 
                   
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" name="gmarca" id="gmarca">Guardar</button>
                </div>
                 </form>
            </div>
        </div>
    </div>
    <div class="modal inmodal" id="myModal3" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated fadeIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>                                     
                    <h6 class="modal-title">Agregar CD/DVD</h6>
                </div>
                <form class="form-horizontal" id="fdvd">
                <div class="modal-body">
                    
                        <div class="form-group">
                            <label class="col-md-4 control-label">CD/DVD</label>
                            <div class="col-md-8"><input type="text" placeholder="CD/DVD" class="form-control" name="ldvd" id="ldvd" required></div>
                        </div> 
                   
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" name="gdvd" id="gdvd">Guardar</button>
                </div>
                 </form>
            </div>
        </div>
    </div>
    <div class="modal inmodal" id="myModal4" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated fadeIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>                                     
                    <h6 class="modal-title">Agregar Direccion IP</h6>
                </div>
                <form class="form-horizontal" id="fdireccion">
                <div class="modal-body">
                    
                        <div class="form-group">
                            <label class="col-md-4 control-label">Direccion IP</label>
                            <div class="col-md-8"><input type="text" placeholder="Direccion IP" class="form-control" name="ldireccion" id="ldireccion" required></div>
                        </div> 
                   
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" name="gdireccion" id="gdireccion">Guardar</button>
                </div>
                 </form>
            </div>
        </div>
    </div>
    <div class="modal inmodal" id="myModal5" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated fadeIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>                                     
                    <h6 class="modal-title">Agregar Dominio</h6>
                </div>
                <form class="form-horizontal" id="fdominio">
                <div class="modal-body">
                    
                        <div class="form-group">
                            <label class="col-md-4 control-label">Dominio</label>
                            <div class="col-md-8"><input type="text" placeholder="Dominio" class="form-control" name="ldominio" id="ldominio" required></div>
                        </div> 
                   
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" name="gdominio" id="gdominio">Guardar</button>
                </div>
                 </form>
            </div>
        </div>
    </div>
    <div class="modal inmodal" id="myModal6" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated fadeIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>                                     
                    <h6 class="modal-title">Agregar Estado de Equipo</h6>
                </div>
                <form class="form-horizontal" id="festado">
                <div class="modal-body">
                    
                        <div class="form-group">
                            <label class="col-md-4 control-label">Estado de Equipo</label>
                            <div class="col-md-8"><input type="text" placeholder="Estado de Equipo" class="form-control" name="lestado" id="lestado" required></div>
                        </div> 
                   
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" name="gestado" id="gestado">Guardar</button>
                </div>
                 </form>
            </div>
        </div>
    </div>
    <div class="modal inmodal" id="myModal7" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated fadeIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>                                     
                    <h6 class="modal-title">Agregar Nivel</h6>
                </div>
                <form class="form-horizontal" id="fnivel">
                <div class="modal-body">
                    
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nivel</label>
                            <div class="col-md-8"><input type="text" placeholder="Nivel" class="form-control" name="lnivel" id="lnivel" required></div>
                        </div> 
                   
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" name="gestado" id="gestado">Guardar</button>
                </div>
                 </form>
            </div>
        </div>
    </div>
    <!-- Mainly scripts -->
    <script src="public/js/jquery-2.1.1.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="public/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="public/js/plugins/jeditable/jquery.jeditable.js"></script>


    <!-- Custom and plugin javascript -->
    <script src="public/js/inspinia.js"></script>
    <script src="public/js/plugins/pace/pace.min.js"></script>
    
   <!-- Toastr -->
    <script src="public/js/plugins/toastr/toastr.min.js"></script>

    <script>
        $(document).ready(function() {    
          $(".select2_demo_1").select2();  
           
        });
        
        $("#ftipoequipo").submit(function(event){ 
 	    event.preventDefault(); 
	    var tipoequipo = $("#ltipoequipo").val();
        var x = document.getElementById("stipoequipo");
        var option = document.createElement("option");
        option.text = tipoequipo;
        option.name = tipoequipo;   
        x.add(option, x[0]);
        x.selectedIndex = 0;
        
            $.ajax({
                type:"POST",
                url: "consultas.php",
                dataType:"text",
                data:{
                    funcion:"guardartipoequipo",
                    tipoequipo:tipoequipo,
                }
            }).done(function(data) {
                $('#myModal1').modal('hide');
            });
        
        });
        
         $("#fnivel").submit(function(event){ 
 	    event.preventDefault(); 
	    var name = $("#lnivel").val();
        var x = document.getElementById("snivel");
        var option = document.createElement("option");
        option.text = name;
        option.name = name;   
        x.add(option, x[0]);
        x.selectedIndex = 0;
        
            $.ajax({
                type:"POST",
                url: "consultas.php",
                dataType:"text",
                data:{
                    funcion:"guardarnivel",
                    name:name,
                }
            }).done(function(data) {
                $('#myModal7').modal('hide');
            });
        
        });
        
         $("#fmarca").submit(function(event){ 
 	    event.preventDefault(); 
	    var name = $("#lmarca").val();
        var x = document.getElementById("smarca");
        var option = document.createElement("option");
        option.text = name;
        option.name = name;   
        x.add(option, x[0]);
        x.selectedIndex = 0;
        
            $.ajax({
                type:"POST",
                url: "consultas.php",
                dataType:"text",
                data:{
                    funcion:"guardarmarca",
                    name:name,
                }
            }).done(function(data) {
                $('#myModal2').modal('hide');
            });
        
        });
        
        $("#fdvd").submit(function(event){ 
 	    event.preventDefault(); 
	    var name = $("#ldvd").val();
        var x = document.getElementById("sdvd");
        var option = document.createElement("option");
        option.text = name;
        option.name = name;   
        x.add(option, x[0]);
        x.selectedIndex = 0;
        
            $.ajax({
                type:"POST",
                url: "consultas.php",
                dataType:"text",
                data:{
                    funcion:"guardardvd",
                    name:name,
                }
            }).done(function(data) {
                $('#myModal3').modal('hide');
            });
        
        });
        
        $("#fdireccion").submit(function(event){ 
 	    event.preventDefault(); 
	    var name = $("#ldireccion").val();
        var x = document.getElementById("sdireccion");
        var option = document.createElement("option");
        option.text = name;
        option.name = name;   
        x.add(option, x[0]);
        x.selectedIndex = 0;
        
            $.ajax({
                type:"POST",
                url: "consultas.php",
                dataType:"text",
                data:{
                    funcion:"guardardireccion",
                    name:name,
                }
            }).done(function(data) {
                $('#myModal4').modal('hide');
            });
        
        });
        
        $("#fdominio").submit(function(event){ 
 	    event.preventDefault(); 
	    var name = $("#ldominio").val();
        var x = document.getElementById("sdominio");
        var option = document.createElement("option");
        option.text = name;
        option.name = name;   
        x.add(option, x[0]);
        x.selectedIndex = 0;
        
            $.ajax({
                type:"POST",
                url: "consultas.php",
                dataType:"text",
                data:{
                    funcion:"guardardominio",
                    name:name,
                }
            }).done(function(data) {
                $('#myModal5').modal('hide');
            });
        
        });
        
        $("#festado").submit(function(event){ 
 	    event.preventDefault(); 
	    var name = $("#lestado").val();
        var x = document.getElementById("sestado");
        var option = document.createElement("option");
        option.text = name;
        option.name = name;   
        x.add(option, x[0]);
        x.selectedIndex = 0;
        
            $.ajax({
                type:"POST",
                url: "consultas.php",
                dataType:"text",
                data:{
                    funcion:"guardarestado",
                    name:name,
                }
            }).done(function(data) {
                $('#myModal6').modal('hide');
            });
        
        });
        
        $("#nuevo").submit(function(event){ 
 	    event.preventDefault(); 
	    var sisinstitucionales = $("#sisinstitucionales").val();
        var otrossoftwares = $("#otrossoftware").val();
        var observaciones = $("#observaciones").val();
            var tipoequipo = $("#stipoequipo").val();
            var nivel = $("#snivel").val();
            var ubicacion = $("#ubicacion").val();
            var nombreuser = $("#nombreuser").val();
            var centrocosto = $("#centrocosto").val();
            var numeroinv = $("#numeroinv").val();
            var smarca = $("#smarca").val();
            var modelo = $("#modelo").val();
            var serie = $("#serie").val();
            var marcamodelo = $("#marcamodelo").val();
            var velocidad = $("#velocidad").val();
            var svelocidad = $("#svelocidad").val();
            var ram = $("#ram").val();
            var sram = $("#sram").val();
            var hdd = $("#hdd").val();
            var shdd = $("#shdd").val();
            var sdvd = $("#sdvd").val();
            var sisoperativo = $("#sisoperativo").val();
            var licenciaso = $("#licenciaso").val();
            var versionofice = $("#versionofice").val();
            var licenciaofice = $("#licenciaofice").val();
            var equiponombre = $("#equiponombre").val();
            var sdireccion = $("#sdireccion").val();
            var sdominio = $("#sdominio").val();
            var fechaadqui = $("#fechaadqui").val();
            var fechagarantia = $("#fechagarantia").val();
            var sestado = $("#sestado").val();
            
        $.ajax({
                type:"POST",
                url: "consultas.php",
                dataType:"text",
                data:{
                    funcion:"guardarinven",
                    sisinstitucionales:sisinstitucionales,
                    otrossoftwares:otrossoftwares,
                    observaciones:observaciones,
                    tipoequipo:tipoequipo,
                    nivel:nivel,
                    ubicacion:ubicacion,
                    nombreuser:nombreuser,
                    centrocosto:centrocosto,
                    numeroinv:numeroinv,
                    smarca:smarca,
                    modelo:modelo,
                    serie:serie,
                    marcamodelo:marcamodelo,
                    velocidad:velocidad,
                    svelocidad:svelocidad,
                    ram:ram,
                    sram:sram,
                    hdd:hdd,
                    shdd:shdd,
                    sdvd:sdvd,
                    sisoperativo:sisoperativo,
                    licenciaso:licenciaso,
                    versionofice:versionofice,
                    licenciaofice:licenciaofice,
                    equiponombre:equiponombre,
                    sdireccion:sdireccion,
                    sdominio:sdominio,
                    fechaadqui:fechaadqui,
                    fechagarantia:fechagarantia,
                    sestado:sestado, 
                }
            }).done(function(data) {
                $('body, html').animate({
			         scrollTop: '0px'
		          }, 300);
                $('.custom-alert').fadeIn();
            });
        });
    </script>
</body>
</html>