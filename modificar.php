<?php
session_start();
if(!isset($_SESSION['usuario']) && !isset($_SESSION['val'])){
    header("Location:class/sesion/signout.php");
}
include("class/conexion/conexion.php");
$conn = new Conexion();
$conn->conectar();
$acentos = $conn->query("SET NAMES 'utf8'");

if(isset($_GET['id'])){
    $idinv = $_GET['id'];  
    
    $sql = "SELECT * FROM inventario WHERE id=".$idinv;
    $rs = $conn->insert_delete_update($sql);
    $cant = mysqli_num_rows($rs);
     if($cant >0){ 
        while($datos = mysqli_fetch_array($rs,MYSQLI_ASSOC)){
            $equipe_type = $datos['tipo_equipo'];
            $nivels = $datos['nivel'];
            $ubicacion = $datos['ubicacion'];
            $nombre_usuario = $datos['usuario'];
            $centro_costo = $datos['centro_costo'];
            $num_inventario = $datos['numero_inventario'];
            $marcas = trim($datos['marca']);
            $modelo = $datos['modelo'];
            $serie = $datos['serie'];
            $marca_modelo = $datos['marca_modelo'];
            $veloc_proce = $datos['velocidad'];
            $ram = $datos['ram'];
            $disco_duro = $datos['hdd'];
            $lector = $datos['cd_dvd'];
            $so = $datos['sistema_operativo'];
            $key = $datos['licencia'];
            $offi_Version = $datos['version_office'];
            $office_key = $datos['licencia_office'];
            $nombre_equipo = $datos['nombre_equipo'];
            $ip = $datos['direccionip'];
            $domain = $datos['nombre_dominio'];
            $adquisicion = $datos['fecha_adquisicion'];
            $expira = $datos['fecha_vencimiento'];
            $estados = $datos['estado_equipo'];
        }}
    $velocidad_num = (double) substr($veloc_proce, 0, -3);    
    $ram_num = (integer) substr($veloc_proce, 0, -2);
    $tipo_ram = substr($veloc_proce, -2); 
    $hdd_Cap = (integer) substr($veloc_proce, 0, -2);
    $tipo_hdd = substr($veloc_proce, -2); 

    $sql2 = "SELECT * FROM observaciones WHERE id_inventario=".$idinv;
    $rs2 = $conn->insert_delete_update($sql2);
    $cant2 = mysqli_num_rows($rs2);

    $sql3 = "SELECT * FROM sistemas_institucionales WHERE id_inventario=".$idinv;
    $rs3 = $conn->insert_delete_update($sql3);
    $cant3 = mysqli_num_rows($rs3);

    $sql4 = "SELECT * FROM otros_software WHERE id_inventario=".$idinv;
    $rs4 = $conn->insert_delete_update($sql4);
    $cant4 = mysqli_num_rows($rs4);
}

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
$conn->desconectar();
?>

