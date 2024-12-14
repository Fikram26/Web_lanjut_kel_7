<?php
include 'koneksi.php'; 
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';

switch ($aksi) {
    case 'list':
?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Berita</h1>
    </div>
    <div class="row">
        <div class="col-3 mb-3">
            <a href="index.php?p=berita&aksi=input" class="btn btn-primary"><i class="bi bi-file-earmark-plus"></i> Tambah berita</a>
        </div>
        <div class="table-responsive small">
            <table class="table table-bordered table-striped table-sm" id="example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>User</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Fetch berita data with PDO
                    $sql = "SELECT berita.*, user.email, kategori.nama_kategori 
                            FROM berita 
                            JOIN user ON user.id = berita.user_id 
                            JOIN kategori ON kategori.id = berita.kategori_id 
                            WHERE berita.user_id != 0 AND berita.kategori_id != 0";
                    
                    $stmt = $db->prepare($sql);
                    $stmt->execute();
                    
                    // Fetch results
                    $no = 1;
                    while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= htmlspecialchars($data['judul']) ?></td>
                        <td><?= htmlspecialchars($data['nama_kategori']) ?></td>
                        <td><?= htmlspecialchars($data['email']) ?></td> 
                        <td><?= htmlspecialchars($data['created_at']) ?></td>
                        <td>
                            <a href="index.php?p=berita&aksi=edit&id=<?= $data['id'] ?>" class="btn btn-success btn-sm">
                                <i class="bi bi-pencil"></i> Edit</a>
                            <a href="proses_berita.php?proses=delete&id=<?= $data['id'] ?>&file=<?= $data['file_upload'] ?>" 
                            class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data?')">
                            <i class="bi bi-trash"></i> Delete</a>
                        </td>
                    </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
    break;

    case 'input':
?>
    <<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Input Berita</h1>
</div>
<div class="mt-5 ms-3 col-6">
    <form action="proses_berita.php?proses=insert" method="post" enctype="multipart/form-data" class="mt-4">
        <div class="form-group row mb-3">
            <label for="judul" class="col-sm-4 col-form-label">Judul</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="judul" required autofocus>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="kategori_id" class="col-sm-4 col-form-label">Kategori</label>
            <div class="col-sm-8">
                <select name="kategori_id" class="form-select" required>
                    <option value="">-Pilih Kategori-</option>
                    <?php
                    // Fetch kategori data with PDO
                    $sql = "SELECT * FROM kategori";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    while ($data_kategori = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='" . $data_kategori['id'] . "'>" . htmlspecialchars($data_kategori['nama_kategori']) . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="fileToUpload" class="col-sm-4 col-form-label">File Upload</label>
            <div class="col-sm-8">
                <input type="file" name="fileToUpload" class="form-control" id="file-upload">
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-sm-4 col-form-label"></label>
            <div class="col-sm-8">
                <img src="#" alt="Preview Uploaded Image" id="file-preview" width="300" style="display:none;">
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="isi_berita" class="col-sm-4 col-form-label">Berita</label>
            <div class="col-sm-8">
                <textarea class="form-control" id="isi_berita" name="isi_berita" rows="3" required></textarea>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-8 offset-sm-4">
                <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                <button type="reset" class="btn btn-warning" name="reset">Reset</button>
            </div>
        </div>
    </form>
</div>

<?php
    break;

    case 'edit':
        // Fetch berita data to edit with PDO
        $sql = "SELECT * FROM berita WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
        $stmt->execute();
        $data_berita = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$data_berita) {
            die("Query failed: Berita not found.");
        }
?>
    <div class="mt-5 ms-3 col-6">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Berita</h1>
        </div>
        <form action="proses_berita.php?proses=edit" method="post" enctype="multipart/form-data" class="mt-4">
            <input type="hidden" class="form-control" name="id" value="<?= $data_berita['id'] ?>">

            <div class="form-group row mb-3">
                <label for="judul" class="col-sm-4 col-form-label">Judul</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="judul" value="<?= htmlspecialchars($data_berita['judul']) ?>" required>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="kategori_id" class="col-sm-4 col-form-label">Kategori</label>
                <div class="col-sm-8">
                    <select name="kategori_id" class="form-select" required>
                    <?php
                    // Fetch kategori data to edit with PDO
                    $kategori = $db->prepare("SELECT * FROM kategori");
                    $kategori->execute();
                    
                    while ($data_kategori = $kategori->fetch(PDO::FETCH_ASSOC)) {
                        $selected = ($data_kategori['id'] == $data_berita['kategori_id']) ? 'selected' : '';
                        echo "<option value='" . $data_kategori['id'] . "' $selected>" . htmlspecialchars($data_kategori['nama_kategori']) . "</option>";
                    }
                    ?>
                    </select>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="fileToUpload" class="col-sm-4 col-form-label">File Upload</label>
                <div class="col-sm-8">
                    <input type="file" name="fileToUpload" class="form-control" id="file-upload">
                </div>
            </div>

            <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label"></label>
                <div class="col-sm-8">
                    <img src="<?= htmlspecialchars($data_berita['file_upload']) ?>" alt="Preview Uploaded Image" id="file-preview" width="300">
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="isi_berita" class="col-sm-4 col-form-label">Berita</label>
                <div class="col-sm-8">
                    <textarea class="form-control" id="isi_berita" name="isi_berita" rows="3" required><?= htmlspecialchars($data_berita['isi_berita']) ?></textarea>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-8 offset-sm-4">
                    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                    <button type="reset" class="btn btn-warning" name="reset">Reset</button>
                </div>
            </div>
        </form>
    </div>
<?php
    break;
}
?>
