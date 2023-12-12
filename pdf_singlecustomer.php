<?php
function generateRow()
{
    $contents = '';
    include_once 'database/db_connection.php';
    $sql = "SELECT * FROM customers WHERE customer_number = '" . $_GET['customer_number'] . "' ";
    $num = 1;
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $contents .= "
         <tr>
             <td>" . $num++ . "</td>
             <td>" . $row['customer_number'] . "</td>
             <td>" . $row['customer_type'] . "</td>
             <td>" . $row['first_name'] . "</td>
             <td>" . $row['middle_name'] . "</td>
             <td>" . $row['surname'] . "</td>
             <td>" . $row['gender'] . "</td>
             <td>" . $row['date_of_birth'] . "</td>
             <td>" . $row['nationality'] . "</td>
             <td>" . $row['registration_date'] . "</td>
         </tr>
         ";
    }

    return $contents;
}

require_once 'tcpdf/tcpdf.php';
$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle("Customer Detail");
$pdf->SetHeaderData('Netasatta Technologies', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN, 12));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, 'Times new roman', PDF_FONT_SIZE_DATA, 12));
$pdf->SetDefaultMonospacedFont('helvetica');
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetMargins(PDF_MARGIN_LEFT, 0, PDF_MARGIN_RIGHT, 0);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetAutoPageBreak(true, 10);
$pdf->SetFont('helvetica', '', 11);
$pdf->AddPage();
$content = '';
$content .= '
      	<h2 align="center">Customer Detail</h2>
      	<h4>Single customer detail</h4>
      	<table border="1" cellspacing="0" cellpadding="3">
           <tr>
                <th width="4%">SN</th>
				<th width="14%">Customer number</th>
				<th width="12%">Customer type </th>
            <th width="10%">First name</th>
            <th width="10%">Middle name</th>
            <th width="10%">surname</th>
            <th width="10%">Gender</th>
            <th width="10%">DOB</th>
            <th width="12%">Nationality</th>
				<th width="15%">Date added</th>
           </tr>
      ';
$content .= generateRow();
$content .= '</table>';
$pdf->writeHTML($content);
$pdf->Output('single customer detail.pdf', 'I');
