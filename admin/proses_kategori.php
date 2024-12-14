<?php 
include 'koneksi.php';

if ($_GET['proses'] == 'insert') {
    $stmt = $db->prepare("INSERT INTO kategori (nama_kategori, keterangan) VALUES (:nama_kategori, :keterangan)");
    $stmt->bindParam(':nama_kategori', $_POST['nama_kategori']);
    $stmt->bindParam(':keterangan', $_POST['keterangan']);

    if ($stmt->execute()) {
        echo "<script>window.location='index.php?p=kategori'</script>";
    }
}

if ($_GET['proses'] == 'edit') {
    $stmt = $db->prepare("UPDATE kategori SET nama_kategori = :nama_kategori, keterangan = :keterangan WHERE id = :id");
    $stmt->bindParam(':nama_kategori', $_POST['nama_kategori']);
    $stmt->bindParam(':keterangan', $_POST['keterangan']);
    $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "<script>window.location='index.php?p=kategori'</script>";
    }
}

if ($_GET['proses'] == 'delete') {
    $stmt = $db->prepare("DELETE FROM kategori WHERE id = :id");
    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);

    if ($stmt->execute()) {
        header('location:index.php?p=kategori'); // redirect
    }
}
?>
