<?php
include "connectare.php";

// Verifică dacă este trimis un request de tip POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Preia datele trimise din formularul de login
  $nume = $_POST["nume"];
  $password = $_POST["password"];

  try {
    // Verifică credențialele în baza de date
    $sql = "SELECT * FROM USERS WHERE nume = :nume AND password = :password";
    $statement = $conn->prepare($sql);
    $statement->bindParam(":nume", $nume);
    $statement->bindParam(":password", $password);
    $statement->execute();
    
    // Verifică rezultatul interogării
    if ($statement->rowCount() > 0) {
      // Autentificare este reușită
      echo json_encode(array("message" => "Login successful"));
    } else {
      // Dacă credențialele sunt incorecte
      echo json_encode(array("message" => "Invalid name or password"));
    }
  } catch (PDOException $e) {
    echo json_encode(array("message" => "Database Error: " . $e->getMessage()));
  }
} else {
  // Răspuns pentru cererile de tip GET
  echo json_encode(array("message" => "Invalid request method"));
}

// Verifică dacă conexiunea este realizată cu succes
if ($conn) {
  echo "Utilizatorul este conectat la serverul SQL.";
} else {
  echo "Eroare la conectarea la serverul SQL.";
}
?>
