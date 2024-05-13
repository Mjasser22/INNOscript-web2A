

// require_once '../config.php';

// $pdo = config::getConnexion();
// $update = $_POST[ 'Id_R' ];
// $Id_E = $_POST[ 'Id_E' ];
// $Id_U = $_POST[ 'Id_U' ];
// $descrip = $_POST[ 'descrip' ];

// try {

//     $query = $pdo->prepare( "UPDATE reclamation
//     SET Id_E = :Id_E,
//         Id_U = :Id_U,
//         descrip = :descrip,
       
//     WHERE Id_R = :Id_R" );
//     $query->bindParam( ':Id_R', $update );
//     $query->bindParam( ':Id_E', $Id_E );
//     $query->bindParam( ':Id_U', $Id_U );
//     $query->bindParam( ':descrip', $descrip );
    
//     $query->execute();
//     header( 'Location:../Views/Listrec.php' );

// } catch ( PDOException $e ) {
//     echo 'error '. $e->getMessage();
// }

// 
<?php
require_once '../config.php';

$pdo = config::getConnexion();
$update = $_POST['Id_R']; // Use single quotes for accessing form data
$Id_E = $_POST['Id_E'];
$Id_U = $_POST['Id_U'];
$descrip = $_POST['descrip'];

try {

  $query = $pdo->prepare("UPDATE reclamation
                            SET Id_E = :Id_E,
                               Id_U = :Id_U,
                               descrip = :descrip
                          WHERE Id_R = :Id_R");  // Removed extra space before single quote
  $query->bindParam(':Id_R', $update);
  $query->bindParam(':Id_E', $Id_E);
  $query->bindParam(':Id_U', $Id_U);
  $query->bindParam(':descrip', $descrip);

  $query->execute();
  header('Location:../View/Listrec.php');

} catch (PDOException $e) {
  echo 'error ' . $e->getMessage();
}

?>
