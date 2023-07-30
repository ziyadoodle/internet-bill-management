<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
<?php

// database connection
function koneksi()
{
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "internet_bill";

    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    return $conn;
}

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
    $comment = htmlspecialchars($data["comment"]);

    $query = "INSERT INTO user
                VALUES
                (NULL,'$user_name', '$address', '$comment')
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delete_user($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM user WHERE id = $id");

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

    $selectPrice = query("SELECT * FROM package WHERE package_name = '$package'");
    var_dump($selectPrice);
    $price = $selectPrice[0]["price"];

    $query = "INSERT INTO transaction VALUES (NULL, '$name', '$date', '$package', '$start', '$end', $price)";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// function report_transactions($from, $to)
// {
//     $conn = koneksi();
//     $query = "SELECT user.id, user.user_name, user.address, user.date, user.comment, 
//                      transaction.id AS transaction_id, transaction.package_name, transaction.start, transaction.end, 
//                      package.id AS package_id, package.descriptions, package.price 
//               FROM user 
//               JOIN transaction ON user.user_name = transaction.user_name 
//               JOIN package ON transaction.package_name = package.package_name 
//               WHERE transaction.date BETWEEN '$from' AND '$to'";

//     $result = mysqli_query($conn, $query);
//     $rows = [];
//     while ($row = mysqli_fetch_assoc($result)) {
//         $rows[] = $row;
//     }
//     mysqli_close($conn);
//     return $rows;
// }

function report_transactions($from, $to)
{
    $conn = koneksi();


    // Mengubah format tanggal
    $from = date_format(date_create($from), 'Y-m-d');
    $to = date_format(date_create($to), 'Y-m-d');

    $query = "SELECT user.id, user.user_name, user.address, user.date, user.comment, 
                    transaction.id AS transaction_id, transaction.package_name, transaction.start, transaction.end, 
                    package.id AS package_id, package.descriptions, package.price 
            FROM user 
            JOIN transaction ON user.user_name = transaction.user_name 
            JOIN package ON transaction.package_name = package.package_name
            WHERE transaction.date BETWEEN '$from' AND '$to' ";

    $result = $conn->query($query);

    if ($result) {

        $dataLaporan = array();
        while ($row = $result->fetch_assoc()) {
            $dataLaporan[] = $row;
        }
        $conn->close();
        return $dataLaporan;
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
        $conn->close();
        return array();
    }
}

//TRANSACTION
