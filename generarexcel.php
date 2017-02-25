<?php 
include("class/conexion/conexion.php");
$conn = new Conexion();
$conn->conectar();
$acentos = $conn->query("SET NAMES 'utf8'");
$query="SELECT * FROM inventario order by ubicacion";
$resp= $conn->query($query);
$num = mysqli_num_rows($resp);

if (PHP_SAPI == 'cli')
    die('Este archivo solo se puede ver desde un navegador web');


/** Se agrega la libreria PHPExcel */
 require_once 'lib/PHPExcel/PHPExcel.php';
 
// Se crea el objeto PHPExcel
 $objPHPExcel = new PHPExcel();

// Se asignan las propiedades del libro
$objPHPExcel->getProperties()->setCreator("ISSS") // Nombre del autor
    ->setLastModifiedBy("ISSS") //Ultimo usuario que lo modificó
    ->setTitle("Reporte de Inventario") // Titulo
    ->setSubject("Reporte de Inventario") //Asunto
    ->setDescription("Reporte de Inventario") //Descripción
    ->setKeywords("reporte inventario pisos") //Etiquetas
    ->setCategory("Reporte excel"); //Categorias

$time = time();
$titulos = array('              INSTITUTO  SALVADOREÑO  DEL  SEGURO  SOCIAL', '              INFORMÁTICA, CONSULTORIO  DE  ESPECIALIDADES', '              INVENTARIO  DE  EQUIPO  INFORMÁTICO, ' . date("d-m-Y (H:i:s)", $time));

$subtitulos = array('DATOS GENERALES', 'CARACTERÍSTICAS BÁSICAS', 'SOFTWARE', 'IDENTIFICACIÓN DE RED', 'ESTADO DEL EQUIPO');

$titulosColumnas = array('Correlativo', 'Tipo de Equipo', 'Ubicación', 'Nombre de Usuario', 'Centro de Costo', 'Número de Inventario', 'Marca', 'Modelo', 'Serie', 'Marca & Modelo', 'Veloc.', 'RAM', 'HDD', 'CD/DVD', 'Sistema Operativo', 'Licencia', 'Versión de Office', 'Licencia de Office', 'Sistemas Institucionales', 'Otros Software (Utilitarios)', 'Nombre del Equipo', 'Direccón IP', 'Nombre de Dominio', 'Fecha de Adquisición', 'Fecha Vencimiento Garantía', 'Estado del Equipo', 'Observaciones');

// ESTILOS
$estiloTituloReporte = array(
    'font' => array(
        'name'      => 'Century Schoolbook',
        'bold'      => true,
        'italic'    => false,
        'strike'    => false,
        'size' =>20,
        'color'     => array(
            'rgb' => '000000'
        )
    ),
    'fill' => array(
      'type'  => PHPExcel_Style_Fill::FILL_SOLID,
      'color' => array(
            'argb' => 'FFFFFF')
  ),
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_NONE
        )
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'rotation' => 0//,
        //'wrap' => TRUE
    )
);
 
$estiloTituloColumnas = array(
    'font' => array(
        'name'  => 'Arial',
        'bold'  => true,
        'size' =>10,
        'color' => array(
            'rgb' => '000000'
        )
    ),
    'fill' => array(
        'type'  => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array(
            'rgb' => '969696')
    ),
    'borders' => array(
        'allborders' => array(
              'style' => PHPExcel_Style_Border::BORDER_THIN
        )
    ),
    'alignment' =>  array(
        'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'wrap'      => TRUE
    )
);

$estiloTituloPiso = array(
    'font' => array(
        'name'  => 'Times New Roman',
        'bold'  => true,
        'size' =>26,
        'color' => array(
            'rgb' => 'FFFFFF'
        )
    ),
    'fill' => array(
        'type'  => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array(
            'rgb' => '003366')
    ),
    'borders' => array(
        'allborders' => array(
              'style' => PHPExcel_Style_Border::BORDER_THIN
        )
    ),
    'alignment' =>  array(
        'horizontal'  => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
        'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
);
 
$estiloColumnas1 = array(
    'font' => array(
        'name'  => 'Arial',
        'bold'  => true,
        'size'  => 12,
        'color' => array(
            'rgb' => 'FFFFFF'
        )
    ),
    'fill' => array(
        'type'  => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array(
            'rgb' => '000000')
    ),
    'borders' => array(
        'top' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN ,
            'color' => array(
                'rgb' => '000000'
            )
        ),
        'bottom' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN ,
            'color' => array(
                'rgb' => '000000'
            )
        ),
        'left' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN ,
            'color' => array(
                'rgb' => '000000'
            )
        ),
        'right' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN ,
            'color' => array(
                'rgb' => 'FFFFFF'
            )
        )
    ),
    'alignment' =>  array(
        'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'wrap'      => TRUE
    )
);

