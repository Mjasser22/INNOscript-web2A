<?php




require_once("../model/offre.php");
require_once("../model/transport.php");

require_once('../connexion.php');
require_once('../tcpdf_6_3_2/tcpdf/tcpdf.php');

// Create a new TCPDF instance

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

$pdf->Output('transportation_emploi_data.pdf', 'D');

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="liste_employe.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</head>
<body>
<div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                        <ion-icon name="clipboard-outline"></ion-icon>
                        </span>
                        <span class="title">Welcome to your Dashbored </span>
                    </a>
                </li>

                <li>
                    <a href="liste_employe.php">
                        <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">search:filter data</span>
                    </a>
                    
                    <input type="text" placeholder="Search with speciality" id="speciality" onkeyup="filterTable()" >
                </li>

                <li>
                    <a href="inscription_admin.html">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Add User</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Messages</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Help</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <span class="title">Password</span>
                    </a>
                </li>

                <li>
                    <a href="login.html">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="box">
            <a href="../view/addOffre.php">
                <button class ="addButton" type="submit" name ="addButton">add</button> 
            </a>
            
            <table id="myTable" class="RdvTable">
                    <thead>
                        <tr>
                            <th>ID_Emploi</th>
                            <th>Specialite</th>
                            <th>pieceidentite</th>
                            <th>numero</th>
                            <th>Email</th>
                            <th>disponibilite </th>
                            <th>password</th>
                            <th>genre</th>
                            <th>update</th>
                            <th>delete</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $new_emploi = new emploi();
                        $final_list = $new_emploi->read_all_emploi();
                        foreach ($final_list as $emploi) {
                            ?>
                            <form action="../controller/handleOprations.php" method="POST">
                                <tr>
                                    <td>
                                        <?= $emploi['ID_Emploi']; ?>
                                        <input type="hidden" name="ID_Emploi" value="<?php echo $emploi['ID_Emploi']; ?>">
                                    </td>
                                    <td>
                                        <?= $emploi['specialite']; ?> 
                                    </td>
                                    <td>
                                        <?= $emploi['pieceidentite']; ?>
                                    </td>
                                    <td>
                                        <?= $emploi['numero']; ?>
                                    </td>
                                    <td>
                                        <?= $emploi['Email']; ?>
                                    </td>
                                    <td>
                                        <?= $emploi['disponibilite']; ?>
                                    </td>
                                    <td>
                                        <?= $emploi['password']; ?>
                                    </td>
                                    <td>
                                        <?= $emploi['genre']; ?>
                                    </td>
                                    
                                    <td>
                                        <button class ="updateButton" type="submit" name="updateButton">update</button>
                                    </td>
                                     <td>
                                        <button class ="deleteButton" type="submit" name="deleteButton">delete</button> 
                                    </td>
                                   
                                    
                                </tr>
                            </form>
                            <form action="" method="post">
    <button type="submit" name="GENERATEpdf">GENERATEpdf</button>
</form>
                        <?php
                        }
                        ?>
                    </tbody>
            </table>
            <table class="RdvTable">
                    <thead>
                        <tr>
                            <th>ID transport</th>
                            <th>type</th>
                            <th>matricule</th>
                            <th>date debut</th>      
                        </tr>
                    </thead>
                    <tbody>
                        <form action="../controller/handletransportoperation.php" method="post" >
                        <?php
                        $new_transport = new transport();
                        $final_list = $new_transport->read_all_transport();
                        foreach ($final_list as $transport) {
                            ?>
                                <tr>
                                    <td>
                                        <?= $transport['ID_transport']; ?>
                                        <input type="hidden" name="ID_transport" value="<?php echo $transport['ID_transport']; ?>">
                                    </td>
                                    <td>
                                        <?= $transport['type']; ?>
                                    </td>
                                    <td>
                                        <?= $transport['matricule']; ?>
                                    </td>
                                    <td>
                                        <?= $transport['date_debut']; ?>
                                    </td>
                                     
                                    <td>
                                        <button class ="updateButton" type="submit" name="updateButton">update</button>
                                    </td>
                                     <td>
                                        <button class ="deleteButton" type="submit" name="deleteButton">delete</button> 
                                    </td>
                                   
                                                        <td>
                                        <?= $emploi['specialite']; ?> 
                                    </td>
                                    <td>
                                        <?= $emploi['pieceidentite']; ?>
                                    </td>
                                    <td>
                                        <?= $emploi['numero']; ?>
                                    </td>
                                    <td>
                                        <?= $emploi['Email']; ?>
                                    </td>
                                    <td>
                                        <?= $emploi['disponibilite']; ?>
                                    </td>
                                    <td>
                                        <?= $emploi['password']; ?>
                                    </td>
                                    <td>
                                        <?= $emploi['genre']; ?>
                                    </td>
                                    <td>
                                        <button class ="updateButton" type="submit" name="updateButton">update</button>
                                    </td>
                                     <td>
                                        <button class ="deleteButton" type="submit" name="deleteButton">delete</button> 
                                    </td>
                                    
                                                    </tr>
                                                    <?php
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>

                                    </td>
                                </tr>
                            </form>
                        <?php
                        
                        ?>
                    </tbody>
            </table>
        </div>
</body>
<script>
    function filterTable() {
    var nameInput, nameFilter, specialityInput, specialityFilter, table, tr, td, i, nameTxtValue, specialityTxtValue;
    
    nameInput = document.getElementById("speciality");
    nameFilter = nameInput.value.toUpperCase();
    
    specialityInput = document.getElementById("speciality");
    specialityFilter = specialityInput.value.toUpperCase();
    
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    
    for (i = 0; i < tr.length; i++) {
        tdName = tr[i].getElementsByTagName("td")[1];
        tdSpeciality = tr[i].getElementsByTagName("td")[1];
        
        if (tdName && tdSpeciality) {
            nameTxtValue = tdName.textContent || tdName.innerText;
            specialityTxtValue = tdSpeciality.textContent || tdSpeciality.innerText;

            if (nameTxtValue.toUpperCase().indexOf(nameFilter) > -1 && specialityTxtValue.toUpperCase().indexOf(specialityFilter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

 </script>

</html>