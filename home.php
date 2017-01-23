<?php
session_start();
if(!isset($_SESSION['usuario']) && !isset($_SESSION['val'])){
	header("Location:class/sesion/signout.php");
}
include("class/conexion/conexion.php");
$conn = new Conexion();
$conn->conectar();
$acentos = $conn->query("SET NAMES 'utf8'");
$query="SELECT * FROM inventario order by ubicacion";
$resp= $conn->query($query);
$num = mysqli_num_rows($resp);
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INICIO | Dashboard</title>

    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/font-awesome/css/font-awesome.css" rel="stylesheet">


    <link href="public/css/animate.css" rel="stylesheet">
    <link href="public/css/style.css" rel="stylesheet">
   
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.css"/>

</head>

<body>
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
                <a href="nuevo.php" class="btn btn-primary">Agregar Nuevo</a>
                <div class="ibox-tools">
                    <a class="mibtn" href="#"><i class="fa fa-file-pdf-o"></i></a>
                    <a class="mibtn" href="#"><i class="fa fa-file-excel-o"></i></a>
                </div>
            </div>
            <div class="ibox-content">
            <div class="">
                                                  
            </div>
            <div class="">
            <table class="table table-striped table-bordered table-hover " id="mitable" >
            <thead>
            <tr>
                
                <th>Tipo de Equipo</th>
                <th>Ubicación</th>
                <th>Nombre de Usuario</th>
                <th>Centro de Costo</th>
                <th>Número de Inventario</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Serie</th>
                <th>Marca Modelo</th>
                <th>Veloc.</th>
                <th>RAM</th>
                <th>HDD</th>
                <th>CD/DVD</th>
                <th>Sistema Operativo</th>
                <th>Licencia S.O.</th>
                <th>Versión de Office</th>
                <th>Licencia de Office</th>
                <th>Sistemas Institucionales</th>                
                <th>Acciones</th>
                <th>Otros Software (Utilitarios)</th>
                <th>Nombre del Equipo</th>
                <th>Dirección IP</th>
                <th>Nombre de Dominio</th>
                <th>Fecha de Adquisición</th>
                <th>Fecha Vencimiento Garantía</th>
                <th>Estado del Equipo</th>
                <th>OBSERVACIONES</th>
                
            </tr>
            </thead>
            <tbody>
            <?php if($num >0){ 
                while($inv = mysqli_fetch_array($resp,MYSQLI_ASSOC)){?>
                <tr>
                    
                    <td><?php echo $inv['tipo_equipo'];?></td>
                    <td><?php echo $inv['ubicacion'];?></td>
                    <td><?php echo $inv['usuario'];?></td>
                    <td><?php echo $inv['centro_costo'];?></td>
                    <td><?php echo $inv['numero_inventario'];?></td>
                    <td><?php echo $inv['marca'];?></td>
                    <td><?php echo $inv['modelo'];?></td>
                    <td><?php echo $inv['serie'];?></td>
                    <td><?php echo $inv['marca_modelo'];?></td>
                    <td><?php echo $inv['velocidad'];?></td>
                    <td><?php echo $inv['ram'];?></td>
                    <td><?php echo $inv['hdd'];?></td>
                    <td><?php echo $inv['cd_dvd'];?></td>
                    <td><?php echo $inv['sistema_operativo'];?></td>
                    <td><?php echo $inv['licencia'];?></td>
                    <td><?php echo $inv['version_office'];?></td>
                    <td><?php echo $inv['licencia_office'];?></td>
                    <td>
                    <?php 
                      $query2="SELECT * FROM sistemas_institucionales where id_inventario=".$inv['id'];
                      $resp2= $conn->query($query2);
                      $num2 = mysqli_num_rows($resp2);
                    ?>
                    <ul>
                        <?php if($num2 >0){ 
                                while($name = mysqli_fetch_array($resp2,MYSQLI_ASSOC)){?>
                                <li><?php echo $name['nombre'];?></li>
                            <?php }} ?>
                    </ul>
                    </td>
                    <td>  
                    <a href="modificar.php?id=<?php echo $inv['id']; ?>" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>                                                                           
                    <button class="btn btn-primary btn-circle" type="button" id="eliminar" onClick="confirmacion('<?php echo $inv['id']; ?>')"><i class="fa fa-times"></i></button>                    
                    </td>
                    <td>
                    <?php 
                      $query2="SELECT * FROM otros_software where id_inventario=".$inv['id'];
                      $resp2= $conn->query($query2);
                      $num2 = mysqli_num_rows($resp2);
                    ?>
                    <ul>
                        <?php if($num2 >0){ 
                                while($name = mysqli_fetch_array($resp2,MYSQLI_ASSOC)){?>
                                <li><?php echo $name['nombre'];?></li>
                            <?php }} ?>
                    </ul>
                    </td>                    
                    <td><?php echo $inv['nombre_equipo'];?></td>
                    <td><?php echo $inv['direccionip'];?></td>
                    <td><?php echo $inv['nombre_dominio'];?></td>
                    <td><?php echo $inv['fecha_adquisicion'];?></td>
                    <td><?php echo $inv['fecha_vencimiento'];?></td>
                    <td><?php echo $inv['estado_equipo'];?></td>
                    <td>
                    <?php 
                      $query2="SELECT * FROM observaciones where id_inventario=".$inv['id'];
                      $resp2= $conn->query($query2);
                      $num2 = mysqli_num_rows($resp2);
                    ?>
                    <ul>
                        <?php if($num2 >0){ 
                                while($name = mysqli_fetch_array($resp2,MYSQLI_ASSOC)){?>
                                <li><?php echo $name['nombre'];?></li>
                            <?php }} ?>
                    </ul>
                    </td>
                </tr>
            <?php }} ?>
            </tbody>
            </table>
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

    <!-- Data Tables -->
   
    
    <script type="text/javascript" src="DataTables/datatables.js"></script>
    
    <script>
       
        $(document).ready(function() {
            
     
            $('#mitable').dataTable( {
            "pagingType": "scrolling",
                scrollY:        "500px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         false,
        responsive: true,
        } );

        });        
    </script>
    <script type="text/javascript">
    function confirmacion(x){
        var conf = confirm("¿Estas Seguro?");
        if(conf == true){
            $.ajax({
                type:"POST",
                url: "consultas.php",
                dataType:"text",
                data:{
                    funcion:"eliminarregistro",
                    invenid: x,
                },
                success:  function (response) {                    
                        alert("Registro eliminado exitosamente.");
                        location.reload(true);                             
                }
            })
        }
    }
    </script>
</body>


</html>