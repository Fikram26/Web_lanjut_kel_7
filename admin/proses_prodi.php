<?php 
include 'koneksi.php';

if ($_GET['proses'] == 'insert') {
    // Menggunakan prepared statement untuk mencegah SQL Injection
    $stmt = $db->prepare("INSERT INTO prodi (nama_prodi, jenjang_std) VALUES (:nama_prodi, :jenjang)");
    $stmt->bindParam(':nama_prodi', $_POST['nama_prodi']);
    $stmt->bindParam(':jenjang', $_POST['jenjang']);
    
    if ($stmt->execute()) {
        echo "<script>window.location='index.php?p=prodi'</script>";
    }
}

if ($_GET['proses'] == 'edit') {
    // Menggunakan prepared statement untuk update
    $stmt = $db->prepare("UPDATE prodi SET nama_prodi = :nama_prodi, jenjang_std = :jenjang WHERE id = :id");
    $stmt->bindParam(':nama_prodi', $_POST['nama_prodi']);
    $stmt->bindParam(':jenjang', $_POST['jenjang']);
    $stmt->bindParam(':id', $_POST['id']);
    
    if ($stmt->execute()) {
        echo "<script>window.location='index.php?p=prodi'</script>";
    }
}

if ($_GET['proses'] == 'delete') {
    // Menggunakan prepared statement untuk delete
    $stmt = $db->prepare("DELETE FROM prodi WHERE id = :id");
    $stmt->bindParam(':id', $_GET['id']);
    
    if ($stmt->execute()) {
        header('location:index.php?p=prodi'); // Redirect setelah delete
    }
}
?>
