<?php
include 'koneksi.php';
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
    case 'list':
?>

<div class="row">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dosen</h1>
    </div>
    
    <!-- Pindahkan tombol ke bawah tulisan Dosen -->
    <div class="col-12 mb-3">
        <a href="index.php?p=dosen&aksi=input" class="btn btn-primary">Tambah Dosen</a>
    </div>
            <div class="table-responsive small">
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama Dosen</th>
                        <th>Email</th>
                        <th>Prodi</th>
                        <th>No Telp</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $stmt = $db->prepare("SELECT dosen.*, prodi.nama_prodi FROM prodi JOIN dosen ON prodi.id = dosen.prodi_id");
                    $stmt->execute();
                    $no = 1;
                    while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($data['nip']) ?></td>
                            <td><?= htmlspecialchars($data['nama_dosen']) ?></td>
                            <td><?= htmlspecialchars($data['email']) ?></td>
                            <td><?= htmlspecialchars($data['nama_prodi']) ?></td>
                            <td><?= htmlspecialchars($data['notelp']) ?></td>
                            <td><?= htmlspecialchars($data['alamat']) ?></td>
                            <td>
                                <a href="index.php?p=dosen&aksi=edit&id=<?= $data['id'] ?>" class="btn btn-success"><i class="bi bi-pencil"></i> Edit</a>
                                <a href="proses_dosen.php?proses=delete&id=<?= $data['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin mau dihapus?')"> <i class="bi bi-x-circle"></i> Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>

        <?php
        break;

    case 'input':
        ?>
            <div class="row">
                <div class="col-6 mx-auto">
                    <br>
                    <h2>Data Dosen</h2>
                    <form action="proses_dosen.php?proses=insert" method="post">
                        <div class="mb-3">
                            <label class="form-label">NIP</label>
                            <input type="text" class="form-control" name="nip">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Dosen</label>
                            <input type="text" class="form-control" name="nama_dosen">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Prodi</label>
                            <select name="prodi_id" class="form-select">
                                <option value="">Pilih Prodi</option>
                                <?php
                                $stmt = $db->prepare("SELECT * FROM prodi");
                                $stmt->execute();
                                while ($data_prodi = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<option value=".$data_prodi['id'].">".htmlspecialchars($data_prodi['nama_prodi'])."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No Telp</label>
                            <input type="text" class="form-control" name="notelp">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            <button type="reset" class="btn btn-warning" name="reset">Reset</button>
                        </div>
                        <hr>
                    </form>
                </div>
            </div>

        <?php
        break;

    case 'edit':
        $stmt = $db->prepare("SELECT * FROM dosen WHERE id = :id");
        $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
        $stmt->execute();
        $data_dosen = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>

            <div class="row">
                <div class="col-6 mx-auto">
                    <br>
                    <h2>Edit Data Dosen</h2>
                    <form action="proses_dosen.php?proses=edit" method="post">
                        <div class="mb-3">
                            <label class="form-label">NIP</label>
                            <input type="hidden" class="form-control" name="id" value="<?= $data_dosen['id'] ?>">
                            <input type="text" class="form-control" name="nip" value="<?= htmlspecialchars($data_dosen['nip']) ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Dosen</label>
                            <input type="text" class="form-control" name="nama_dosen" value="<?= htmlspecialchars($data_dosen['nama_dosen']) ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($data_dosen['email']) ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Prodi</label>
                            <select name="prodi_id" class="form-select">
                                <option value="">Pilih Prodi</option>
                                <?php
                                $stmt = $db->prepare("SELECT * FROM prodi");
                                $stmt->execute();
                                while ($data_prodi = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $selected = ($data_prodi['id'] == $data_dosen['prodi_id']) ? 'selected' : '';
                                    echo "<option value=".$data_prodi['id']." $selected>".htmlspecialchars($data_prodi['nama_prodi'])."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No Telp</label>
                            <input type="text" class="form-control" name="notelp" value="<?= htmlspecialchars($data_dosen['notelp']) ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="<?= htmlspecialchars($data_dosen['alamat']) ?>">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" name="submit">Update</button>
                        </div>
                        <hr>
                    </form>
                </div>
            </div>

    <?php
        break;
}
?>
