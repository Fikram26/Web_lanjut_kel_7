<?php
include 'koneksi.php';

$proses = isset($_GET['proses']) ? $_GET['proses'] : '';

switch ($proses) {
    case 'insert':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $judul = $_POST['judul'];
            $kategori_id = $_POST['kategori_id'];
            $isi_berita = $_POST['isi_berita'];

            // Upload file
            $file_upload = '';
            if (!empty($_FILES['fileToUpload']['name'])) {
                $target_dir = "uploads/";
                $file_upload = $target_dir . basename($_FILES['fileToUpload']['name']);
                move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $file_upload);
            }

            // Insert data
            $sql = "INSERT INTO berita (judul, kategori_id, isi_berita, file_upload, user_id, created_at) 
                    VALUES (:judul, :kategori_id, :isi_berita, :file_upload, :user_id, NOW())";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':judul', $judul);
            $stmt->bindParam(':kategori_id', $kategori_id);
            $stmt->bindParam(':isi_berita', $isi_berita);
            $stmt->bindParam(':file_upload', $file_upload);
            $stmt->bindValue(':user_id', 1); // Ganti dengan ID user yang sesuai
            $stmt->execute();

            header('Location: index.php?p=berita');
        }
        break;

    case 'edit':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $judul = $_POST['judul'];
            $kategori_id = $_POST['kategori_id'];
            $isi_berita = $_POST['isi_berita'];

            // Upload file
            $file_upload = '';
            if (!empty($_FILES['fileToUpload']['name'])) {
                $target_dir = "uploads/";
                $file_upload = $target_dir . basename($_FILES['fileToUpload']['name']);
                move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $file_upload);
            } else {
                // Keep old file
                $file_upload = $_POST['old_file'];
            }

            // Update data
            $sql = "UPDATE berita SET judul = :judul, kategori_id = :kategori_id, isi_berita = :isi_berita, file_upload = :file_upload 
                    WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':judul', $judul);
            $stmt->bindParam(':kategori_id', $kategori_id);
            $stmt->bindParam(':isi_berita', $isi_berita);
            $stmt->bindParam(':file_upload', $file_upload);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            header('Location: index.php?p=berita');
        }
        break;

    case 'delete':
        if (isset($_GET['id']) && isset($_GET['file'])) {
            $id = $_GET['id'];
            $file = $_GET['file'];

            // Delete file
            if (file_exists($file)) {
                unlink($file);
            }

            // Delete data
            $sql = "DELETE FROM berita WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            header('Location: index.php?p=berita');
        }
        break;

    default:
        header('Location: index.php?p=berita');
        break;
}
?>