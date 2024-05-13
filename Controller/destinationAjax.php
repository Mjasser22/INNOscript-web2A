<?php
include "../Model/destination.php";

try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=isra',
        'root',
        '',
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    // Handle database connection errors
    echo json_encode(["error" => "Database connection failed: " . $e->getMessage()]);
}

if (isset($_GET["action"])) {
    if ($_GET["action"] === "insertData") {
        if (!empty($_POST["name"]) && !empty($_POST["description"])) {
            $sql = "INSERT INTO Destination (Name, Description)  
                    VALUES (:name, :description)";
            $query = $pdo->prepare($sql);
            $result = $query->execute([
                'name' => $_POST["name"],
                'description' => $_POST["description"]
            ]);

            if ($result) {
                echo json_encode([
                    "statusCode" => 200,
                    "message" => "Data inserted successfully 😀"
                ]);
            } else {
                echo json_encode([
                    "statusCode" => 500,
                    "message" => "Failed to insert data 😓"
                ]);
            }
        } else {
            echo json_encode([
                "statusCode" => 400,
                "message" => "Please fill all the required fields 🙏"
            ]);
        }
    }
}
?>