$estiloColumnas2 = array(
    'font' => array(
        'name'  => 'Arial',
        'bold'  => true,
        'size'  => 12,
        'color' => array(
            'rgb' => 'FFFFFF'
        )
    ),
    'fill' => array(
        'type'  => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array(
            'rgb' => '000000')
    ),
    'borders' => array(
        'top' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN ,
            'color' => array(
                'rgb' => '000000'
            )
        ),
        'bottom' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN ,
            'color' => array(
                'rgb' => '000000'
            )
        ),
        'left' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN ,
            'color' => array(
                'rgb' => 'FFFFFF'
            )
        ),
        'right' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN ,
            'color' => array(
                'rgb' => 'FFFFFF'
            )
        )
    ),
    'alignment' =>  array(
        'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'wrap'      => TRUE
    )
);

$estiloColumnas3 = array(
    'font' => array(
        'name'  => 'Arial',
        'bold'  => true,
        'size'  => 12,
        'color' => array(
            'rgb' => 'FFFFFF'
        )
    ),
    'fill' => array(
        'type'  => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array(
            'rgb' => '000000')
    ),
    'borders' => array(
        'top' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN ,
            'color' => array(
                'rgb' => '000000'
            )
        ),
        'bottom' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN ,
            'color' => array(
                'rgb' => '000000'
            )
        ),
        'left' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN ,
            'color' => array(
                'rgb' => 'FFFFFF'
            )
        ),
        'right' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN ,
            'color' => array(
                'rgb' => '000000'
            )
        )
    ),
    'alignment' =>  array(
        'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'wrap'      => TRUE
    )
);

$estiloInformacion = new PHPExcel_Style();
$estiloInformacion->applyFromArray( array(
    'font' => array(
        'name'  => 'Arial',
        'size'  => 10,
        'color' => array(
            'rgb' => '000000'
        )
    ),
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
        )
    ),
    'alignment' =>  array(
        'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'wrap'      => TRUE
    )
));

$estiloObservacion = new PHPExcel_Style();
$estiloObservacion->applyFromArray( array(
    'font' => array(
        'name'  => 'Arial',
        'size'  => 10,
        'color' => array(
            'rgb' => '000000'
        )
    ),
    'fill' => array(
        'type'  => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array(
            'rgb' => 'daeef3')
    ),
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
        )
    ),
    'alignment' =>  array(
        'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'wrap'      => TRUE
    )
));

// Se combinan las celdas A1 hasta D1, para colocar ahí el titulo del reporte
$objPHPExcel->setActiveSheetIndex(0)
    ->mergeCells('A1:Z1')
    ->mergeCells('A2:Z2')
    ->mergeCells('A3:Z3')
    ->mergeCells('B4:I4')
    ->mergeCells('J4:N4')
    ->mergeCells('O4:T4')
    ->mergeCells('U4:W4')
    ->mergeCells('X4:Z4')
    ->mergeCells('A4:A5')
    ->mergeCells('AA1:AA3')
    ->mergeCells('AA4:AA5');
 
// Se agregan los titulos del reporte
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1',  $titulos[0]) // Titulo del reporte
    ->setCellValue('A2',  $titulos[1])
    ->setCellValue('A3',  $titulos[2])
    ->setCellValue('B4',  $subtitulos[0]) // Subtitulo del reporte
    ->setCellValue('J4',  $subtitulos[1])
    ->setCellValue('O4',  $subtitulos[2])
    ->setCellValue('U4',  $subtitulos[3])
    ->setCellValue('X4',  $subtitulos[4])
    ->setCellValue('A4',  $titulosColumnas[0])  //Titulo de las columnas
    ->setCellValue('B5',  $titulosColumnas[1])
    ->setCellValue('C5',  $titulosColumnas[2])
    ->setCellValue('D5',  $titulosColumnas[3])
    ->setCellValue('E5',  $titulosColumnas[4])
    ->setCellValue('F5',  $titulosColumnas[5])
    ->setCellValue('G5',  $titulosColumnas[6])
    ->setCellValue('H5',  $titulosColumnas[7])
    ->setCellValue('I5',  $titulosColumnas[8])
    ->setCellValue('J5',  $titulosColumnas[9])
    ->setCellValue('K5',  $titulosColumnas[10])
    ->setCellValue('L5',  $titulosColumnas[11])
    ->setCellValue('M5',  $titulosColumnas[12])
    ->setCellValue('N5',  $titulosColumnas[13])
    ->setCellValue('O5',  $titulosColumnas[14])
    ->setCellValue('P5',  $titulosColumnas[15])
    ->setCellValue('Q5',  $titulosColumnas[16])
    ->setCellValue('R5',  $titulosColumnas[17])
    ->setCellValue('S5',  $titulosColumnas[18])
    ->setCellValue('T5',  $titulosColumnas[19])
    ->setCellValue('U5',  $titulosColumnas[20])
    ->setCellValue('V5',  $titulosColumnas[21])
    ->setCellValue('W5',  $titulosColumnas[22])
    ->setCellValue('X5',  $titulosColumnas[23])
    ->setCellValue('Y5',  $titulosColumnas[24])
    ->setCellValue('Z5',  $titulosColumnas[25])
    ->setCellValue('AA4',  $titulosColumnas[26]);

