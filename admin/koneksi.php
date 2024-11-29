<?php
// Konfigurasi database
$host = 'localhost';   
$dbname = 'mahasiswa'; 
$username = 'root';    
$password = '';        

try {
    // Membuat koneksi menggunakan PDO
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Mengatur atribut PDO untuk menangani error
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // Jika terjadi kesalahan, hentikan eksekusi dan tampilkan pesan
    die("Koneksi database gagal: " . $e->getMessage());
}
?>
