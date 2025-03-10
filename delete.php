<?php
require_once "db.php";
require_once "Employee.php";

$db = (new Database())->getConnection();
$employee = new Employee($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $employee->delete($_POST['id']);
    header("Location: index.php");
}
?>
