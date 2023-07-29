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

// ⭐⭐⭐ USER START ⭐⭐⭐

function create_user($data)
{
    global $conn;

    $user_name = htmlspecialchars($data["user_name"]);
    $address = htmlspecialchars($data["address"]);
    $date = htmlspecialchars($data["date"]);
    $comment = htmlspecialchars($data["comment"]);

    $query = "INSERT INTO user
                VALUES
                (NULL,'$user_name', '$address', '$date', '$comment')
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}




// ⭐⭐⭐ USER END ⭐⭐⭐



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

function update_package($data)
{
    global $conn;

    $id = $data["id_package"];
    $name = htmlspecialchars($data["package_name"]);
    $desc = htmlspecialchars($data["package_desc"]);
    $price = htmlspecialchars($data["package_price"]);

    $query = "UPDATE package SET
                package_name = '$name',
                descriptions = '$desc',
                price = $price
            WHERE id = $id
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delete_package($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM package WHERE id = $id");

    return mysqli_affected_rows($conn);
}
// ⭐⭐⭐ PACKAGE ⭐⭐⭐

//TRANSACTION
function create_transaction($data)
{

    global $conn;

    $name = htmlspecialchars($data["name"]);
    $package = htmlspecialchars($data["package"]);
    $date = htmlspecialchars($data["date"]);
    $start = htmlspecialchars($data["start"]);
    $end = htmlspecialchars($data["end"]);
    $price = htmlspecialchars($data["price"]);

    $query = "INSERT INTO transaction VALUES (NULL, '$name', '$date', '$package', '$start', '$end')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//TRANSACTION
