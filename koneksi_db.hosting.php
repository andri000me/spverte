<?php

$host = "mysql.idhostinger.com";
$username = "u201018041_pakar";
$password = "spvertebrata";
$db = "u201018041_sp";

mysql_connect($host, $username, $password) or die("Gagal koneksi...".mysql_error());
mysql_select_db($db) or die("Database tidak ditemukan...".mysql_error());
?>