<?php
include 'koneksi.php';

if ($_GET['proses'] == 'insert') {
    try {
        $tgl = $_POST['thn'] . '-' . $_POST['bln'] . '-' . $_POST['tgl'];
        $hobies = implode(",", $_POST['hobi']);

        // Query dengan PDO
        $stmt = $db->prepare("INSERT INTO mahasiswa (nim, nama_mhs, tgl_lahir, jekel, hobi, email, nohp, alamat, prodi_id) 
                              VALUES (:nim, :nama_mhs, :tgl_lahir, :jekel, :hobi, :email, :nohp, :alamat, :prodi_id)");
        $stmt->execute([
            ':nim' => $_POST['nim'],
            ':nama_mhs' => $_POST['nama'],
            ':tgl_lahir' => $tgl,
            ':jekel' => $_POST['jekel'],
            ':hobi' => $hobies,
            ':email' => $_POST['email'],
            ':nohp' => $_POST['nohp'],
            ':alamat' => $_POST['alamat'],
            ':prodi_id' => $_POST['prodi_id']
        ]);

        echo "<script>window.location='index.php?p=mhs'</script>";
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

if ($_GET['proses'] == 'edit') {
    try {
        $tgl = $_POST['thn'] . '-' . $_POST['bln'] . '-' . $_POST['tgl'];
        $hobies = implode(",", $_POST['hobi']);

        // Query dengan PDO
        $stmt = $db->prepare("UPDATE mahasiswa SET 
                              nama_mhs = :nama_mhs, 
                              tgl_lahir = :tgl_lahir, 
                              jekel = :jekel, 
                              hobi = :hobi, 
                              email = :email, 
                              nohp = :nohp, 
                              alamat = :alamat, 
                              prodi_id = :prodi_id 
                              WHERE nim = :nim");
        $stmt->execute([
            ':nama_mhs' => $_POST['nama'],
            ':tgl_lahir' => $tgl,
            ':jekel' => $_POST['jekel'],
            ':hobi' => $hobies,
            ':email' => $_POST['email'],
            ':nohp' => $_POST['nohp'],
            ':alamat' => $_POST['alamat'],
            ':prodi_id' => $_POST['prodi_id'],
            ':nim' => $_POST['nim']
        ]);

        echo "<script>window.location='index.php?p=mhs'</script>";
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

if ($_GET['proses'] == 'delete') {
    try {
        // Query dengan PDO
        $stmt = $db->prepare("DELETE FROM mahasiswa WHERE nim = :nim");
        $stmt->execute([':nim' => $_GET['nim']]);

        header('location:index.php?p=mhs'); // Redirect
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}