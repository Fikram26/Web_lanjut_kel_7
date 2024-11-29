<?php

$host = 'localhost';   
$dbname = 'mahasiswa'; 
$username = 'root';    
$password = '';        

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

 
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
   
    die("Koneksi database gagal: " . $e->getMessage());
}
?>