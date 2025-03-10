<?php
    class Employee{
        public function __construct(){
            include 'koneksi.php';
        }
        public function Show(){
            $sql = "SELECT * FROM employees";
            $query = $this->db->query($sql);
            $query->execute();
            return $query;
        }
    }
?>