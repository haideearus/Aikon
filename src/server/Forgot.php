<?php
include "connectare.php";

// Verifică dacă este trimis un request de tip POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Preia datele trimise din formularul de recuperare a parolei
  $user = $_POST["user"];

  try {
    // Verifică dacă utilizatorul există în baza de date
    $sqlCheckUser = "SELECT * FROM USERS WHERE user = :user";
    $statementCheckUser = $conn->prepare($sqlCheckUser);
    $statementCheckUser->bindParam(":user", $user);
    $statementCheckUser->execute();

    if ($statementCheckUser->rowCount() > 0) {
      // Dacă utilizatorul există în baza de date
      // Se poate adăuga codul pentru trimiterea unui email cu informații de resetare a parolei aici
      echo json_encode(array("message" => "Password reset instructions sent to your email"));
    } else {
      // Dacă utilizatorul nu există în baza de date
      echo json_encode(array("message" => "User not found"));
    }
  } catch (PDOException $e) {
    echo json_encode(array("message" => "Database Error: " . $e->getMessage()));
  }
} else {
  // Răspuns pentru cereri de tip GET
  echo json_encode(array("message" => "Invalid request method"));
}

// Verifică dacă conexiunea este realizată cu succes
if ($conn) {
  echo "Utilizatorul este conectat la serverul SQL.";
} else {
  echo "Eroare la conectarea la serverul SQL.";
}
?>
