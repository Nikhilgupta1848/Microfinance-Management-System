<?php
function generateRow()
{
    $contents = '';
    include_once 'database/db_connection.php';
    $sql = "SELECT * FROM account_status ORDER BY registration_date DESC";
    $num = 1;
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $contents .= "
         <tr>
             <td>" . $num++ . "</td>
             <td>" . $row['account_status_number'] . "</td>
             <td>" . $row['account_status_name'] . "</td>
             <td>" . $row['registration_date'] . "</td>
         </tr>
         ";
    }

    return $contents;
}

require_once 'tcpdf/tcpdf.php';

//document information
$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle("List of Account status available in our Bank");
// Set page header and footer
$pdf->SetHeaderData('', '', 'Netasatta Technologies', 'PDF_HEADER_STRING', 'Netasatta Technologies');
$pdf->setHeaderFont(array('times', 12));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, 'Times new roman', PDF_FONT_SIZE_DATA, 12));

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
      	<h2 align="center">List of Account status available in our Bank</h2>
      	<h4>Account status lists</h4>

      	<table border="1" cellspacing="0" cellpadding="3">
           <tr>
                <th width="5%"><b>SN</b></th>
				<th width="30%"><b>Account status number</b></th>
				<th width="30%"><b>Account status name</b></th>
				<th width="30%"><b>Date added</b></th>
           </tr>

      ';
$content .= generateRow();
$content .= '</table>';
$pdf->writeHTML($content);
$pdf->Output('account_status_list.pdf', 'I');
