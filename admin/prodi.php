<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Prodi</h1>
</div>
<?php 
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
    case 'list':
?>

<div class="row">
    <div class="col-2 mb-3">
        <a href="index.php?p=prodi&aksi=input" class="btn btn-primary">Tambah Prodi</a>
    </div>
    <div class="table-responsive small">
        <table class="table table-bordered table-striped table-sm" id="example">
            <tr>
                <th>No</th>
                <th>Nama Prodi</th>
                <th>Jenjang</th>
                <th>Aksi</th>
            </tr>
            <?php
                include 'koneksi.php';
                $stmt = $db->prepare("SELECT * FROM prodi");
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                foreach ($result as $data) {
            ?>
            <tr>
                <td><?= htmlspecialchars($data['id']) ?></td>
                <td><?= htmlspecialchars($data['nama_prodi']) ?></td>
                <td><?= htmlspecialchars($data['jenjang_std']) ?></td>
                <td>
                    <a href="index.php?p=prodi&aksi=edit&id=<?= htmlspecialchars($data['id']) ?>" class="btn btn-success">Edit</a>
                    <a href="proses_prodi.php?proses=delete&id=<?= htmlspecialchars($data['id']) ?>" class="btn btn-danger" onclick="return confirm('Yakin mau dihapus?')">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>

<?php
    break;

    case 'input':    
?>
<div class="row">
    <div class="col-6 mx-auto">
        <br>
        <h2>Data Prodi</h2>
        <form action="proses_prodi.php?proses=insert" method="post">
            <div class="mb-3">
                <label class="form-label">Nama Prodi</label>
                <input type="text" class="form-control" name="nama_prodi">
            </div>
            <div class="mb-3">
                <label class="form-label">Jenjang</label>
                <select class="form-select" name="jenjang">
                    <option selected>~ Pilih Jenjang ~</option>
                    <?php
                        $jenjang = ['D3', 'D4', 'S1', 'S2'];
                        foreach ($jenjang as $jenjangprodi) {
                            echo "<option value='" . htmlspecialchars($jenjangprodi) . "'>" . htmlspecialchars($jenjangprodi) . "</option>";
                        }
                    ?>
                </select> 
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <button type="reset" class="btn btn-warning" name="reset">Reset</button>
            </div>
        </form>
    </div>
</div>

<?php
    break;

    case 'edit':
        include 'koneksi.php';
        $stmt = $db->prepare("SELECT * FROM prodi WHERE id = :id");
        $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
        $stmt->execute();
        $data_prodi = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<div class="row">
    <div class="col-6 mx-auto">
        <br>
        <h2>Data Prodi</h2>
        <form action="proses_prodi.php?proses=edit" method="post">
            <div class="mb-3">
                <label class="form-label">Nama Prodi</label>
                <input type="hidden" class="form-control" name="id" value="<?= htmlspecialchars($data_prodi['id']) ?>">
                <input type="text" class="form-control" name="nama_prodi" value="<?= htmlspecialchars($data_prodi['nama_prodi']) ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Jenjang</label>
                <select class="form-select" name="jenjang">
                    <option selected>~ Pilih Jenjang ~</option>
                    <?php
                        $jenjang = ['D3', 'D4', 'S1', 'S2'];
                        foreach ($jenjang as $jenjangprodi) {
                            $selected = ($data_prodi['jenjang_std'] === $jenjangprodi) ? 'selected' : '';
                            echo "<option value='" . htmlspecialchars($jenjangprodi) . "' $selected>" . htmlspecialchars($jenjangprodi) . "</option>";
                        }
                    ?>
                </select> 
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary" name="submit">Update</button>
            </div>
        </form>
    </div>
</div>

<?php
        break;
}
?>
