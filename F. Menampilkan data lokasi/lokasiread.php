<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
          <h1 class="m-0">Lokasi</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
          <a href="?page=home"> Home</a>
          </li>
          <li class="breadcrumb-item">Lokasi</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<!-- /.content-header -->
<div class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Data Lokasi</h3>
      <a href="?page=lokasicreate"
      class="btn btn-success btn-sm float-right">
      <i class="fa fa-plus-circle"></i> Tambah Data</a>
    </div>

    <div class="card-body">
      <table id="mytable" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Lokasi</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>No</th>
          <th>Nama Lokasi</th>
          <th>Opsi</th>
        </tr>
      </tfoot>
      <tbody>
      <?php
      $database = new Database();
      $db = $database->getConnection();

      $selectSql = "SELECT * FROM lokasi";

      $stmt = $db->prepare($selectSql);
      $stmt->execute();

      $no = 1;
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $row['nama_lokasi'] ?></td>
        <td>
          <a href="?page=lokasiupdate&id=<?php echo $row['id'] ?>"
            class="btn btn-primary btn-sm mr-1">
              <i class="fa fa-edit"></i> Ubah
          </a>
          <a href="?page=lokasidelete&id=<?php echo $row['id'] ?>"
            class="btn btn-danger btn-sm"
        onClick="javascript: return confirm('Konfirmasi data akan dihapus?');">
              <i class="fa fa-trash"></i> Hapus
          </a>
        </td>
      </tr>
      <?php
      }
      ?>
      </tbody>
      </table>
    </div>
  </div>
</div>

<?php include_once "partials/scripts.php" ?>
<?php include_once "partials/scriptsdatatables.php" ?>
<script>
    $(function() {
        $('#mytable').DataTable()
    });
</script>