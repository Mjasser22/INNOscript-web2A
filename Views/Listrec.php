<?php
include '../Controller/recC.php';
$recC = new recC();
$list = $recC->listrec();
?>
<html>

    <center>
        <h1>Liste des reclamations</h1>
        <h2>
            <a href="addrec.php">Add Reclamation</a>
        </h2>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th>Id Reclamation</th>
            <th>Id_R</th>
            <th>Id_E</th>
            <th>Id_U</th>
            <th>descrip</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($list as $Reclamation) {
        ?>
            <tr>
                <td><?= $Reclamation['Id_R']; ?></td>
                <td><?= $Reclamation['Id_R']; ?></td>
                <td><?= $Reclamation['Id_E']; ?></td>
                <td><?= $Reclamation['Id_U']; ?></td>
                <td><?= $Reclamation['descrip']; ?></td>
                <td align="center">
                <form action="updaterec.php" method="POST">
                    <button type="submit">Update</button>
                    <input type="hidden" name="Id_R" value="<?php echo $Reclamation['Id_R']; ?>">
                    <input type="hidden" name="Id_R" value="<?php echo $Reclamation['Id_R']; ?>">
                    <input type="hidden" name="Id_E" value="<?php echo $Reclamation['Id_E']; ?>">
                    <input type="hidden" name="Id_U" value="<?php echo $Reclamation['Id_U']; ?>">
                    <input type="hidden" name="descrip" value="<?php echo $Reclamation['descrip']; ?>">
                    </form>
                </td>
                <td>
                <a href="deleterec.php?Id_R=<?php echo $Reclamation['Id_R']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>