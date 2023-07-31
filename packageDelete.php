<?php

require 'functions.php';

$id = $_GET["id"];

if (delete_package($id) > 0) {
    echo "<script> 
                alert('Data Successfully Deleted!');
                document.location.href = 'package.php';
            </script>";
} else {
    echo "<script> 
                alert('Data Failed to Delete!');
                document.location.href = 'package.php';
            </script>";
}
