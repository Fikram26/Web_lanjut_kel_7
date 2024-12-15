<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<?php
    include 'koneksi.php';
    $aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
    switch ($aksi) {
        case 'list':
?>
<section class="content">
    <div class="">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataTable USER</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="index.php?p=user&aksi=input" class="btn btn-success btn-lg">
                            <i class="fas fa-plus-circle"></i> Tambah USER
                        </a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Email</th>
                                <th>Nama Lengkap</th>
                                <th>Level</th>
                                <th>No Telpon</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stmt = $db->prepare("SELECT user.id, user.email, user.nama_lengkap, level.nama_level, user.notelp, user.alamat FROM user INNER JOIN level ON user.level_id = level.id");
                            $stmt->execute();
                            $no = 1;
                            while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= htmlspecialchars($data['email']) ?></td>
                                <td><?= htmlspecialchars($data['nama_lengkap']) ?></td>
                                <td><?= htmlspecialchars($data['nama_level']) ?></td>
                                <td><?= htmlspecialchars($data['notelp']) ?></td>
                                <td><?= htmlspecialchars($data['alamat']) ?></td>
                                <td>
                                    <a href="index.php?p=user&aksi=edit&id=<?= $data['id'] ?>" class="btn btn-success">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <a href="proses_user.php?proses=delete&id=<?= $data['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin di hapus?')">
                                        <i class="bi bi-trash"></i> Delete
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
            </div>
        </div>
    </div>
</section>
<?php
    break;
    case 'input':
?>
<div class="container">
    <div class="row">
        <div class="col-md-5 offset-md">
            <h1 class="h2">Input User</h1>
            <form action="proses_user.php?proses=insert" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="text" class="form-control" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="level_id" class="form-label">Level ID</label>
                    <select name="level_id" class="form-select" id="level_id" required>
                        <option value="">-Pilih level-</option>
                        <?php
                        $stmt = $db->prepare("SELECT * FROM level");
                        $stmt->execute();
                        while ($data_level = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value=" . $data_level['id'] . ">" . htmlspecialchars($data_level['nama_level']) . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama_lengkap" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">No Telp</label>
                    <input type="tel" class="form-control" name="notelp" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" required></textarea>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Photo</label>
                    <div class="col-sm-10">
                        <input type="file" name="fileToUpload" class="form-control" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <button type="reset" class="btn btn-secondary" name="reset">Reset</button>
            </form>
        </div>
    </div>
</div>
<?php
    break;
}
?>
<!-- Scripts -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/dist/js/adminlte.min.js"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
</body>
</html>
