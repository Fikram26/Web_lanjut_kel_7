<h2>Data Mahasiswa</h2>
<table id="example" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Email</th>
            <th>No Telp</th>
            <th>Alamat</th>
            <th>Prodi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Koneksi menggunakan PDO
        try {
            // Mengganti koneksi mysqli dengan PDO
            // $db = new PDO('mysql:host=localhost;dbname=', 'username', 'password');
            $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Query menggunakan PDO
            $sql = "SELECT mahasiswa.*, prodi.nama_prodi 
                    FROM mahasiswa 
                    JOIN prodi ON mahasiswa.prodi_id = prodi.id";
            $stmt = $db->prepare($sql);
            $stmt->execute();

            // Menampilkan hasil query
            $no = 1;
            while ($data_mhs = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $data_mhs['nim'] ?></td>
            <td><?= $data_mhs['nama_mhs'] ?></td>
            <td><?= $data_mhs['email'] ?></td>
            <td><?= $data_mhs['nohp'] ?></td>
            <td><?= $data_mhs['alamat'] ?></td>
            <td><?= $data_mhs['nama_prodi'] ?></td>
        </tr>
        <?php
            $no++;
            }
        } catch (PDOException $e) {
            echo "Koneksi gagal: " . $e->getMessage();
        }
        ?>
    </tbody>
</table>
