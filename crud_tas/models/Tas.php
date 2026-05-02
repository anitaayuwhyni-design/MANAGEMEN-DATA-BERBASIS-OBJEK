<?php

class Tas {

    private $conn;
    private $table = "tas";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        return mysqli_query($this->conn, "SELECT * FROM $this->table");
    }

    public function create($nama, $merk, $warna, $harga, $stok) {
        $query = "INSERT INTO tas (nama_tas, merk, warna, harga, stok)
                  VALUES ('$nama','$merk','$warna','$harga','$stok')";
        return mysqli_query($this->conn, $query);
    }

    public function delete($id) {
        return mysqli_query($this->conn, "DELETE FROM tas WHERE id=$id");
    }

    public function getById($id) {
        return mysqli_query($this->conn, "SELECT * FROM tas WHERE id=$id");
    }

    public function update($id, $nama, $merk, $warna, $harga, $stok) {
        $query = "UPDATE tas SET
                    nama_tas='$nama',
                    merk='$merk',
                    warna='$warna',
                    harga='$harga',
                    stok='$stok'
                  WHERE id=$id";
        return mysqli_query($this->conn, $query);
    }
}