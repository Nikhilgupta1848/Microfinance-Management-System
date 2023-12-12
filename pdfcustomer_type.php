<?php
function generateRow()
{
    $contents = '';
    include_once 'database/db_connection.php';
    $sql = "SELECT * FROM customers_type ORDER BY registration_date DESC";
    $num = 1;    
     $query = mysqli_query($conn, $sql);
     while($row = mysqli_fetch_assoc($query)){
         $contents .= "
         <tr>
             <td>".$num++."</td>
             <td>".$row['customer_type_number']."</td>
             <td>".$row['customer_type_name']."</td>
             <td>".$row['registration_date']."</td>
         </tr>
         ";
     }
    

    return $contents;
}

require_once 'tcpdf/tcpdf.php';
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF
{

    //Page header
    public function Header()
    {
        // Logo
        $image_file = K_PATH_IMAGES . 'assets/img/mainlogo.jpg';
        $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0, 15, '<< Autosoft Technologies >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

//document information
$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle("List of customer type supported by our company");
// Set page header and footer
$pdf->SetHeaderData('', '', 'Netasatta Technologies', 'PDF_HEADER_STRING', 'Netasatta Technologies');
$pdf->setHeaderFont(array('times', 12));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, 'Times new roman',  PDF_FONT_SIZE_DATA, 12));

$pdf->SetDefaultMonospacedFont('times');
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetMargins(PDF_MARGIN_LEFT, '15', PDF_MARGIN_RIGHT, '15');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetAutoPageBreak(true, 10);
$pdf->SetFont('times', '', 12);
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM, 0);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO, 1.25);
$pdf->AddPage();


$content = '';
$content .= '
      	<h2 align="center">List of customer type supported by our company</h2>
      	<h4>Customer list type</h4>
      	<table border="1" cellspacing="0" cellpadding="3">
           <tr>
                <th width="5%"><b>SN</b></th>
				<th width="30%"><b>Customer type number</b></th>
				<th width="30%"><b>Customer type name</b></th>
				<th width="30%"><b>Date added</b></th>
           </tr>
           
      ';
$content .= generateRow();
$content .= '</table>';
$pdf->writeHTML($content);
$pdf->Output('customers_type_list.pdf', 'I');