//Se agregan los datos de la base
 
 $i = 6; //Numero de fila donde se va a comenzar a rellenar
 $j = 1; //Columna de correlativo
 while ($fila = mysqli_fetch_array($resp,MYSQLI_ASSOC)) {
     $tempN2 = "";
     $tempN3 = "";
     $tempN4 = "";
     
     $query2="SELECT * FROM sistemas_institucionales where id_inventario=".$fila['id'];
     $resp2= $conn->query($query2);
     $num2 = mysqli_num_rows($resp2);
     
     if($num2 >0){
         while($name = mysqli_fetch_array($resp2,MYSQLI_ASSOC)){
             $tempN2 = $tempN2 . "\n" . $name['nombre'];
         }
     }
     
     $query3="SELECT * FROM otros_software where id_inventario=".$fila['id'];
     $resp3= $conn->query($query3);
     $num3 = mysqli_num_rows($resp3);
     
     if($num3 >0){
         while($name = mysqli_fetch_array($resp3,MYSQLI_ASSOC)){
             $tempN3 = $tempN3 . "\n" . $name['nombre'];
         }
     }
     
     $query4="SELECT * FROM observaciones where id_inventario=".$fila['id'];
     $resp4= $conn->query($query4);
     $num4 = mysqli_num_rows($resp4);
     
     if($num4 >0){
         while($name = mysqli_fetch_array($resp4,MYSQLI_ASSOC)){
             $tempN4 = $tempN4 . "\n" . $name['nombre'];
         }
     }
     
     $objPHPExcel->setActiveSheetIndex(0)
         //->setCellValue('A'.$i, $fila['id'])
         ->setCellValue('A'.$i, $j)
         ->setCellValue('B'.$i, $fila['tipo_equipo'])
         ->setCellValue('C'.$i, $fila['ubicacion'])
         ->setCellValue('D'.$i, $fila['usuario'])
         ->setCellValue('E'.$i, $fila['centro_costo'])
         ->setCellValue('F'.$i, $fila['numero_inventario'])
         ->setCellValue('G'.$i, $fila['marca'])
         ->setCellValue('H'.$i, $fila['modelo'])
         ->setCellValue('I'.$i, $fila['serie'])
         ->setCellValue('J'.$i, $fila['marca_modelo'])
         ->setCellValue('K'.$i, $fila['velocidad'])
         ->setCellValue('L'.$i, $fila['ram'])
         ->setCellValue('M'.$i, $fila['hdd'])
         ->setCellValue('N'.$i, $fila['cd_dvd'])
         ->setCellValue('O'.$i, $fila['sistema_operativo'])
         ->setCellValue('P'.$i, $fila['licencia'])
         ->setCellValue('Q'.$i, $fila['version_office'])
         ->setCellValue('R'.$i, $fila['licencia_office'])
         ->setCellValue('S'.$i, $tempN2)
         ->setCellValue('T'.$i, $tempN3)
         ->setCellValue('U'.$i, $fila['nombre_equipo'])
         ->setCellValue('V'.$i, $fila['direccionip'])
         ->setCellValue('W'.$i, $fila['nombre_dominio'])
         ->setCellValue('X'.$i, $fila['fecha_adquisicion'])
         ->setCellValue('Y'.$i, $fila['fecha_vencimiento'])
         ->setCellValue('Z'.$i, $fila['estado_equipo'])
         ->setCellValue('AA'.$i, $tempN4);
             
     $i++;
     $j++;
 }

// FILTRO
$objPHPExcel->getActiveSheet()->setAutoFilter('B5:Z5');

