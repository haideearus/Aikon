<?php
// Enable CORS
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

include "connectare.php";

// Verifică dacă este trimis un request de tip POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Preia datele trimise din formularul de login
  $json = file_get_contents('php://input');
  $data = json_decode($json, true);

  // Check if email and password are set in the JSON data
  if (isset($data['email']) && isset($data['password'])) {
    $email = $data['email'];
    $password = $data['password'];

    try {
      // Verifică credențialele în baza de date
      $sql = "SELECT * FROM USERS WHERE userEmail = :email";
      $statement = $conn->prepare($sql);
      $statement->bindParam(":email", $email);
      $statement->execute();

      // Verifică rezultatul interogării
      if ($statement->rowCount() > 0) {
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        $storedPassword = $user['password'];

        // Compare the entered password with the stored hash
        if (password_verify($password, $storedPassword)) {
          // Autentificare este reușită
          echo json_encode(array("message" => "Login successful"));

          // Insert email and timestamp into LogTable
          $insertSql = "INSERT INTO LogTable (userEmail, data) VALUES (:insertEmail, NOW())";
          $insertStatement = $conn->prepare($insertSql);
          $insertStatement->bindParam(":insertEmail", $email);
          $insertStatement->execute();
        } else {
          // Dacă credențialele sunt incorecte
          echo json_encode(array("message" => "Invalid email or password"));
        }
      } else {
        // Dacă credențialele sunt incorecte
        echo json_encode(array("message" => "Invalid email or password"));
      }
    } catch (PDOException $e) {
      echo json_encode(array("message" => "Database Error: " . $e->getMessage()));
    }
  } else {
    // JSON data is invalid or missing email/password
    echo json_encode(array("message" => "Invalid request. Email and password required."));
  }
} else {
  // Răspuns pentru cererile de tip GET
  echo json_encode(array("message" => "Invalid request method"));
}
?>
