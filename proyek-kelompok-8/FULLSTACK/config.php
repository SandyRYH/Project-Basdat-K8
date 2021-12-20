<?php

$servername = "localhost";
$port = 5432;
$username = "postgres";
$password = "keychan";
$database = "ipbsepeda";

$conn = pg_connect("host = $servername port = $port dbname = $database user = $username password = $password");

if (!$conn) {
    die("Gagal terhubung dengan database");
}
