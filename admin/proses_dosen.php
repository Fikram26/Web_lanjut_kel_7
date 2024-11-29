<?php
include 'koneksi.php';

// Periksa apakah 'proses' ada di $_GET
if (isset($_GET['proses'])) {
    $proses = $_GET['proses'];

    if ($proses == 'insert') {
        $stmt = $db->prepare("INSERT INTO dosen (nip, nama_dosen, email, prodi_id, notelp, alamat) 
                                VALUES (:nip, :nama_dosen, :email, :prodi_id, :notelp, :alamat)");
        $stmt->bindParam(':nip', $_POST['nip']);
        $stmt->bindParam(':nama_dosen', $_POST['nama_dosen']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':prodi_id', $_POST['prodi_id']);
        $stmt->bindParam(':notelp', $_POST['notelp']);
        $stmt->bindParam(':alamat', $_POST['alamat']);

        if ($stmt->execute()) {
            echo "<script>window.location='index.php?p=dosen'</script>";
        }
    } elseif ($proses == 'edit') {
        $stmt = $db->prepare("UPDATE dosen SET 
                        nip = :nip,
                        nama_dosen = :nama_dosen,
                        email = :email,
                        prodi_id = :prodi_id,
                        notelp = :notelp,
                        alamat = :alamat
                        WHERE id = :id");
        $stmt->bindParam(':nip', $_POST['nip']);
        $stmt->bindParam(':nama_dosen', $_POST['nama_dosen']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':prodi_id', $_POST['prodi_id']);
        $stmt->bindParam(':notelp', $_POST['notelp']);
        $stmt->bindParam(':alamat', $_POST['alamat']);
        $stmt->bindParam(':id', $_POST['id']);

        if ($stmt->execute()) {
            echo "<script>window.location='index.php?p=dosen'</script>";
        }
    } elseif ($proses == 'delete') {
        $stmt = $db->prepare("DELETE FROM dosen WHERE id = :id");
        $stmt->bindParam(':id', $_GET['id']);

        if ($stmt->execute()) {
            header('location:index.php?p=dosen');
        }
    }
} else {
    // Jika 'proses' tidak ada, beri pesan error
    echo "Parameter 'proses' tidak ditemukan!";
}
