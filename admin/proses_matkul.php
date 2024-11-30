<?php
include 'koneksi.php'; // Pastikan file koneksi menggunakan PDO sudah benar

if (isset($_GET['proses'])) {
    $proses = $_GET['proses'];

    switch ($proses) {
        case 'insert': // Tambah data
            if (isset($_POST['submit'])) {
                $kode_matkul = $_POST['kode_matkul'];
                $nama_matkul = $_POST['nama_matkul'];
                $semester = $_POST['semester'];
                $jenis_matkul = $_POST['jenis_matkul'];
                $sks = $_POST['sks'];
                $jam = $_POST['jam'];
                $keterangan = $_POST['keterangan'];

                try {
                    $stmt = $db->prepare("INSERT INTO matakuliah (kode_matkul, nama_matkul, semester, jenis_matkul, sks, jam, keterangan) 
                                          VALUES (:kode_matkul, :nama_matkul, :semester, :jenis_matkul, :sks, :jam, :keterangan)");
                    $stmt->bindParam(':kode_matkul', $kode_matkul);
                    $stmt->bindParam(':nama_matkul', $nama_matkul);
                    $stmt->bindParam(':semester', $semester);
                    $stmt->bindParam(':jenis_matkul', $jenis_matkul);
                    $stmt->bindParam(':sks', $sks);
                    $stmt->bindParam(':jam', $jam);
                    $stmt->bindParam(':keterangan', $keterangan);
                    $stmt->execute();

                    header("Location: index.php?p=matkul&aksi=list");
                } catch (PDOException $e) {
                    die("Error: " . $e->getMessage());
                }
            }
            break;

        case 'edit': // Edit data
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $kode_matkul = $_POST['kode_matkul'];
                $nama_matkul = $_POST['nama_matkul'];
                $semester = $_POST['semester'];
                $jenis_matkul = $_POST['jenis_matkul'];
                $sks = $_POST['sks'];
                $jam = $_POST['jam'];
                $keterangan = $_POST['keterangan'];

                try {
                    $stmt = $db->prepare("UPDATE matakuliah 
                                          SET kode_matkul = :kode_matkul, nama_matkul = :nama_matkul, semester = :semester, 
                                              jenis_matkul = :jenis_matkul, sks = :sks, jam = :jam, keterangan = :keterangan 
                                          WHERE id = :id");
                    $stmt->bindParam(':kode_matkul', $kode_matkul);
                    $stmt->bindParam(':nama_matkul', $nama_matkul);
                    $stmt->bindParam(':semester', $semester);
                    $stmt->bindParam(':jenis_matkul', $jenis_matkul);
                    $stmt->bindParam(':sks', $sks);
                    $stmt->bindParam(':jam', $jam);
                    $stmt->bindParam(':keterangan', $keterangan);
                    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                    $stmt->execute();

                    header("Location: index.php?p=matkul&aksi=list");
                } catch (PDOException $e) {
                    die("Error: " . $e->getMessage());
                }
            }
            break;

        case 'delete': // Hapus data
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                try {
                    $stmt = $db->prepare("DELETE FROM matakuliah WHERE id = :id");
                    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                    $stmt->execute();

                    header("Location: index.php?p=matkul&aksi=list");
                } catch (PDOException $e) {
                    die("Error: " . $e->getMessage());
                }
            }
            break;

        default:
            header("Location: index.php?p=matkul&aksi=list");
            break;
    }
} else {
    header("Location: index.php?p=matkul&aksi=list");
}
?>
