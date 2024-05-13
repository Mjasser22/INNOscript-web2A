<?php
require_once("../model/offre.php");
require_once('../tcpdf_6_3_2/tcpdf/tcpdf.php');
require_once("../model/transport.php");
require_once('../tcpdf_6_3_2/tcpdf/tcpdf_import.php');


// Initialize TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Transportation and Emploi Data');
$pdf->SetSubject('Transportation and Emploi Data');
$pdf->SetKeywords('TCPDF, PDF, transportation, emploi');

// Set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' ', PDF_HEADER_STRING);

// Set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Add a page
$pdf->AddPage();

// Fetch data of transportations from the database
$transportModel = new transport();
$transportData = $transportModel->read_all_transport(); // Implement this method to fetch data from your database

// Fetch data of emploi from the database
$emploiModel = new emploi();
$emploiData = $emploiModel->read_all_emploi(); // Implement this method to fetch data from your database

// Output the data in the PDF
$pdf->SetFont('helvetica', '', 12);

$pdf->Cell(0, 10, 'Transportation Data', 0, 1);
foreach ($transportData as $transport) {
    $pdf->Cell(0, 10, $transport['ID_transport'] . ' - ' . $transport['type'] . ' - ' . $transport['matricule'] . ' - ' . $transport['date_debut'], 0, 1);
}

$pdf->Cell(0, 10, 'Emploi Data', 0, 1);
foreach ($emploiData as $emploi) {
    $pdf->Cell(0, 10, $emploi['ID_Emploi'] . ' - ' . $emploi['specialite'] . ' - ' . $emploi['pieceidentite'] . ' - ' . $emploi['numero'] . ' - ' . $emploi['Email'] . ' - ' . $emploi['disponibilite'] . ' - ' . $emploi['genre'], 0, 1);
}

// Output the PDF to the browser
$pdf->Output('transportation_emploi_data.pdf', 'D');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Emplois</title>
    <link rel="stylesheet" href="liste_employe.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</head>
<body>
<div class="container">
    <div class="box">
        <table id="myTable" class="RdvTable">
            <thead>
                <tr>
                    <th>ID_Emploi</th>
                    <th>Specialite</th>
                    <th>Piece Identite</th>
                    <th>Numero</th>
                    <th>Email</th>
                    <th>Disponibilite</th>
                    <th>Genre</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($emploiData as $emploi) {
                ?>
                <tr>
                    <td><?= $emploi['ID_Emploi']; ?></td>
                    <td><?= $emploi['specialite']; ?></td>
                    <td><?= $emploi['pieceidentite']; ?></td>
                    <td><?= $emploi['numero']; ?></td>
                    <td><?= $emploi['Email']; ?></td>
                    <td><?= $emploi['disponibilite']; ?></td>
                    <td><?= $emploi['genre']; ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <!-- Move the button outside the PDF generation PHP block -->
        <button type="submit" name="GENERATEpdf">GENERATEpdf</button>
    </div>
</div>
</body>
</html>
