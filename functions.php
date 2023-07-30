<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
<?php

// database connection
$conn = mysqli_connect("localhost", "root", "", "internet_bill");

function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // Periksa apakah password dan konfirmasi password sama
    if ($password !== $password2) {
        echo "<script>alert('Konfirmasi password tidak sesuai.');</script>";
        return false;
    }

    // Periksa apakah username sudah terdaftar
    $result = mysqli_query($conn, "SELECT username FROM account WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Username sudah terdaftar.');</script>";
        return false;
    }

    // Jika data valid, lakukan insert ke tabel account
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $insertQuery = "INSERT INTO account (username, password) VALUES ('$username', '$hashedPassword')";
    $insertResult = mysqli_query($conn, $insertQuery);

    if ($insertResult) {
        return true; // Registrasi berhasil
    } else {
        echo "<script>alert('Gagal daftar: " . mysqli_error($conn) . "');</script>";
        return false; // Registrasi gagal
    }
}

// ⭐⭐⭐ PACKAGE ⭐⭐⭐
function create_package($data)
{
    global $conn;

    $name = htmlspecialchars($data["name"]);
    $desc = htmlspecialchars($data["description"]);
    $price = htmlspecialchars($data["price"]);

    $query = "INSERT INTO package
                VALUES
                (NULL, '$name', '$desc', '$price')
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function update_package()
{
}

function delete_package()
{
}
// ⭐⭐⭐ PACKAGE ⭐⭐⭐


