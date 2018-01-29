<?php
require_once 'class_database.php';
 
$sql = new Database();
 
//bikin sql ke database
$sql->openConnection('localhost', 'root', '', 'tjiwi');
$array_bulan = array(1=>'Januari','Februari','Maret', 'April', 'Mei', 'Juni','Juli','Agustus','September','Oktober', 'November','Desember');
 ?>