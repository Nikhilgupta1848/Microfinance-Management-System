<?php
function generateRow()
{
    $contents = '';
    include_once 'database/db_connection.php';
    $where = "";
    if(isset($_GET['account_number'])){
        $where = " where a.account_number = '{$_GET['account_number']}' ";
    }
    $sql = "SELECT 
a.account_number, 
a.open_date,
c.first_name AS account_name,
c.middle_name AS middle_account_name,
c.surname AS last_account_name,
ct.customer_type_name AS customer_type,
act.account_type_name AS account_type,
acs.account_status_name AS account_status
FROM accounts a
INNER JOIN customers c ON a.customer = c.customer_number
INNER JOIN customers_type ct ON c.customer_type = ct.customer_type_number
INNER JOIN account_type act ON a.account_type = act.account_type_number
INNER JOIN account_status acs  ON a.account_status = acs.account_status_number {$where}
ORDER BY open_date DESC
";

    $num = 1;
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($query)) {
        $contents .= "
         <tr>
             <td>" . $num++ . "</td>
             <td>" . $row['account_number'] . "</td>
             <td>" . $row['account_name'] . ' ' . $row['middle_account_name']. ' '. $row['last_account_name'].  "</td>
             <td>" . $row['customer_type'] . "</td>
             <td>" . $row['account_type'] . "</td>
             <td>" . $row['account_status'] . "</td>
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
      	<h2 align="center">Customer Account </h2>
      	<h4>List of customer bank account</h4>
      	<table border="1" cellspacing="0" cellpadding="3">
           <tr>
                <th width="4%">SN</th>
				<th width="14%">Account number</th>
				<th width="30%">Account name </th>
            <th width="25%">Customer type</th>
            <th width="20%">Account type</th>
            <th width="12%">Account status</th>
           </tr>
      ';
$content .= generateRow();
$content .= '</table>';
$pdf->writeHTML($content);
$pdf->Output('single customer detail.pdf', 'I');
