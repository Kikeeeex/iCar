<?php

require('./fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(95); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode('ICAR PLUS'), 1, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(13, 76, 192);
      $this->Cell(100); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE VEHICULOS REGISTRADOS "), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(74, 176, 240); //colorFondo
      $this->SetTextColor(0, 1, 2); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(55, 10, utf8_decode('MATRICULA'), 1, 0, 'C', 1);
      $this->Cell(55, 10, utf8_decode('MARCA'), 1, 0, 'C', 1);
      $this->Cell(55, 10, utf8_decode('MODELO'), 1, 0, 'C', 1);
      $this->Cell(55, 10, utf8_decode('TIPO'), 1, 0, 'C', 1);
      $this->Cell(55, 10, utf8_decode('AÑO'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(540, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

include 'con_db.php';

$pdf = new PDF();
$pdf->AddPage("landscape"); 
$pdf->AliasNbPages(); 

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); 

$consulta_reporte_registros = $conn->query("SELECT matricula, marca, modelo, tipo, anio FROM vehiculos");

if ($consulta_reporte_registros) {

   if ($consulta_reporte_registros->num_rows > 0) {

       while ($row = $consulta_reporte_registros->fetch_assoc()) {
           
           $matricula = $row['matricula'];
           $marca = $row['marca'];
           $modelo = $row['modelo'];
           $tipo = $row['tipo'];
           $anio = $row['anio'];

           $pdf->Cell(55, 10, utf8_decode("$matricula"), 1, 0, 'C', 0);
           $pdf->Cell(55, 10, utf8_decode("$marca"), 1, 0, 'C', 0);
           $pdf->Cell(55, 10, utf8_decode("$modelo"), 1, 0, 'C', 0);
           $pdf->Cell(55, 10, utf8_decode("$tipo"), 1, 0, 'C', 0);
           $pdf->Cell(55, 10, utf8_decode("$anio"), 1, 1, 'C', 0);
       }
   } else {
       echo "No se encontraron resultados en la consulta.";
   }
} else {
   echo "Error en la consulta: " . $conn->error;
}


// }


$pdf->Output('ReporteRegistros.pdf', 'I');