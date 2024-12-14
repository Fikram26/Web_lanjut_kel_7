<?php
// Assuming the database connection is configured in koneksi.php as a PDO connection
include 'koneksi.php'; 

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
    case 'list':
?>

<!-- Tampilan Halaman List level -->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Level</h1>
</div>
<div class="col-12 mb-3">
    <a href="index.php?p=level&aksi=input" class="btn btn-primary">Tambah Level</a>
</div>

<!-- Tabel Responsif dengan Bootstrap -->
<div class="table-responsive">
<table class="table table-bordered" id="example">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama_level</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
            // Use PDO to retrieve data
            $stmt = $db->prepare("SELECT * FROM level");
            $stmt->execute();
            $no = 1;
            while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= htmlspecialchars($data['nama_level']) ?></td>
                <td><?= htmlspecialchars($data['keterangan']) ?></td>
                <td>
                    <a href="index.php?p=level&aksi=edit&id=<?= $data['id'] ?>" class="btn btn-success">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <a href="proses_level.php?proses=delete&id=<?= $data['id'] ?>" 
                       class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data?')">
                        <i class="bi bi-trash3"></i> Delete
                    </a>
                </td>
            </tr>
        <?php
            $no++;
            }
        ?>
        </tbody>
    </table>
</div>

<?php
break;

case 'input':
?>

<div class="row">
    <div class="col-8">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Input level</h1>
        </div>

        <div class="container">
            <form action="proses_level.php?proses=insert" method="post">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nama level</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_level" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="keterangan" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
break;

case 'edit':
    $id = $_GET['id'];
    $stmt = $db->prepare("SELECT * FROM level WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="container">
    <div class="row">
        <h1 class="h2">Edit level</h1>
        <div class="col-8">
            <form action="proses_level.php?proses=update&id=<?= $data['id'] ?>" method="post">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nama level</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_level" value="<?= htmlspecialchars($data['nama_level']) ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="keterangan" value="<?= htmlspecialchars($data['keterangan']) ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
break;
}
?>

<script>
$(document).ready(function(){
    $('#example').DataTable();
});
</script>
</html>
