<h2>Data Prodi</h2>
<table id="example" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>NO</th>
            <th>Prodi Id</th>
            <th>Nama Prodi</th>
            <th>Jenjang Studi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include 'admin/koneksi.php';

        try {
            $query = "SELECT * FROM prodi";
            $stmt = $db->prepare($query);
            $stmt->execute();
            
            $no = 1;
            while ($data_prodi = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= htmlspecialchars($data_prodi['id']) ?></td>
                    <td><?= htmlspecialchars($data_prodi['nama_prodi']) ?></td>
                    <td><?= htmlspecialchars($data_prodi['jenjang_std']) ?></td>
                </tr>
                <?php
                $no++;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
    </tbody>
</table>