// IMAGEN
$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('ISSS logo');
$objDrawing->setDescription('ISSS logo');
$objDrawing->setPath('./img/Logo_ISSS.png');
//$objDrawing->setOffsetX(8);    // setOffsetX works properly
//$objDrawing->setOffsetY(300);  //setOffsetY has no effect
$objDrawing->setCoordinates('A1');
$objDrawing->setHeight(100);
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
//$objPHPExcel->getActiveSheet()->getHeaderFooter()->addImage($objDrawing, PHPExcel_Worksheet_HeaderFooter::IMAGE_HEADER_LEFT);


// ESTILO
$objPHPExcel->getActiveSheet()->getStyle('A4')->getAlignment()->setTextRotation(90);
$objPHPExcel->getActiveSheet()->getStyle('A1:Z1')->applyFromArray($estiloTituloReporte);
$objPHPExcel->getActiveSheet()->getStyle('A2:Z2')->applyFromArray($estiloTituloReporte);
$objPHPExcel->getActiveSheet()->getStyle('A3:Z3')->applyFromArray($estiloTituloReporte);
$objPHPExcel->getActiveSheet()->getStyle('B4:I4')->applyFromArray($estiloColumnas1);
$objPHPExcel->getActiveSheet()->getStyle('J4:W4')->applyFromArray($estiloColumnas2);
$objPHPExcel->getActiveSheet()->getStyle('X4:Z4')->applyFromArray($estiloColumnas3);
$objPHPExcel->getActiveSheet()->getStyle('A4')->applyFromArray($estiloTituloColumnas);
$objPHPExcel->getActiveSheet()->getStyle('AA4')->applyFromArray($estiloTituloColumnas);
$objPHPExcel->getActiveSheet()->getStyle('A5:Z5')->applyFromArray($estiloTituloColumnas);
$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A6:Z".($i-1));
$objPHPExcel->getActiveSheet()->setSharedStyle($estiloObservacion, "AA6:AA".($i-1));

// TAMAÑOS COLUMNAS
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(7.43);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(12.29);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(17.57);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(24);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(21.29);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(21.71);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(8.71);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15.43);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(12.14);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(8);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(9.29);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(13.57);
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(23);
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(35.29);
$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(24.14);
$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(22.29);
$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(32);
$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(28.14);
$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(23.43);
$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(16.57);
$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(24.29);
$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(15.86);
$objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(15.86);
$objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(11.71);
$objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(48.71);

//TAMAÑOS FILAS
//Auto size: $objPHPExcel->getRowDimension('1')->setRowHeight(-1);
$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(25.50);
$objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(25.50);
$objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(25.50);
$objPHPExcel->getActiveSheet()->getRowDimension('4')->setRowHeight(21);
$objPHPExcel->getActiveSheet()->getRowDimension('5')->setRowHeight(51);
//$objPHPExcel->getActiveSheet()->getRowDimension('6')->setRowHeight(33.75);
//$objPHPExcel->getActiveSheet()->getRowDimension('7')->setRowHeight(38.25);



// TAMAÑO PÁGINA IMPRIMIR (SALTOS DE PÁGINA)
$objPHPExcel->getActiveSheet()
    ->getPageSetup()
    ->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

$objPHPExcel->getActiveSheet()
    ->getPageSetup()->setFitToPage(false)
                    ->setScale(26);


$objPHPExcel->getActiveSheet()
    ->getPageMargins()->setTop(0.5);
$objPHPExcel->getActiveSheet()
    ->getPageMargins()->setRight(0.5);
$objPHPExcel->getActiveSheet()
    ->getPageMargins()->setLeft(0.5);
$objPHPExcel->getActiveSheet()
    ->getPageMargins()->setBottom(0.5);

$objPHPExcel->getActiveSheet()
    ->getPageSetup()
    ->setRowsToRepeatAtTopByStartAndEnd(1, 5);

$objPHPExcel->getActiveSheet()
    ->getPageSetup()
    ->setPrintArea('A1:AA276');

/*for($i = 'A'; $i <= 'Z'; $i++){
    $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
}*/

// Se asigna el nombre a la hoja
$objPHPExcel->getActiveSheet()->setTitle('Computadoras');
 
// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
$objPHPExcel->setActiveSheetIndex(0);
 
// Inmovilizar paneles
//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
/*$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,1);
$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,2);
$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,3);*/

// Se manda el archivo al navegador web, con el nombre que se indica, en formato 2007
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ReporteInventario.xlsx"');
header('Cache-Control: max-age=0');
 
//$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
$objWriter->setOffice2003Compatibility(true);
$objWriter->save('php://output');
exit;

/*
// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/pdf');
header('Content-Disposition: attachment;filename="01simple.pdf"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
$objWriter->save('php://output');
exit;
*/


?>