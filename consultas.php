<?php 
session_start();
include("class/conexion/conexion.php");
$conn = new Conexion();


if(!isset($_SESSION['usuario']) && !isset($_SESSION['val'])){
	header("Location:class/sesion/signout.php");
}
 if(isset($_POST['funcion'])){
	 $funcion = $_POST['funcion'];
     switch($funcion){
         case "guardartipoequipo":
             $tipoequipo = $_POST['tipoequipo'];
             $conn->conectar();
             $sql = "INSERT INTO tipo_equipo(nombre) values ('$tipoequipo')";
             $rs = $conn->insert_delete_update($sql);
             $conn->desconectar();
             break;
          case "guardarnivel":
             $name = $_POST['name'];
             $conn->conectar();
             $sql = "INSERT INTO nivel(nombre) values ('$name')";
             $rs = $conn->insert_delete_update($sql);
             $conn->desconectar();
             break;
          case "guardarmarca":
             $name = $_POST['name'];
             $conn->conectar();
             $sql = "INSERT INTO marca(nombre) values ('$name')";
             $rs = $conn->insert_delete_update($sql);
             $conn->desconectar();
             break;
          case "guardardvd":
             $name = $_POST['name'];
             $conn->conectar();
             $sql = "INSERT INTO dvd(nombre) values ('$name')";
             $rs = $conn->insert_delete_update($sql);
             $conn->desconectar();
             break;
          case "guardardireccion":
             $name = $_POST['name'];
             $conn->conectar();
             $sql = "INSERT INTO direccion(nombre) values ('$name')";
             $rs = $conn->insert_delete_update($sql);
             $conn->desconectar();
             break;
          case "guardardominio":
             $name = $_POST['name'];
             $conn->conectar();
             $sql = "INSERT INTO dominio(nombre) values ('$name')";
             $rs = $conn->insert_delete_update($sql);
             $conn->desconectar();
             break;
          case "guardarestado":
             $name = $_POST['name'];
             $conn->conectar();
             $sql = "INSERT INTO estado_equipo(nombre) values ('$name')";
             $rs = $conn->insert_delete_update($sql);
             $conn->desconectar();
             break;
          case 'eliminarregistro':
              $invenid = $_POST['invenid'];
              $conn = new Conexion();
              $conn->conectar();
              $query = "DELETE FROM sistemas_institucionales WHERE id_inventario=".$invenid;
              $query2 = "DELETE FROM otros_software WHERE id_inventario=".$invenid;
              $query3 = "DELETE FROM observaciones WHERE id_inventario=".$invenid;
              $query4 = "DELETE FROM inventario WHERE id=".$invenid;
              $rs = $conn->insert_delete_update($query);
              $rs1 = $conn->insert_delete_update($query2);
              $rs2 = $conn->insert_delete_update($query3);
              $rs3 = $conn->insert_delete_update($query4);
              $conn->desconectar();              
              break;
          case "update-registro":
                    $tipoequipo = $_POST['tipoequipo'];
                    $nivel = $_POST['nivel'];
                    $ubicacion = $_POST['ubicacion'];
                    $nombreuser = $_POST['nombreuser'];
                    $centrocosto = $_POST['centrocosto'];
                    $numeroinv = $_POST['numeroinv'];
                    $smarca = $_POST['smarca'];
                    $modelo = $_POST['modelo'];
                    $serie = $_POST['serie'];
                    $marcamodelo = $_POST['marcamodelo'];
                    $velocidad = $_POST['velocidad']." ".$_POST['svelocidad'];
                    $ram = $_POST['ram']." ".$_POST['sram'];
                    $hdd = $_POST['hdd']." ".$_POST['shdd'];
                    $sdvd = $_POST['sdvd'];
                    $sisoperativo = $_POST['sisoperativo'];
                    $licenciaso = $_POST['licenciaso'];
                    $versionofice = $_POST['versionofice'];
                    $licenciaofice = $_POST['licenciaofice'];
                    $equiponombre = $_POST['equiponombre'];
                    $sdireccion = $_POST['sdireccion'];
                    $sdominio = $_POST['sdominio'];
                    $fechaadqui = $_POST['fechaadqui'];
                    $fechagarantia = $_POST['fechagarantia'];
                    $sestado = $_POST['sestado'];  
                    $idupdated = $_POST['idregistro'],

              $conn->conectar();
              $acentos = $conn->query("SET NAMES 'utf8'");

              if($_POST['sisinstitucionales']!=""){
                $ref_sisinstitucionales = $_POST['sisinstitucionales'];
                $ref_sisinstitucionales = preg_split("/\r\n|\r|\n/", $ref_sisinstitucionales);
                foreach($ref_sisinstitucionales as $valor){
                  $sql1 = "UPDATE sistemas_institucionales SET nombre='$valor' WHERE id_inventario=".$idupdated;
                  $rs1 = $conn->insert_delete_update($sql1);
                }  
              }

              if($_POST['otrossoftwares']!=""){
                $ref_otrossoftwares = $_POST['otrossoftwares'];
                $ref_otrossoftwares = preg_split("/\r\n|\r|\n/", $ref_otrossoftwares);
                foreach($ref_otrossoftwares as $valor){
                   $sql2 = "UPDATE otros_software SET nombre='$valor' WHERE id_inventario=".$idupdated;
                    $rs2 = $conn->insert_delete_update($sql2);
                }  
              }
              if($_POST['observaciones']!=""){
                $ref_observaciones = $_POST['observaciones'];
                $ref_observaciones = preg_split("/\r\n|\r|\n/", $ref_observaciones);
                foreach($ref_observaciones as $valor){
                    $sql3 = "UPDATE observaciones SET nombre='$valor' WHERE id_inventario=".$idupdated;
                    $rs3 = $conn->insert_delete_update($sql3);
                }  
              }

              $sqlup = "UPDATE inventario SET tipo_equipo='$tipoequipo', nivel='$nivel', ubicacion='$ubicacion', usuario='$nombreuser', centro_costo='$centrocosto', numero_inventario='$numeroinv', marca='$smarca', modelo='$modelo', serie='$serie', marca_modelo='$marcamodelo', velocidad='$velocidad', ram='$ram', hdd='$hdd', cd_dvd='$sdvd', sistema_operativo='$sisoperativo', licencia='$licenciaso', 
                version_office='$versionofice', licencia_office='$licenciaofice', nombre_equipo='$equiponombre', direccionip='$sdireccion', nombre_dominio='$sdominio', fecha_adquisicion='$fechaadqui', fecha_vencimiento='$fechagarantia', estado_equipo='$sestado' WHERE id=".$idupdated;
              $rsup = $conn->insert_delete_update($sqlup);
              $conn->desconectar();
            break;
          case "guardarinven":
                    $tipoequipo = $_POST['tipoequipo'];
                    $nivel = $_POST['nivel'];
                    $ubicacion = $_POST['ubicacion'];
                    $nombreuser = $_POST['nombreuser'];
                    $centrocosto = $_POST['centrocosto'];
                    $numeroinv = $_POST['numeroinv'];
                    $smarca = $_POST['smarca'];
                    $modelo = $_POST['modelo'];
                    $serie = $_POST['serie'];
                    $marcamodelo = $_POST['marcamodelo'];
                    $velocidad = $_POST['velocidad']." ".$_POST['svelocidad'];
                    $ram = $_POST['ram']." ".$_POST['sram'];
                    $hdd = $_POST['hdd']." ".$_POST['shdd'];
                    $sdvd = $_POST['sdvd'];
                    $sisoperativo = $_POST['sisoperativo'];
                    $licenciaso = $_POST['licenciaso'];
                    $versionofice = $_POST['versionofice'];
                    $licenciaofice = $_POST['licenciaofice'];
                    $equiponombre = $_POST['equiponombre'];
                    $sdireccion = $_POST['sdireccion'];
                    $sdominio = $_POST['sdominio'];
                    $fechaadqui = $_POST['fechaadqui'];
                    $fechagarantia = $_POST['fechagarantia'];
                    $sestado = $_POST['sestado'];
             $conn->conectar();
             $acentos = $conn->query("SET NAMES 'utf8'");
             $sql = "INSERT INTO inventario(tipo_equipo,nivel,ubicacion,usuario,centro_costo,numero_inventario,marca,modelo,serie,marca_modelo,velocidad,ram,hdd,cd_dvd,sistema_operativo,licencia,version_office,licencia_office,nombre_equipo,direccionip,nombre_dominio,fecha_adquisicion,fecha_vencimiento,estado_equipo) values ('$tipoequipo','$nivel','$ubicacion','$nombreuser','$centrocosto','$numeroinv','$smarca','$modelo','$serie','$marcamodelo','$velocidad','$ram','$hdd','$sdvd','$sisoperativo','$licenciaso','$versionofice','$licenciaofice','$equiponombre','$sdireccion','$sdominio','$fechaadqui','$fechagarantia','$sestado')";
             $rs = $conn->insert_delete_update($sql);
             $query2 = "SELECT MAX(id) as maximoid from inventario;";
             $resul = $conn->query($query2);
             $idinv = $resul->fetch_assoc();
             $id = $idinv['maximoid'];
             if($_POST['sisinstitucionales']!=""){
               $ref_sisinstitucionales = $_POST['sisinstitucionales'];
                $ref_sisinstitucionales = preg_split("/\r\n|\r|\n/", $ref_sisinstitucionales);
             foreach($ref_sisinstitucionales as $valor){
                $sql = "INSERT INTO sistemas_institucionales(id_inventario,nombre) values ('$id','$valor')";
                $rs = $conn->insert_delete_update($sql);
                }  
             }
             if($_POST['otrossoftwares']!=""){
                $ref_otrossoftwares = $_POST['otrossoftwares'];
                $ref_otrossoftwares = preg_split("/\r\n|\r|\n/", $ref_otrossoftwares);
             foreach($ref_otrossoftwares as $valor){
                $sql = "INSERT INTO otros_software(id_inventario,nombre) values ('$id','$valor')";
                    $rs = $conn->insert_delete_update($sql);
                }  
             }
             if($_POST['observaciones']!=""){
               $ref_observaciones = $_POST['observaciones'];
             $ref_observaciones = preg_split("/\r\n|\r|\n/", $ref_observaciones);
             foreach($ref_observaciones as $valor){
                $sql = "INSERT INTO observaciones(id_inventario,nombre) values ('$id','$valor')";
                    $rs = $conn->insert_delete_update($sql);
                }  
             }
             
             $conn->desconectar();
             
             /*function guardarsistemas($id) { 
                  $texto = nl2br($_POST['sisinstitucionales']);
	              $texto = explode("<br />",$texto);
                  $conn = new Conexion();
                  
                  $conn->conectar();
                  $acentos = $conn->query("SET NAMES 'utf8'");
                 foreach ($texto as $indice => $valor)
                {
                    $sql = "INSERT INTO sistemas_institucionales(id_inventario,nombre) values ('$id','$valor')";
                    $rs = $conn->insert_delete_update($sql);
                }
                 $conn->desconectar();
             }*/
             /*function guardarotros($id) { 
                  $texto = nl2br($_POST['otrossoftwares']);
	              $texto = explode("<br />",$texto);
                  $conn = new Conexion();
                  
                  $conn->conectar();
                  $acentos = $conn->query("SET NAMES 'utf8'");
                 foreach ($texto as $indice => $valor)
                {
                    $sql = "INSERT INTO otros_software(id_inventario,nombre) values ('$id','$valor')";
                    $rs = $conn->insert_delete_update($sql);
                }
                 $conn->desconectar();
             }*/
             /*function guardarobservaciones($id) { 
                  $texto = nl2br($_POST['observaciones']);
	              $texto = explode("<br />",$texto);
                  $conn = new Conexion();
                  
                  $conn->conectar();
                  $acentos = $conn->query("SET NAMES 'utf8'");
                 foreach ($texto as $indice => $valor)
                {
                    $sql = "INSERT INTO observaciones(id_inventario,nombre) values ('$id','$valor')";
                    $rs = $conn->insert_delete_update($sql);
                }
                 $conn->desconectar();
             }*/
             //guardarsistemas($id);
             //guardarotros($id);
             //guardarobservaciones($id);           
             break;
     }
}

?>