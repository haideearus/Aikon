<?php
require 'vendor/autoload.php';
use Firebase\JWT\JWT;
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

header('Content-Type: application/json');

$username = "AC_LABS_USER";
$password = "progr@m@mCuDr@gS!Spor";
$server = "synopsis.database.windows.net";
$database = "AC_LABS_2023";
$dsn="sqlsrv:Server=$server;Database=$database";

$jwtSecretKey = "x(&*nr734x871yx##@%ny7g723gye455gnz3^)ygi12547@#%2htt1@#627th42tx1t46732c@#%bt317667(*^)812cb65";

try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//        $sql = "SELECT * FROM USERS";
//        $statement = $conn->prepare($sql);
//        $statement->execute();
//        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
//        echo json_encode($users, JSON_PRETTY_PRINT);
//    } else
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (isset($data['userEmail']) && isset($data['password'])) {
            $sql = "SELECT * FROM USERS WHERE userEmail = ?";
            $statement = $conn->prepare($sql);
            $statement->execute([$data['userEmail']]);
            $user = $statement->fetch(PDO::FETCH_ASSOC);

//            echo json_encode($user, JSON_PRETTY_PRINT);
            if ($user && password_verify($data['password'], $user['password'])) {
                $issuedAt = time();
                $expirationTime = $issuedAt + 60*60;  // jwt valid for 1 hour
                $payload = array(
                    'iat' => $issuedAt,
                    'exp' => $expirationTime,
                    'userid' => $user['userID']
                );
                $jwt = JWT::encode($payload, $jwtSecretKey, 'HS256');
                echo json_encode(['token' => $jwt], JSON_PRETTY_PRINT);
            } else {
                echo json_encode(['error' => 'Invalid userEmail or password.'], JSON_PRETTY_PRINT);
            }

        } else {
            echo json_encode(['error' => 'Invalid request. Name and userEmail required.'], JSON_PRETTY_PRINT);
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
