<?php
require_once "db.php";
require_once "Employee.php";

$db = (new Database())->getConnection();
$employee = new Employee($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employee->update($_POST['id'], $_POST['name'], $_POST['position'], $_POST['salary']);
    header("Location: index.php");
}

$id = $_GET['id'];
$employees = $employee->read();
$currentEmployee = null;
foreach ($employees as $row) {
    if ($row['id'] == $id) {
        $currentEmployee = $row;
        break;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Karyawan</h2>
        <form method="post">
            <input type="hidden" name="id" value="<?= $currentEmployee['id']; ?>">
            <input type="text" name="name" class="form-control mb-2" value="<?= $currentEmployee['name']; ?>" required>
            <input type="text" name="position" class="form-control mb-2" value="<?= $currentEmployee['position']; ?>" required>
            <input type="number" name="salary" class="form-control" value="<?= $currentEmployee['salary']; ?>" required>
            <button type="submit" class="btn btn-primary mt-2">Simpan</button>
        </form>
        <a href="index.php" class="btn btn-secondary mt-2">Kembali</a>
    </div>
</body>
</html>
