<?php 
//include "index.html";
$username = "AC_LABS_USER";
$password = "progr@m@mCuDr@gS!Spor";
$server = "synopsis.database.windows.net";
$database = "AC_LABS_2023";
$dsn="sqlsrv:Server=$server;Database=$database";
try{
$conn = new PDO($dsn, $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e) {
    echo "DataBase Error: ".$e->getMessage();
}catch(Exception $e){
    echo "General Error: ".$e->getMessage();
}

?>
