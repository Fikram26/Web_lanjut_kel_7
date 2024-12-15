<h2>Data Dosen</h2>
<table id="example" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama Dosen</th>
            <th>Email</th>
            <th>Prodi</th>
            <th>No Telp</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        <?php
            include 'admin/koneksi.php';

            try {
                $stmt = $db->prepare("SELECT * FROM dosen");
                $stmt->execute();

                $no = 1;
                while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($data['nip']) ?></td>
                        <td><?= htmlspecialchars($data['nama_dosen']) ?></td>
                        <td><?= htmlspecialchars($data['email']) ?></td>
                        <td><?= htmlspecialchars($data['prodi_id']) ?></td>
                        <td><?= htmlspecialchars($data['notelp']) ?></td>
                        <td><?= htmlspecialchars($data['alamat']) ?></td>
                    </tr>
                    <?php
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        ?>
    </tbody>
</table>
