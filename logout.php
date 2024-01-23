<?php
// mengaktifkan session php
session_start();
$_SESSION = [];
session_unset();
// menghapus semua session
session_destroy();

// mengalihkan halaman ke halaman login
header("location:./");
exit();
