<?php

$servername = "localhost";
$username = "postgres";
$password = "keychan";
$database = "ipbsepeda";

$conn = pg_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Gagal terhubung dengan database");
}
