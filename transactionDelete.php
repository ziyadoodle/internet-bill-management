<?php

require 'functions.php';

$id = $_GET["id"];

if (delete_transaction($id) > 0) {
    echo "<script> 
                alert('Data Successfully Deleted!');
                document.location.href = 'transaction.php';
            </script>";
} else {
    echo "<script> 
                alert('Data Failed to Delete!');
                document.location.href = 'transaction.php';
            </script>";
}
