<h2>Data Matakuliah</h2>

<table id="example" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>kode matakuliah</th>
            <th>Nama matakuliah</th>
            <th>Semester</th>
            <th>Jenis Matakuliah</th>
            <th>Sks</th>
            <th>Jam</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include 'admin/koneksi.php';

        try {
            $stmt = $db->prepare("SELECT * FROM matakuliah");
            $stmt->execute();

            $no = 1;
            while ($data_matkul = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= htmlspecialchars($data_matkul['kode_matkul']) ?></td>
            <td><?= htmlspecialchars($data_matkul['nama_matkul']) ?></td>
            <td><?= htmlspecialchars($data_matkul['semester']) ?></td>
            <td><?= htmlspecialchars($data_matkul['jenis_matkul']) ?></td>
            <td><?= htmlspecialchars($data_matkul['sks']) ?></td>
            <td><?= htmlspecialchars($data_matkul['jam']) ?></td>
            <td><?= htmlspecialchars($data_matkul['keterangan']) ?></td>
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
