<?php
class Database {
    public function connect() {
        $conn = mysqli_connect("localhost", "root", "", "db_tas");

        if (!$conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        return $conn;
    }
}