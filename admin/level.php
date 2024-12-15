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
            $aksi=isset($_GET['aksi']) ? $_GET['aksi']: 'list';
            switch ($aksi){
                case 'list':
                   
        ?>
        
     <section class="content">
        <div class="">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable level</h3>
              </div>
              
                    

                <!-- /.card-header -->
                <div class="card-body">
              <div class="mb-3">
                <a href="index.php?p=level&aksi=input" class="btn btn-success btn-lg">
                <i class="fas fa-plus-circle"></i> Tambah level
                </a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
        <!-- Bagian <thead> harus diletakkan di sini -->
        <thead>
                 <tr>
                    <th>No</th>
                    <th>Nama level</th>
                    <th>keterangan</th>
                    <th>Aksi</th>
                </tr>
        </thead>
        <!-- Mulai bagian <tbody> -->
        <tbody>
            <?php
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
                            <a href="index.php?p=level&aksi=edit&id=<?= $data['id'] ?>" class="btn btn-success"><i class="bi bi-pencil"></i> Edit</a>
                            <a href="proses_level.php?proses=delete&id=<?= $data['id'] ?>" class="btn btn-danger"
                               onclick="return confirm('Yakin dihapus?')"><i class="bi bi-trash"></i> Delete</a>
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

<div class="container">
    <div class="row">
        <!-- Offset added to shift form to the right -->
        <div class="col-md-5 offset-md">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Input level</h1>
            </div>
            <form action="proses_level.php?proses=insert" method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama level</label>
                    <input type="text" class="form-control" name="nama_level" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">keterangan</label>
                    <input type="text" class="form-control" name="keterangan" required>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <button type="reset" class="btn btn-secondary" name="reset">Reset</button>
            </form>
        </div>
    </div>
</div>
<?php
break;
case 'edit';
include 'koneksi.php';
$stmt = $db->prepare("SELECT * FROM level WHERE id = :id");
$stmt->bindParam(':id', $_GET['id']);
$stmt->execute();
$data_level = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<div class="container">
 <div class="row">
 <div class="col-md-5 offset-md">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> Edit  level</h1>
 </div>
 <form action="proses_level.php?proses=edit" method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama level</label>
                    <input type="text" class="form-control" name="nama_level" value="<?= htmlspecialchars($data_level['nama_level']) ?>" required>
                    <input type="hidden" name="id" value="<?= $data_level['id'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">keterangan</label>
                    <input type="text" class="form-control" name="keterangan" value="<?= htmlspecialchars($data_level['keterangan']) ?>" required>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <button type="reset" class="btn btn-secondary" name="reset">Reset</button>
            </form>
            </div>
            </div>
            </section>
    <?php
    break;
      }
?>

                

 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jszip/jszip.min.js"></script>
<script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
