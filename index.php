<?php
include 'koneksi.php';

$stmt = $pdo->query("SELECT * FROM employees");
$employees = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h2>Manajemen Karyawan</h2>
    <a href="add.php" class="btn btn-primary mb-3">Tambah Karyawan</a>
    <table id="employeeTable" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Gaji</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $emp): ?>
                <tr>
                    <td><?= $emp['id']; ?></td>
                    <td><?= $emp['name']; ?></td>
                    <td><?= $emp['position']; ?></td>
                    <td>Rp <?= number_format($emp['salary'], 2, ',', '.'); ?></td>
                    <td>
                        <a href="edit.php?id=<?= $emp['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete.php?id=<?= $emp['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#employeeTable').DataTable();
        });
    </script>
</body>
</html>
