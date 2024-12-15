<?php
include 'koneksi.php';

if ($_GET['proses'] == 'insert') {
    try {
        $stmt = $db->prepare("INSERT INTO level (nama_level, keterangan) VALUES (:nama_level, :keterangan)");
        $stmt->bindParam(':nama_level', $_POST['nama_level']);
        $stmt->bindParam(':keterangan', $_POST['keterangan']);
        $stmt->execute();

        echo "<script>window.location = 'index.php?p=level';</script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} elseif ($_GET['proses'] == 'edit') {
    try {
        $stmt = $db->prepare("UPDATE level SET nama_level = :nama_level, keterangan = :keterangan WHERE id = :id");
        $stmt->bindParam(':nama_level', $_POST['nama_level']);
        $stmt->bindParam(':keterangan', $_POST['keterangan']);
        $stmt->bindParam(':id', $_POST['id']);
        $stmt->execute();

        echo "<script>window.location = 'index.php?p=level';</script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} elseif ($_GET['proses'] == 'delete') {
    try {
        $stmt = $db->prepare("DELETE FROM level WHERE id = :id");
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();

        echo "<script>window.location = 'index.php?p=level';</script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
