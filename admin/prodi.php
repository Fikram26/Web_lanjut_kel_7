<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Prodi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Prodi</h1>
        </div>
        <?php 
        $aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
        include 'koneksi.php';

        switch ($aksi) {
            case 'list':
        ?>
        <div class="row">
            <div class="col-2 mb-3">
                <a href="index.php?p=prodi&aksi=input" class="btn btn-primary">Tambah Prodi</a>
            </div>
            <div class="table-responsive small">
                <table class="table table-bordered table-striped table-sm" id="example">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Prodi</th>
                            <th>Jenjang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $stmt = $db->query("SELECT * FROM prodi");
                            while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <tr>
                            <td><?= $data['id'] ?></td>
                            <td><?= $data['nama_prodi'] ?></td>
                            <td><?= $data['jenjang_std'] ?></td>
                            <td>
                                <a href="index.php?p=prodi&aksi=edit&id=<?= $data['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                                <a href="proses_prodi.php?proses=delete&id=<?= $data['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus?')">Delete</a>
                            </td>
                        </tr>
                        <?php
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
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h2>Data Prodi</h2>
                <form action="proses_prodi.php?proses=insert" method="post">
                    <div class="mb-3">
                        <label class="form-label">Nama Prodi</label>
                        <input type="text" class="form-control" name="nama_prodi" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenjang</label>
                        <select class="form-select" name="jenjang" required>
                            <option selected>~ Pilih Jenjang ~</option>
                            <?php
                                $jenjang = ['D3', 'D4', 'S1', 'S2'];
                                foreach ($jenjang as $jenjangprodi) {
                                    echo "<option value='$jenjangprodi'>$jenjangprodi</option>";
                                }
                            ?>
                        </select> 
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </div>
                </form>
            </div>
        </div>
        <?php
            break;

            case 'edit':
                $stmt = $db->prepare("SELECT * FROM prodi WHERE id = :id");
                $stmt->execute(['id' => $_GET['id']]);
                $data_prodi = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h2>Edit Data Prodi</h2>
                <form action="proses_prodi.php?proses=edit" method="post">
                    <div class="mb-3">
                        <label class="form-label">Nama Prodi</label>
                        <input type="hidden" name="id" value="<?= $data_prodi['id'] ?>">
                        <input type="text" class="form-control" name="nama_prodi" value="<?= $data_prodi['nama_prodi'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenjang</label>
                        <select class="form-select" name="jenjang" required>
                            <option selected>~ Pilih Jenjang ~</option>
                            <?php
                                $jenjang = ['D3', 'D4', 'S1', 'S2'];
                                foreach ($jenjang as $jenjangprodi) {
                                    $selected = ($data_prodi['jenjang_std'] == $jenjangprodi) ? 'selected' : '';
                                    echo "<option value='$jenjangprodi' $selected>$jenjangprodi</option>";
                                }
                            ?>
                        </select> 
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
        <?php
            break;
        }
        ?>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
