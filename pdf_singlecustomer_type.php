<?php
function generateRow()
{
    $contents = '';
    include_once 'database/db_connection.php';
    $sql = "SELECT * FROM customers_type WHERE customer_type_number = '".$_GET['customer_type_number']."' ";
    $num = 1;
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $contents .= "
         <tr>
             <td>" . $num++ . "</td>
             <td>" . $row['customer_type_number'] . "</td>
             <td>" . $row['customer_type_name'] . "</td>
             <td>" . $row['registration_date'] . "</td>
         </tr>
         ";
    }

    return $contents;
}

require_once 'tcpdf/tcpdf.php';
$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle("List of customer type supported by our company");
$pdf->SetHeaderData('Netasatta Technologies', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN, 12));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, 'Times new roman', PDF_FONT_SIZE_DATA, 12));
$pdf->SetDefaultMonospacedFont('helvetica');
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetMargins(PDF_MARGIN_LEFT, '15', PDF_MARGIN_RIGHT, '15');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetAutoPageBreak(true, 10);
$pdf->SetFont('helvetica', '', 11);
$pdf->AddPage();
$content = '';
$content .= '
      	<h2 align="center">List of customer type supported by our company</h2>
      	<h4>Single customer type detail</h4>
      	<table border="1" cellspacing="0" cellpadding="3">
           <tr>
                <th width="5%">SN</th>
				<th width="30%">Customer type number</th>
				<th width="30%">Customer type name</th>
				<th width="30%">Date added</th>
           </tr>
      ';
$content .= generateRow();
$content .= '</table>';
$pdf->writeHTML($content);
$pdf->Output('single_customers_type_info.pdf', 'I');
