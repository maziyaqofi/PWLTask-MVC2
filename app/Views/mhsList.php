<html>
<head>
  <title>Data Mahasiswa</title>
  <link rel="stylesheet" href="/mvc-example/assets/css/bootstrap.css" />
  <script src="/mvc-example/assets/js/bootstrap.js"></script>
</head>
<body>
  <div class="container mt-4">
    <h3>Data Mahasiswa</h3>
    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>No</th>
          <th>NIM</th>
          <th>Nama</th>
          <th>Created At</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        <?php foreach($rs as $row): ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['nim']) ?></td>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= $row['created_at'] ?></td>
            <td>
              <a href="index.php?act=delete&id=<?= $row['id'] ?>"
                 class="btn btn-sm btn-danger"
                 onclick="return confirm('Yakin mau hapus data ini?')">
                Delete
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <a href="index.php" class="btn btn-primary">Kembali</a>
  </div>
</body>
</html>
