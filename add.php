<?php
require_once "db.php";
require_once "Employee.php";

$db = (new Database())->getConnection();
$employee = new Employee($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employee->create($_POST['name'], $_POST['position'], $_POST['salary']);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Tambah Karyawan</h2>
        <form method="post">
            <input type="text" name="name" class="form-control mb-2" placeholder="Nama" required>
            <input type="text" name="position" class="form-control mb-2" placeholder="Jabatan" required>
            <input type="number" name="salary" class="form-control" placeholder="Gaji" required>
            <button type="submit" class="btn btn-primary mt-2">Simpan</button>
        </form>
        <a href="index.php" class="btn btn-secondary mt-2">Kembali</a>
    </div>
</body>
</html>