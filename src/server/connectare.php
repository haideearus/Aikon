<?php 
include "index.html";
$username = "AC_LABS_USER";
$password = "progr@m@mCuDr@gS!Spor";
$server = "synopsis.database.windows.net";
$database = "AC_LABS_2023";
$dsn="sqlsrv:Server=$server;Database=$database";
try{
$conn = new PDO($dsn, $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//$sql = "SELECT * FROM USERS";


    //$statement= $conn->prepare($sql);
   // $statement->execute();
  //  $row=$statement->fetchAll(PDO::FETCH_ASSOC);

 // echo "Table Users created successfully";
 //echo "you are connected";
    
    //print_r($row);

}catch(PDOException $e) {
    echo "DataBase Error: ".$e->getMessage();
}catch(Exception $e){
    echo "General Error: ".$e->getMessage();
}
echo json_encode($row, JSON_PRETTY_PRINT);
?>
