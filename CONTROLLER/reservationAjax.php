<?php

include "../Model/reservation.php";

try {
    $pdo =  new PDO(
        'mysql:host=localhost;dbname=isra',
        'root',
        '',
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    // Gérer les erreurs de connexion à la base de données
    echo json_encode(["error" => "Échec de la connexion à la base de données : " . $e->getMessage()]);
}

if ($_GET["action"] === "fetchData") {
    $sql = "SELECT * FROM reservation";
    $stmt = $pdo->query($sql);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode([
        "data" => $data
    ]);
}

if ($_GET["action"] === "insertData") {
    if (!empty($_POST["destination_id"]) && !empty($_POST["user_name"]) && !empty($_POST["phone_number"]) && !empty($_POST["check_in_date"]) && !empty($_POST["check_out_date"]) && !empty($_POST["accomodation_type"]) && !empty($_POST["total_price"])) {
        $sql = "INSERT INTO reservation  
        VALUES (NULL, :destination_id, :user_name, :phone_number, :check_in_date, :check_out_date, :accomodation_type, :total_price)";
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'destination_id' => $_POST["destination_id"],
            'user_name' => $_POST["user_name"],
            'phone_number' => $_POST["phone_number"],
            'check_in_date' => $_POST["check_in_date"],
            'check_out_date' => $_POST["check_out_date"],
            'accomodation_type' => $_POST["accomodation_type"],
            'total_price' => $_POST["total_price"]
        ]);
        if ($result) {
            echo json_encode([
                "statusCode" => 200,
                "message" => "Données insérées avec succès 😀"
            ]);
        } else {
            echo json_encode([
                "statusCode" => 500,
                "message" => "Échec de l'insertion des données 😓"
            ]);
        }
    } else {
        echo json_encode([
            "statusCode" => 400,
            "message" => "Veuillez remplir tous les champs requis 🙏"
        ]);
    }
}

if ($_GET["action"] === "fetchSingle") {
    $id = $_POST["id"];
    $sql = "SELECT * FROM reservation WHERE `Id`=:id";
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $id]);
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if ($result !== false) {
        header("Content-Type: application/json");
        echo json_encode([
            "statusCode" => 200,
            "data" => $result
        ]);
    } else {
        echo json_encode([
            "statusCode" => 404,
            "message" => "Aucune réservation trouvée avec cet identifiant 😓"
        ]);
    }
}

if ($_GET["action"] === "updateData") {
    $id = $_POST["id"];
    $sql = "UPDATE reservation SET destination_id = :destination_id, user_name = :user_name, phone_number = :phone_number, check_in_date = :check_in_date, check_out_date = :check_out_date, accomodation_type = :accomodation_type, total_price = :total_price WHERE Id = :id";
    $query = $pdo->prepare($sql);
    $result = $query->execute([
        'destination_id' => $_POST["destination_id"],
        'user_name' => $_POST["user_name"],
        'phone_number' => $_POST["phone_number"],
        'check_in_date' => $_POST["check_in_date"],
        'check_out_date' => $_POST["check_out_date"],
        'accomodation_type' => $_POST["accomodation_type"],
        'total_price' => $_POST["total_price"],
        'id' => $id
    ]);
    if ($result) {
        echo json_encode([
            "statusCode" => 200,
            "message" => "Données mises à jour avec succès 😀",
            "result" => $id
        ]);
    } else {
        echo json_encode([
            "statusCode" => 500,
            "message" => "Échec de la mise à jour des données 😓"
        ]);
    }
}

if ($_GET["action"] === "deleteData") {
    $id = $_POST["id"];
    $sql = "DELETE FROM Reservation WHERE Id = :id";
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $id]);
    if ($query->rowCount() > 0) {
        echo json_encode([
            "statusCode" => 200,
            "message" => "Données supprimées avec succès 😀"
        ]);
    } else {
        echo json_encode([
            "statusCode" => 500,
            "message" => "Échec de la suppression des données 😓"
        ]);
    }
}

