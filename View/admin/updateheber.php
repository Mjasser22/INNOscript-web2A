<?php

include '../controller/heberC.php';

$error = "";

// create heber
$heber = null;

// create an instance of the controller
$heberC = new heberC();
if (
    isset($_POST["id"]) &&
    isset($_POST["prix"]) &&
    isset($_POST["datedispo"]) &&
    isset($_POST["locationn"]) &&
    isset($_POST["descc"])
) {
    if (
        !empty($_POST["id"]) &&
        !empty($_POST['prix']) &&
        !empty($_POST["datedispo"]) &&
        !empty($_POST["locationn"]) &&
        !empty($_POST["descc"])
    ) {
        $heber = new heber(
            $_POST['id'],
            $_POST['prix'],
            $_POST['datedispo'],
            $_POST['locationn'],
            $_POST['descc'],
        
        );
        $heberC->updateheber($heber, $_POST["id"]);
        header('Location:listheber.php');
    } else
        $error = "Missing information";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="listheber.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id'])) {
        $heber = $heberC->showheber($_POST['id']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="id">Id heber:
                        </label>
                    </td>
                    <td><input type="text" name="id" id="id" value="<?php echo $heber['id']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prix">First Name:
                        </label>
                    </td>
                    <td><input type="text" name="prix" id="prix" value="<?php echo $heber['prix']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="datedispo">Last Name:
                        </label>
                    </td>
                    <td><input type="date" name="datedispo" id="datedispo" value="<?php echo $heber['datedispo']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="locationn">Email:
                        </label>
                    </td>
                    <td>
                        <input type="locationn" name="locationn" value="<?php echo $heber['locationn']; ?>" id="locationn">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="dob">Date of Birth:
                        </label>
                    </td>
                    <td>
                    <input type="descc" name="descc" value="<?php echo $heber['descc']; ?>" id="descc">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Update">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>