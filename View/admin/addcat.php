<?php

include '../../Controller/categorieC.php';

$error = "";

$categorie = null;

$categorieC = new categorieC();
if (
    isset($_POST["libelle"])
) {
    if (
        !empty($_POST['libelle'])
        ){
        $categorie = new categorie(
            null,
            $_POST['libelle']
        );
        $categorieC->addcat($categorie);
        header('Location:listcat.php');
    } else
        $error = "Missing information";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Title</title>
    <link rel="stylesheet" href="hebergement.css">
    <!-- Include other necessary stylesheets -->
</head>

<body>
    <!-- Your HTML content -->
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
                <a href="../view/export_pdf.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">export_pdf</span>
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


        </ul>
    <!-- Nav Item - Charts -->

    <!-- Nav Item - Tables -->
    
    <form action="" method="POST">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    
                </div>
            </div>
            <!-- Add more columns or adjust the grid layout as needed -->
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
             
            </div>
        </div>
    </div>
</form>

</ul>
<div class="container-fluid">
<div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Ajouter une categorie</h6>
                        </div>
    <div class="card-body">

    <form action="" method="POST">
            <table border="1" align="center">

                <tr>
                    <td>
                        <label for="libelle">Name:
                        </label>
                    </td>
                    <td><input type="text" name="libelle" id="libelle" maxlength="20"></td>
                </tr>
            
                <tr align="center">
                    <td>
                        <input type="submit" value="Save">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>



    </div>
    <div id="error">
        <?php echo $error; ?>
    </div>

    













    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</div></div></body></html>