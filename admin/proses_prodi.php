<?php
include 'koneksi.php'; // Pastikan koneksi.php menggunakan PDO

try {
    if ($_GET['proses'] === 'insert') {
        // Proses INSERT
        $stmt = $db->prepare("INSERT INTO prodi (nama_prodi, jenjang_std) VALUES (:nama_prodi, :jenjang)");
        $stmt->bindParam(':nama_prodi', $_POST['nama_prodi'], PDO::PARAM_STR);
        $stmt->bindParam(':jenjang', $_POST['jenjang'], PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            echo "<script>window.location='index.php?p=prodi'</script>";
        } else {
            echo "<script>alert('Gagal menambahkan data.');</script>";
        }
    }

    if ($_GET['proses'] === 'edit') {
        // Proses UPDATE
        $stmt = $db->prepare("UPDATE prodi SET nama_prodi = :nama_prodi, jenjang_std = :jenjang WHERE id = :id");
        $stmt->bindParam(':nama_prodi', $_POST['nama_prodi'], PDO::PARAM_STR);
        $stmt->bindParam(':jenjang', $_POST['jenjang'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "<script>window.location='index.php?p=prodi'</script>";
        } else {
            echo "<script>alert('Gagal mengupdate data.');</script>";
        }
    }

    if ($_GET['proses'] === 'delete') {
        // Proses DELETE
        $stmt = $db->prepare("DELETE FROM prodi WHERE id = :id");
        $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);

        if ($stmt->execute()) {
            header('Location: index.php?p=prodi');
        } else {
            echo "<script>alert('Gagal menghapus data.');</script>";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
