<?php
include "../conexion.php";

/**
 * @package com.tecnick.tcpdf
 * @abstract TCPDF 
 * @author Marco Huerta
 * @since 2008-03-04--old man
 */

// Include the main TCPDF library (search for installation path).
require_once('../tc/tcpdf/tcpdf.php');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF
{

    //Page header
    public function Header()
    {
        // Logo
        // $image_file = K_PATH_IMAGES.'logo_example.jpg';
        // $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        $this->Cell(0, 15, 'Electro Iluminacion y Proyectos de Occidente, SA de CV', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->SetY(-285);
        $this->SetFont('helvetica', 'B', 10);
        $this->Cell(0, 15, 'Av. Francia #1751 B.Col Moderna.Guadalajara.Jalisco.Mexico CP 44190 EPO-020828-E5A.', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->SetY(-280);
        $this->SetFont('helvetica', 'B', 10);
        $this->Cell(0, 15, 'Tels:(33)3812-3825 (33)3810-4923 01800-000-EYPO 52*11*16609', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-35);
        $this->Cell(0, 15, 'No se admiten devoluciones por ser producto de especificación.Cambios Sujetos a atorización con cargo del 25% del valor del mismo.', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->SetY(-30);
        $this->Cell(0, 15, 'Precios Sujetos a Cambio sin Aviso Previo.', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->SetY(-20);
        $this->Cell(0, 15, 'Banamex Moneda Nacional suc. 0255 Niños Héroes Cta. 5497175,CLABE 002320025554971759,', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->SetY(-15);
        $this->Cell(0, 15, 'Banamex D"lares suc. 0255 Niños Héroes Cta. 9272062. CLABE 002320025592720629 ', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->SetFont('helvetica', 'I', 13);
        $this->SetY(-25);
        $this->Cell(0, 15, 'Le Recordamos Solo Aceptamos Pagos en Nuestras Cuentas Bancarias NO EFECTIVO', 0, false, 'C', 0, '', 0, false, 'M', 'M');




        $this->SetY(-10);
        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

} 
       

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        

// set document information

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('EYPO');
$pdf->SetTitle('EYPO');
$pdf->SetSubject('EYPO');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'BI', 12);

// add a page
$pdf->AddPage();

// set some text to print
$txt = <<<EOD



EOD;
        $cdoc = $_GET['folio']; 

$sql = "SELECT TOP 1 * FROM Pruebas15nov16.dbo.IV_EY_PV_OfertasVentasCab vista
        INNER JOIN Pruebas15nov16.dbo.IV_EY_PV_SN_Direcciones dir
        ON vista.CodigoSN = dir.CodigoSN
        INNER JOIN Pruebas15nov16.dbo.IV_EY_PV_SociosNegocios soc
        ON vista.CodigoSN = soc.CodigoSN
        WHERE vista.FolioSAP = '$cdoc' ";
$consulta = sqlsrv_query($conn, $sql);
while ($Row = sqlsrv_fetch_array($consulta)) {
    $pdf->SetFont('helvetica', '', 12);
    $pdf->SetXY(40, 33);
    $pdf->cell(20, 5, $Row['CodigoSN'], 0, 0, 'L');//CONSULTA SQL
    $pdf->SetXY(15, 30);
    $pdf->SetFont('helvetica', 'b', 12);
    $pdf->Cell(20, 10, 'Cliente:', 0, 0, 'L');
    $pdf->SetXY(15, 40);
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(20, 10, 'Direccion:', 0, 0, 'L');
    $pdf->SetXY(40, 40);
    $pdf->Cell(20, 10, $Row['Calle'], 0, 0, 'J');
    $pdf->SetXY(15, 50);
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(20, 10, 'Telefono:', 0, 0, 'L');
    $pdf->SetXY(40, 50);
    $pdf->Cell(20, 10, $Row['Tel1'], 0, 'J');
    $pdf->SetXY(15, 60);
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(20, 10, 'RFC:', 0, 0, 'L');
    $pdf->SetXY(40, 60);
    $pdf->Cell(20, 10, $Row['RFC'], 0, 'J');
    $pdf->SetXY(150, 32);
    $pdf->SetFont('helvetica', '', 14);
    $pdf->Cell(20, 10, 'Cotizacion:', 0, 0, 'L');
    $pdf->SetXY(181, 32);
    $pdf->Cell(20, 10, $Row['FolioSAP'], 0, 'J');
    $pdf->SetXY(150, 40);
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(20, 10, 'Fecha:', 0, 0, 'L');
    $pdf->SetXY(181, 40);
    $pdf->Cell(20, 10, $Row['FechaContabilizacion']->format('Y-m-d'), 0, 'J');
    $pdf->SetXY(150, 50);
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(30, 10, 'Vigente hasta:', 0, 0, 'L');
    $pdf->SetXY(181, 50);
    $pdf->Cell(20, 10, $Row['FechaVencimiento']->format('Y-m-d'), 0, 'J');
    $pdf->Ln();
}
$tbl = '';

$tbl .= '
                            <div class="row">
                            <div class="col-md-12">      
                            <table class="table-bordered table-editable" width="100%">
                            <thead>
                            <tr>
                            <th  border="0.5">NP</th>
                            <th  border="0.5">Codigo</th>
                            <th  border="0.5">Descripción</th>
                            <th  border="0.5">Cantidad</th>
                            <th  border="0.5">Precio</th>    
                            <th  border="0.5">Importe</th>
                            </tr>
                            </thead>
                            <tbody> ';          
             $cdoc = $_GET['folio']; 
            //  echo $cdoc;  
$cont = 0;
$sql = "Select * FROM Pruebas15nov16.dbo.IV_EY_PV_OfertasVentasDet where FolioInterno = '$cdoc'";
$consulta = sqlsrv_query($conn, $sql);

while ($Row = sqlsrv_fetch_array($consulta)) {
    $cont++;

    $tbl .= '   
                             <tr>
                                <td>' . $cont . '</td>    
                                <td>' . $Row['CodigoArticulo'] . '</td>
                                <td>' . $Row['NombreArticulo'] . '</td>
                                <td>' . number_format($Row['Quantity'], 2, '.', '') . '</td>
                                <td>' . number_format($Row['PrecioUnitario'], 2, '.', '') . '</td>
                                <td>' . number_format($Row['Impuestos'], 2, '.', '') . '</td>
                             </tr>
                             
             ';
}
$tbl .= '</tbody>
                            </table>
                            </div>
                            </div>   
                            </div>';
       
                             

// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
$pdf->WriteHTML($tbl, true, false, true, false, '');

$pdf->SetXY(150, 60);
$pdf->SetFont('times', 'b', 12);
$pdf->Cell(35, 10, 'Referancia MXN:', 0, 0, 'L');
$pdf->SetXY(185, 60);
$pdf->Cell(20, 10, '1919017', 0, 0, 'C');//-->db
$pdf->SetXY(150, 65);
$pdf->Cell(35, 10, 'Referancia DLLS:', 0, 0, 'L');
$pdf->SetXY(185, 65);
$pdf->Cell(20, 10, '1919032', 0, 0, 'C');//-->db
$pdf->Ln(); 


 



$cdoc = $_GET['folio']; 
$sql = "SELECT TOP 1 * FROM Pruebas15nov16.dbo.IV_EY_PV_OfertasVentasCab 
           WHERE FolioSAP = '$cdoc'";
$consulta = sqlsrv_query($conn, $sql);

while ($Row = sqlsrv_fetch_array($consulta)) {


    $pdf->SetXY(130, 130);
    $pdf->Cell(20, 10, 'Sub Total', 0, 0, 'L');
    $pdf->SetXY(160, 130);
    $pdf->Cell(40, 10, number_format($Row['SubTotalDocumento'], 2, '.', ''), 0, 0, 'L');

    $pdf->SetXY(130, 140);
    $pdf->Cell(20, 10, 'Impuesto', 0, 0, 'L');
    $pdf->SetXY(160, 140);
    $pdf->Cell(20, 10, number_format($Row['SumaImpuestos'], 2, '.', ''), 0, 0, 'L');

    $pdf->SetXY(130, 150);
    $pdf->Cell(20, 10, 'Total', 0, 0, 'L');
    $pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
    $pdf->SetXY(148, 150);
    $pdf->Cell(20, 10, number_format($Row['TotalDocumento'], 2, '.', ''), 1, 0, 'C');

    $pdf->SetXY(20, 150);
    $pdf->Cell(20, 10, 'Cantidad con letra', 0, 0, 'L');

//------------------------------------------------------
    $pdf->SetXY(20, 170);
    $pdf->Cell(20, 10, 'Condiciones de pago:', 0, 0, 'L');
    $pdf->SetXY(20, 180);
    $pdf->Cell(20, 10, 'LAB:', 0, 0, 'L');
    $pdf->SetXY(20, 190);
    $pdf->Cell(20, 10, 'Comentarios:', 0, 0, 'L');
    $pdf->SetXY(60, 200);
    $pdf->Cell(50, 10, '', 1, 0, 'L');
    $numero = number_format($Row['TotalDocumento'], 2, '.', '');

// $numero2=490000;
// Funcion de Numero a letra ;)
    function unidad($numero)
    {
        switch ($numero) {
            case 9:
                {
                    $numu = "Nueve";
                    break;
                }
            case 8:
                {
                    $numu = "Ocho";
                    break;
                }
            case 7:
                {
                    $numu = "Siete";
                    break;
                }
            case 6:
                {
                    $numu = "Seis";
                    break;
                }
            case 5:
                {
                    $numu = "Cinco";
                    break;
                }
            case 4:
                {
                    $numu = "Cuatro";
                    break;
                }
            case 3:
                {
                    $numu = "Tres";
                    break;
                }
            case 2:
                {
                    $numu = "Dos";
                    break;
                }
            case 1:
                {
                    $numu = "Uno";
                    break;
                }
            case 0:
                {
                    $numu = "";
                    break;
                }
        }
        return $numu;
    }

    function decena($numdero)
    {

        if ($numdero >= 90 && $numdero <= 99) {
            $numd = "Noventa ";
            if ($numdero > 90)
                $numd = $numd . "y " . (unidad($numdero - 90));
        } else if ($numdero >= 80 && $numdero <= 89) {
            $numd = "Ochenta ";
            if ($numdero > 80)
                $numd = $numd . "y " . (unidad($numdero - 80));
        } else if ($numdero >= 70 && $numdero <= 79) {
            $numd = "Setenta ";
            if ($numdero > 70)
                $numd = $numd . "y " . (unidad($numdero - 70));
        } else if ($numdero >= 60 && $numdero <= 69) {
            $numd = "Sesenta ";
            if ($numdero > 60)
                $numd = $numd . "y " . (unidad($numdero - 60));
        } else if ($numdero >= 50 && $numdero <= 59) {
            $numd = "Cincuenta ";
            if ($numdero > 50)
                $numd = $numd . "y " . (unidad($numdero - 50));
        } else if ($numdero >= 40 && $numdero <= 49) {
            $numd = "Cuarenta ";
            if ($numdero > 40)
                $numd = $numd . "y " . (unidad($numdero - 40));
        } else if ($numdero >= 30 && $numdero <= 39) {
            $numd = "Treinta ";
            if ($numdero > 30)
                $numd = $numd . "y " . (unidad($numdero - 30));
        } else if ($numdero >= 20 && $numdero <= 29) {
            if ($numdero == 20)
                $numd = "Veinte ";
            else
                $numd = "Veinti" . (unidad($numdero - 20));
        } else if ($numdero >= 10 && $numdero <= 19) {
            switch ($numdero) {
                case 10:
                    {
                        $numd = "Diez ";
                        break;
                    }
                case 11:
                    {
                        $numd = "Once ";
                        break;
                    }
                case 12:
                    {
                        $numd = "Doce ";
                        break;
                    }
                case 13:
                    {
                        $numd = "Trece ";
                        break;
                    }
                case 14:
                    {
                        $numd = "Catorce ";
                        break;
                    }
                case 15:
                    {
                        $numd = "Quince ";
                        break;
                    }
                case 16:
                    {
                        $numd = "Dieciseis ";
                        break;
                    }
                case 17:
                    {
                        $numd = "Diecisite ";
                        break;
                    }
                case 18:
                    {
                        $numd = "Dieciocho ";
                        break;
                    }
                case 19:
                    {
                        $numd = "Diecinueve ";
                        break;
                    }
            }
        } else
            $numd = unidad($numdero);
        return $numd;
    }

    function centena($numc)
    {
        if ($numc >= 100) {
            if ($numc >= 900 && $numc <= 999) {
                $numce = "Novecientos ";
                if ($numc > 900)
                    $numce = $numce . (decena($numc - 900));
            } else if ($numc >= 800 && $numc <= 899) {
                $numce = "Ochocientos ";
                if ($numc > 800)
                    $numce = $numce . (decena($numc - 800));
            } else if ($numc >= 700 && $numc <= 799) {
                $numce = "Setecientos ";
                if ($numc > 700)
                    $numce = $numce . (decena($numc - 700));
            } else if ($numc >= 600 && $numc <= 699) {
                $numce = "Seiscientos ";
                if ($numc > 600)
                    $numce = $numce . (decena($numc - 600));
            } else if ($numc >= 500 && $numc <= 599) {
                $numce = "Quinientos ";
                if ($numc > 500)
                    $numce = $numce . (decena($numc - 500));
            } else if ($numc >= 400 && $numc <= 499) {
                $numce = "Cuatrocientos ";
                if ($numc > 400)
                    $numce = $numce . (decena($numc - 400));
            } else if ($numc >= 300 && $numc <= 399) {
                $numce = "Trescientos ";
                if ($numc > 300)
                    $numce = $numce . (decena($numc - 300));
            } else if ($numc >= 200 && $numc <= 299) {
                $numce = "Doscientos ";
                if ($numc > 200)
                    $numce = $numce . (decena($numc - 200));
            } else if ($numc >= 100 && $numc <= 199) {
                if ($numc == 100)
                    $numce = "Cien ";
                else
                    $numce = "Ciento " . (decena($numc - 100));
            }
        } else
            $numce = decena($numc);

        return $numce;
    }

    function miles($nummero)
    {
        if ($nummero >= 1000 && $nummero < 2000) {
            $numm = "Mil " . (centena($nummero % 1000));
        }
        if ($nummero >= 2000 && $nummero < 10000) {
            $numm = unidad(Floor($nummero / 1000)) . " Mil " . (centena($nummero % 1000));
        }
        if ($nummero < 1000)
            $numm = centena($nummero);

        return $numm;
    }

    function decmiles($numdmero)
    {
        if ($numdmero == 10000)
            $numde = "Diez Mil";
        if ($numdmero > 10000 && $numdmero < 20000) {
            $numde = decena(Floor($numdmero / 1000)) . "Mil " . (centena($numdmero % 1000));
        }
        if ($numdmero >= 20000 && $numdmero < 100000) {
            $numde = decena(Floor($numdmero / 1000)) . " Mil " . (miles($numdmero % 1000));
        }
        if ($numdmero < 10000)
            $numde = miles($numdmero);

        return $numde;
    }

    function cienmiles($numcmero)
    {
        if ($numcmero == 100000)
            $num_letracm = "Cien Mil";
        if ($numcmero >= 100000 && $numcmero < 1000000) {
            $num_letracm = centena(Floor($numcmero / 1000)) . " Mil " . (centena($numcmero % 1000));
        }
        if ($numcmero < 100000)
            $num_letracm = decmiles($numcmero);
        return $num_letracm;
    }

    function millon($nummiero)
    {
        if ($nummiero >= 1000000 && $nummiero < 2000000) {
            $num_letramm = "Un Millon " . (cienmiles($nummiero % 1000000));
        }
        if ($nummiero >= 2000000 && $nummiero < 10000000) {
            $num_letramm = unidad(Floor($nummiero / 1000000)) . " Millones " . (cienmiles($nummiero % 1000000));
        }
        if ($nummiero < 1000000)
            $num_letramm = cienmiles($nummiero);

        return $num_letramm;
    }

    function decmillon($numerodm)
    {
        if ($numerodm == 10000000)
            $num_letradmm = "Diez Millones";
        if ($numerodm > 10000000 && $numerodm < 20000000) {
            $num_letradmm = decena(Floor($numerodm / 1000000)) . "Millones " . (cienmiles($numerodm % 1000000));
        }
        if ($numerodm >= 20000000 && $numerodm < 100000000) {
            $num_letradmm = decena(Floor($numerodm / 1000000)) . " Millones " . (millon($numerodm % 1000000));
        }
        if ($numerodm < 10000000)
            $num_letradmm = millon($numerodm);

        return $num_letradmm;
    }

    function cienmillon($numcmeros)
    {
        if ($numcmeros == 100000000)
            $num_letracms = "Cien Millones";
        if ($numcmeros >= 100000000 && $numcmeros < 1000000000) {
            $num_letracms = centena(Floor($numcmeros / 1000000)) . " Millones " . (millon($numcmeros % 1000000));
        }
        if ($numcmeros < 100000000)
            $num_letracms = decmillon($numcmeros);
        return $num_letracms;
    }

    function milmillon($nummierod)
    {
        if ($nummierod >= 1000000000 && $nummierod < 2000000000) {
            $num_letrammd = "Mil " . (cienmillon($nummierod % 1000000000));
        }
        if ($nummierod >= 2000000000 && $nummierod < 10000000000) {
            $num_letrammd = unidad(Floor($nummierod / 1000000000)) . " Mil " . (cienmillon($nummierod % 1000000000));
        }
        if ($nummierod < 1000000000)
            $num_letrammd = cienmillon($nummierod);

        return $num_letrammd;
    }


    function convertir($numero)
    {
        $num = str_replace(",", "", $numero);
        $num = number_format($num, 2, '.', '');
        $cents = substr($num, strlen($num) - 2, strlen($num) - 1);
        $num = (int)$num;

        $numf = milmillon($num);

        return $numf . "Pesos" . " con " . $cents . "/100" . " MXN************";
    } 
// Resultado by Marco Huerta
    $pdf->SetFont('helvetica', '', 10);
    $pdf->SetXY(20, 160);
    $pdf->Cell(20, 5, convertir($numero), 0, 0, 'L');
// echo numerotexto($numero); 

}
 


           

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_003.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+