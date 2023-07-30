<?php

require 'functions.php';

$id = $_GET["id"];

if (delete_transaction($id) > 0) {
    echo "<script> 
                alert('Data Berhasil di Hapus!');
                document.location.href = 'transaction.php';
            </script>";
} else {
    echo "<script> 
                alert('Data Gagal di Hapus!');
                document.location.href = 'transaction.php';
            </script>";
}
