<?php
$db=pg_connect('host=localhost dbname=sepeda user=postgres password=250802');
if( !$db ){
    die("Gagal terhubung dengan database: " . pg_connect_error());
}
