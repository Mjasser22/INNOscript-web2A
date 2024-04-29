<?php
// Include controller files
include '../Controller/recC.php';
include '../Controller/repR.php';

// Create controller instances
$recC = new recC();
$repR = new repR();

// Get exercise and game data lists
$listExercices = $recC->listEx();
$listJeux = $repR->listJx();
?>

<html>

<head>
  <title>Liste des Exercices et Jeux</title>
  <style>
    table {
      border: 1px solid black;
      border-collapse: collapse;
      width: 50%;
      margin: 0 auto;
      display: inline-block;
      margin-right: 20px;
    }

    th, td {
      padding: 8px;
      text-align: left;
      border: 1px solid black;
    }

    h1 {
      text-align: center;
    }
  </style>
</head>

<body>

  <h1>Liste des Exercices</h1>
  <h2>
    <a href="addEx.php">Add Exercice</a>
  </h2>

  <table>
    <tr>
      <th>Id Exercice</th>
      <th>Id Jeux</th>
      <th>Nom</th>
      <th>Duree</th>
      <th>Note</th>
      <th>Update</th>
      <th>Delete</th>
    </tr>
    <?php
    foreach ($listExercices as $Exercice) {
      ?>
      <tr>
        <td><?= $Exercice['ID_Exercice']; ?></td>
        <td><?= $Exercice['ID_Jeu']; ?></td>
        <td><?= $Exercice['Nom']; ?></td>
        <td><?= $Exercice['Duree']; ?></td>
        <td><?= $Exercice['Note']; ?></td>
        <td align="center">
          <form action="updateEx.php" method="POST">
            <button type="submit">Update</button>
            <input type="hidden" name="ID_Exercice" value="<?php echo $Exercice['ID_Exercice']; ?>">
            <input type="hidden" name="ID_Jeu" value="<?php echo $Exercice['ID_Jeu']; ?>">
            <input type="hidden" name="Nom" value="<?php echo $Exercice['Nom']; ?>">
            <input type="hidden" name="Duree" value="<?php echo $Exercice['Duree']; ?>">
            <input type="hidden" name="Note" value="<?php echo $Exercice['Note']; ?>">
          </form>
        </td>
        <td>
          <a href="deleteEx.php?ID_Exercice=<?php echo $Exercice['ID_Exercice']; ?>">Delete</a>
        </td>
      </tr>
    <?php
    }
    ?>
  </table>

  <h1 style="margin-top: 50px;">Liste des Jeux</h1>
  <h2>
    <a href="addJx.php">Add Jeu</a> </h2>

  <table>
    <tr>
      <th>Id Jeu</th>
      <th>Nom</th>
      <th>Score</th>
      <th>Update</th>
      <th>Delete</th>
    </tr>
    <?php
    foreach ($listJeux as $Jeu) {
      ?>
      <tr>
        <td><?= $Jeu['ID_Jeu']; ?></td>
        <td><?= $Jeu['Nom']; ?></td>
        <td><?= $Jeu['Score']; ?></td>
        <td align="center">
          <form action="updateJx.php" method="POST">
            <button type="submit">Update</button>
            <input type="hidden" name="ID_Jeu" value="<?php echo $Jeu['ID_Jeu']; ?>">
            <input type="hidden" name="Nom" value="<?php echo $Jeu['Nom']; ?>">
            <input type="hidden" name="Score" value="<?php echo $Jeu['Score']; ?>">
          </form>
        </td>
        <td>
          <a href="deleteJx.php?ID_Jeu=<?php echo $Jeu['ID_Jeu']; ?>">Delete</a>
        </td>
      </tr>
    <?php
    }
    ?>
  </table>

</body>

</html>
