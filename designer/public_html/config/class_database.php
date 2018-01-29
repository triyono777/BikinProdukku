<?php

class Database {

//bikin properties
    private $connect;
    private $hostname;
    private $username;
    private $password;
    private $database;

    private $sql;
    private $query;
    private $query2;
    private $data;
    private $count;
	private $conn;

//    buka koneksi
    function openConnection($hostname, $username, $password, $database) {

        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;

        $this->connect = mysqli_connect($this->hostname, $this->username, $this->password,$this->database) or die(mysqli_connect_error());

    }
	function conn() {
		return $this->conn = $this->connect;
	}

//    tutup koneksi
    function closeConnection() {

        if (empty($this->connect)) {
            echo 'tidak ada koneksi ke database';
        } else {
            mysqli_close($this->connect);
        }

    }

//    perintah query
    function query($sql) {

        $this->sql = $sql;
        $this->query = mysqli_query($this->connect,$this->sql) or die(mysqli_connect_error());

    }
	function query2($sql) {

        $this->sql = $sql;
        $this->query2 = mysqli_query($this->connect,$this->sql) or die(mysqli_connect_error());

    }

//    ambil hasil query
    function getData() {

        if (empty($this->query)) {
            echo 'query belum ada'; exit();
        } else {
            return $this->data = mysqli_fetch_object($this->query);
        }

    }
	//    hitung jumlah data hasil query
    function countData() {
        
        if (empty($this->query)) {
            echo 'query belum ada'; exit();
        } else {
            return $this->count = mysqli_num_rows($this->query);
        }
	}

}

?>
