<?php

require 'functions.php';

$id = $_GET["id"];

if (delete_package($id) > 0) {
    echo "<script> 
                alert('Data Berhasil di Hapus!');
                document.location.href = 'package.php';
            </script>";
} else {
    echo "<script> 
                alert('Data Gagal di Hapus!');
                document.location.href = 'package.php';
            </script>";
}