<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modificar | Update</title>

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
                                        <h3>Modificar Registro <?php echo $num_inventario ?></h3>   
                                    </div>
                                    <div class="ibox-content">
                                    <form class="form-horizontal" name="updated" id="updated" method="POST">
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
                                                        <option value="<?php echo $tipo_equipo['nombre'];?>" <?php echo $tipo_equipo['nombre'] == $equipe_type ? 'selected' : ''?> ><?php echo $tipo_equipo['nombre']; ?></option>
                                                        
                                                     <?php }} ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Nivel</label>
                                            <div class="col-md-5">
                                                <select class="select2_demo_1 form-control" name="snivel" id="snivel">
                                                    <?php if($num7 >0){ 
                                                        while($nivel = mysqli_fetch_array($resp7,MYSQLI_ASSOC)){?>
                                                        <option value="<?php echo $nivel['nombre'];?>" <?php echo $nivel['nombre'] == $nivels ? 'selected' : ''?> ><?php echo $nivel['nombre'];?></option>
                                                    <?php }} ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Ubicacion</label>
                                            <div class="col-lg-5"><input type="text" value="<?php echo $ubicacion;?>" class="form-control" name="ubicacion" id="ubicacion"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Nombre de Usuario</label>
                                            <div class="col-lg-5"><input type="text" value="<?php echo $nombre_usuario;?>" class="form-control" name="nombreuser" id="nombreuser" ></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Centro de Costo</label>
                                            <div class="col-lg-5"><input type="number" value="<?php echo $centro_costo;?>" class="form-control" name="centrocosto" id="centrocosto" ></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Numero de Inventario</label>
                                            <div class="col-lg-5"><input type="text" value="<?php echo $num_inventario;?>" class="form-control" min="0" name="numeroinv" id="numeroinv" ></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Marca</label>
                                            <div class="col-md-5">
                                                <select class="select2_demo_1 form-control" name="smarca" id="smarca">
                                                    <?php if($num2 >0){ 
                                                        while($marca = mysqli_fetch_array($resp2,MYSQLI_ASSOC)){?>
                                                        <option value="<?php echo $marca['nombre'];?>" <?php echo $marca['nombre'] == $marcas ? 'selected' : ''?> ><?php echo $marca['nombre'];?></option>
                                                    <?php }} ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Modelo</label>
                                           <div class="col-lg-5"><input type="text" value="<?php echo $modelo;?>" class="form-control" name="modelo" id="modelo" ></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Serie</label>
                                            <div class="col-lg-5"><input type="text" value="<?php echo $serie;?>" class="form-control" name="serie" id="serie" ></div>
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
                                            <div class="col-lg-5"><input type="text" placeholder="Marca y Modelo" value="<?php echo $marca_modelo;?>" class="form-control" name="marcamodelo" id="marcamodelo" ></div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Velocidad</label>
                                            <div class="col-md-4"><input type="number" step='0.01' value="<?php echo $velocidad_num;?>" class="form-control" name="velocidad" id="velocidad" ></div>
                                            <div class="col-md-1">
                                                <select class="form-control" name="svelocidad" id="svelocidad" disabled>
                                                    <option value="GHz">GHz</option>
                                                </select>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">RAM</label>
                                            <div class="col-md-4"><input type="number" value="<?php echo $ram_num;?>" class="form-control" name="ram" id="ram" ></div>
                                            <div class="col-md-1">
                                                <select class="form-control" name="sram" id="sram">
                                                    <option value="GB" <?php echo $tipo_ram == 'GB' ? 'selected' : ''?> >GB</option>
                                                    <option value="MB" <?php echo $tipo_ram == 'MB' ? 'selected' : ''?> >MB</option>
                                                </select>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">HDD</label>
                                            <div class="col-md-4"><input type="number" value="<?php echo $hdd_Cap;?>" class="form-control" name="hdd" id="hdd" ></div>
                                            <div class="col-md-1">
                                                <select class="form-control" name="shdd" id="shdd">
                                                    <option value="TB" <?php echo $tipo_hdd == 'TB' ? 'selected' : ''?> >TB</option>
                                                     <option value="GB" <?php echo $tipo_hdd == 'GB' ? 'selected' : ''?> >GB</option>
                                                     <option value="MB" <?php echo $tipo_hdd == 'MB' ? 'selected' : ''?> >MB</option>
                                                </select>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">CD/DVC</label>
                                            <div class="col-md-5">
                                                <select class="select2_demo_1 form-control" name="sdvd" id="sdvd">
                                                    <?php if($num3 >0){ 
                                                        while($dvd = mysqli_fetch_array($resp3,MYSQLI_ASSOC)){?>
                                                        <option value="<?php echo $dvd['nombre'];?>" <?php echo $dvd['nombre'] == $lector ? 'selected' : ''?> ><?php echo $dvd['nombre'];?></option>
                                                    <?php }} ?>
                                                </select>
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
                                            <div class="col-lg-5"><input type="text"  value="<?php echo $so;?>" class="form-control" name="sisoperativo" id="sisoperativo" ></div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Licencia S.O.</label>
                                            <div class="col-lg-5"><input type="text"  value="<?php echo $key;?>" class="form-control" name="licenciaso" id="licenciaso" ></div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Version de Office</label>
                                            <div class="col-lg-5"><input type="text"  value="<?php echo $offi_Version;?>" class="form-control" name="versionofice" id="versionofice" ></div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Licencia de Office</label>
                                            <div class="col-lg-5"><input type="text"  value="<?php echo $office_key;?>" class="form-control" name="licenciaofice" id="licenciaofice" ></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Sistemas Institucionales</label>
                                            <div class="col-lg-5">
                                            <textarea rows="4" type="text" class="form-control" name="sisinstitucionales" id="sisinstitucionales"><?php if($cant3>0){while($insti=mysqli_fetch_array($rs3,MYSQLI_ASSOC)){?><?php echo $insti['nombre']."\n";?><?php }}?></textarea>                                            
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Otros Software(Utilitarios)</label>
                                            <div class="col-lg-5">
                                            <textarea rows="4" type="text" class="form-control" name="otrossoftware" id="otrossoftware"><?php if($cant4>0){while($other=mysqli_fetch_array($rs4,MYSQLI_ASSOC)){?><?php echo $other['nombre']."\n";?><?php }}?></textarea>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <div class="col-md-offset-2 col-md-10">
                                                <h3>IDENTIFICACI&Oacute;N DE RED</h3>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Nombre del Equipo</label>
                                            <div class="col-lg-5"><input type="text" value="<?php echo $nombre_equipo;?>" class="form-control" name="equiponombre" id="equiponombre" ></div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Direcci&oacute;n IP</label>
                                            <div class="col-md-5">
                                                <select class="select2_demo_1 form-control" name="sdireccion" id="sdireccion">
                                                    <?php if($num4 >0){ 
                                                        while($direccion = mysqli_fetch_array($resp4,MYSQLI_ASSOC)){?>
                                                        <option value="<?php echo $direccion['nombre'];?>" <?php echo $direccion['nombre'] == $ip ? 'selected' : ''?> ><?php echo $direccion['nombre'];?></option>
                                                    <?php }} ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Nombre del Dominio</label>
                                            <div class="col-md-5">
                                                <select class="select2_demo_1 form-control" name="sdominio" id="sdominio">
                                                    <?php if($num5 >0){ 
                                                        while($dominio = mysqli_fetch_array($resp5,MYSQLI_ASSOC)){?>
                                                        <option value="<?php echo $dominio['nombre'];?>" <?php echo $dominio['nombre'] == $domain ? 'selected' : ''?> ><?php echo $dominio['nombre'];?></option>
                                                    <?php }} ?>
                                                </select>
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
                                            <div class="col-lg-5"><input type="text" value="<?php echo $adquisicion;?>" class="form-control" name="fechaadqui" id="fechaadqui" ></div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Fecha de Vencimiento de Garant&iacute;a</label>
                                            <div class="col-lg-5"><input type="text" value="<?php echo $expira;?>" class="form-control" name="fechagarantia" id="fechagarantia" ></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Estado del Equipo</label>
                                            <div class="col-md-5">
                                                <select class="select2_demo_1 form-control" name="sestado" id="sestado">
                                                    <?php if($num6 >0){ 
                                                        while($estado = mysqli_fetch_array($resp6,MYSQLI_ASSOC)){?>
                                                        <option value="<?php echo $estado['nombre'];?>" <?php echo $estado['nombre'] == $estados ? 'selected' : ''?> ><?php echo $estado['nombre'];?></option>
                                                    <?php }} ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Observaciones</label>
                                            <div class="col-lg-5">
                                            <textarea rows="4" type="text" class="form-control" name="observaciones" id="observaciones"><?php if($cant2>0){while($observas=mysqli_fetch_array($rs2,MYSQLI_ASSOC)){?><?php echo $observas['nombre']."\n";?><?php }}?></textarea>
                                            </div>
                                        </div>  
                                        <div class="form-group">
                                        <div class="col-md-offset-2 col-md-10">                                                                                     
                                            <a href="home.php"><button  class="btn btn-outline btn-danger" type="button"><i class="fa fa-reply"></i>&nbsp;Cancelar</button></a>
                                            <input type="hidden" name="idreg" id="idreg" value="<?php echo $idinv;?>"></input>
                                            <button data-toggle="submit" class="btn btn-outline btn-primary" ><i class="fa fa-check"></i>&nbsp;Modificar</button>
                                        </div>
                                    </div>   
                                    </form>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                </div>                
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
    $(document).ready(function () {        });
        $("#updated").submit(function(){
            
            
            var stipoequipo = $("#stipoequipo").val();
            var snivel = $("#snivel").val();
            var subicacion = $("#ubicacion").val();
            var snombreuser = $("#nombreuser").val();
            var scentrocosto = $("#centrocosto").val();
            var snumeroinv = $("#numeroinv").val();
            var ssmarca = $("#smarca").val();
            var smodelo = $("#modelo").val();
            var sserie = $("#serie").val();
            var smarcamodelo = $("#marcamodelo").val();
            var svelocidad = $("#velocidad").val();
            var ssvelocidad = $("#svelocidad").val();
            var sram = $("#ram").val();
            var ssram = $("#sram").val();
            var shdd = $("#hdd").val();
            var sshdd = $("#shdd").val();
            var ssdvd = $("#sdvd").val();
            var ssisoperativo = $("#sisoperativo").val();
            var slicenciaso = $("#licenciaso").val();
            var sversionofice = $("#versionofice").val();
            var slicenciaofice = $("#licenciaofice").val();
            var ssisinstitucionales = $("#sisinstitucionales").val();
            var sotrossoftwares = $("#otrossoftware").val();
            var sequiponombre = $("#equiponombre").val();
            var ssdireccion = $("#sdireccion").val();
            var ssdominio = $("#sdominio").val();
            var sfechaadqui = $("#fechaadqui").val();
            var sfechagarantia = $("#fechagarantia").val();
            var ssestado = $("#sestado").val();
            var sobservaciones = $("#observaciones").val();
            var sidreg = $("#idreg").val();
            
           
            $.ajax({
                type:"POST",
                url: "consultas.php",
                dataType:"text",
                data:{
                    funcion:"update-registro",                                        
                    tipoequipo:stipoequipo,
                    nivel:snivel,
                    ubicacion:subicacion,
                    nombreuser:snombreuser,
                    centrocosto:scentrocosto,
                    numeroinv:snumeroinv,
                    smarca:ssmarca,
                    modelo:smodelo,
                    serie:sserie,
                    marcamodelo:smarcamodelo,
                    velocidad:svelocidad,
                    svelocidad:ssvelocidad,
                    ram:sram,
                    sram:ssram,
                    hdd:shdd,
                    shdd:sshdd,
                    sdvd:ssdvd,
                    sisoperativo:ssisoperativo,
                    licenciaso:slicenciaso,
                    versionofice:sversionofice,
                    licenciaofice:slicenciaofice,
                    sisinstitucionales:ssisinstitucionales,
                    otrossoftwares:sotrossoftwares,
                    equiponombre:sequiponombre,
                    sdireccion:ssdireccion,
                    sdominio:ssdominio,
                    fechaadqui:sfechaadqui,
                    fechagarantia:sfechagarantia,
                    sestado:ssestado,
                    observaciones:sobservaciones, 
                    idregistro:sidreg,
                },
                success : function() {
                        alert("Usuario Actualiado Correctamente");                        
                        window.history.go(-1);
                        }
            });
            alert("funca");                              
        });
    
    </script>

</body>
</html>