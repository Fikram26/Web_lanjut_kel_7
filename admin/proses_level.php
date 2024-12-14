<?php
// Include the PDO database connection
include 'koneksi.php';

if ($_GET['proses'] == 'insert') {
    try {
        // Prepare the insert query
        $stmt = $db->prepare("INSERT INTO level (nama_level, keterangan) VALUES (:nama_level, :keterangan)");

        // Bind the form data to the query
        $stmt->bindParam(':nama_level', $_POST['nama_level'], PDO::PARAM_STR);
        $stmt->bindParam(':keterangan', $_POST['keterangan'], PDO::PARAM_STR);

        // Execute the query
        $stmt->execute();

        // Redirect after successful insert
        echo "<script>window.location='index.php?p=level'</script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

if ($_GET['proses'] == 'update') {
    try {
        // Prepare the update query
        $stmt = $db->prepare("UPDATE level SET nama_level = :nama_level, keterangan = :keterangan WHERE id = :id");

        // Bind the form data and the ID to the query
        $stmt->bindParam(':nama_level', $_POST['nama_level'], PDO::PARAM_STR);
        $stmt->bindParam(':keterangan', $_POST['keterangan'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);

        // Execute the query
        $stmt->execute();

        // Redirect after successful update
        echo "<script>window.location='index.php?p=level'</script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

if ($_GET['proses'] == 'delete') {
    try {
        // Prepare the delete query
        $stmt = $db->prepare("DELETE FROM level WHERE id = :id");

        // Bind the ID to the query
        $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);

        // Execute the query
        $stmt->execute();

        // Redirect after successful delete
        echo "<script>window.location='index.php?p=level'</script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
