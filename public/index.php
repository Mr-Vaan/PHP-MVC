<?php 
// Jalankan SESSIONnya Disini :
// Artinya, jadi kalo gaada SESSION, jalankan fungsi session_start();
// biar simple 1 baris yang sama saja.
// Sudah,Jadi Sessionnya jalan dari awal.
if( !session_id() ) session_start();

require_once '../app/init.php'; // teknik botstraping

$app = new App;

