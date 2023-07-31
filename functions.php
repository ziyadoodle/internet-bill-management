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

    // Periksa apakah username sudah terdaftar
    $result = mysqli_query($conn, "SELECT username FROM account WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('username sudah terdaftar!');
            </script>
            ";
        return false;
    }

    // Periksa apakah password dan konfirmasi password sama
    if ($password !== $password2) {
        echo "
            <script>
                alert('password tidak sama!');
            </script>
            ";
        return false;
    }

    // Jika data valid, lakukan insert ke tabel account
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO account VALUES(NULL, '$username', '$password')");

    return mysqli_affected_rows($conn);
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
    $price = $selectPrice[0]["price"];

    $query = "INSERT INTO transaction VALUES (NULL, '$name', '$date', '$package', '$start', '$end', $price)";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function update_transaction($data)
{
    global $conn;

    $id = $data["id_transaction"];
    $username = htmlspecialchars($data["transaction_user_name"]);
    $package_name = htmlspecialchars($data["transaction_package_name"]);
    $start = $data["transaction_start"];
    $end = $data["transaction_end"];

    $selectPrice = query("SELECT * FROM package WHERE package_name = '$package_name'");
    $price = $selectPrice[0]["price"];

    $query = "UPDATE transaction SET
                user_name = '$username',
                package_name = '$package_name',
                start = '$start',
                end = '$end',
                price = $price
            WHERE id = $id
                ";

    var_dump($query);

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delete_transaction($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM transaction WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function report_transactions($from, $to)
{
    global $conn;

    // Mengubah format tanggal
    $from = date_format(date_create($from), 'Y-m-d');
    $to = date_format(date_create($to), 'Y-m-d');

    $query = "SELECT user.id, user.user_name, user.address, user.comment, 
                    transaction.id AS transaction_id, transaction.package_name, transaction.date, transaction.start, transaction.end, 
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

// ⭐⭐⭐ Account ⭐⭐⭐
function update_account($data)
{
    global $conn;

    $id = $data["account_id"];
    $password = $data["password"];
    $passwordOld = mysqli_real_escape_string($conn, $data["old_password"]);
    $passwordNew = mysqli_real_escape_string($conn, $data["new_password"]);

    if ($password == $passwordNew) {
        echo "
            <script>
                alert('password tidak boleh sama dengan yang dulu!');
            </script>
            ";
    }

    if (password_verify($passwordOld, $password)) {
        $passwordNew = password_hash($passwordNew, PASSWORD_DEFAULT);
        $query = ("UPDATE account SET password = '$passwordNew' WHERE id = $id");
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
        header("Location: account.php");
        exit;
    } else {
        echo "
            <script>
                alert('Old Password does Not Match!');
            </script>
            ";
    }
}
// ⭐⭐⭐ Account ⭐⭐⭐
