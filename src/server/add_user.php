<?php
header('Content-Type: application/json');
include "connectare.php";
//$username = "AC_LABS_USER";
//$password = "progr@m@mCuDr@gS!Spor";
//$server = "synopsis.database.windows.net";
//$database = "AC_LABS_2023";
//$dsn="sqlsrv:Server=$server;Database=$database";

try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (isset($data['userName']) && isset($data['password']) && isset($data['userEmail'])) {
            $sql = "INSERT INTO USERS (userName, userEmail, password) VALUES (?, ?, ?)";
            $statement = $conn->prepare($sql);
            $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
            $statement->execute([$data['userName'], $data['userEmail'], $hashedPassword]);
            echo json_encode(['message' => 'User created successfully.'], JSON_PRETTY_PRINT);
        } else {
            echo json_encode(['error' => 'Invalid request. Name and age required.'], JSON_PRETTY_PRINT);
        }
    } else {
        echo json_encode(['error' => 'Invalid request method.'], JSON_PRETTY_PRINT);
    }

} catch(PDOException $e) {
    echo json_encode(['error' => 'DataBase Error: ' . $e->getMessage()], JSON_PRETTY_PRINT);
} catch(Exception $e) {
    echo json_encode(['error' => 'General Error: ' . $e->getMessage()], JSON_PRETTY_PRINT);
}
?>