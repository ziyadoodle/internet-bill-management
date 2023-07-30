<?php

// session_start();

require 'functions.php';

// cek cookie
// if (isset($_COOKIE['num']) && isset($_COOKIE['ket'])) {
//   $id = $_COOKIE['num'];
//   $key = $_COOKIE['key'];

//   // ambil username berdasarkan id
//   $result = mysqli_query($conn, "SELECT username FROM account WHERE id = $id");
//   $row = mysqli_fetch_assoc($result);

//   // cek cookie dan username
//   if ($key === hash('sha256', $row["username"])) {
//     $_SESSION["login"] = true;
//   }
// }

// if (isset($_SESSION["login"])) {
//   header("Location: index.php");
//   exit;
// }

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM account WHERE username = '$username'");

  // cek username
  if (mysqli_num_rows($result) === 1) {

    // cek password
    $row = mysqli_fetch_assoc($result);
    var_dump($row);
    if (password_verify($password, $row["password"])) {
      // set session
      // $_SESSION["login"] = true;

      // cek remember me
      // if (isset($_POST["remember"])){
      //   // buat cookie
      //   setcookie('num', $row['id'], time()+60);
      //   setcookie('key', hash('sha256', $row['username']), time()+60);
      // }

      header("Location: index.php");
      exit;
    }
  }

  $error = true;
}
?>

<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./src/styles.css" rel="stylesheet">
  <title>Mikrobill - Login</title>

  <style>
    body {
      background: url("./asset/bg.png") no-repeat center/70%;
    }
  </style>

</head>

<body class="bg-zinc-800 h-screen">
  <div class="alert alert-warning" role="alert">
  </div>

  <section class="flex items-center justify-center h-full">
    <div class="container">

      <div class="flex justify-center items-center">
        <div class="flex flex-col backdrop-blur-[30px] bg-[#67676733] w-2/5 2xl:w-1/2 h-1/2 rounded-3xl justify-center items-center py-8 px-10 2xl:py-16 2xl:px-16 border-solid border-2 border-white">
          <div class="flex flex-col space-y-4 h-full w-full start-14 font-sans mb-6 2xl:mb-12">
            <h1 class="text-4xl 2xl:text-6xl text-white font-bold">Hey,Hello ! 👋</h1>
            <h1 class="text-lg 2xl:text-2xl text-white">Welcome to MIKROBILL.</h1>
          </div>
          <?php if (isset($error)) : ?>
            <p class="text-red-500">username / password salah!</p>
          <?php endif; ?>
          <form class="w-full" method="POST">
            <div class="mb-4 2xl:mb-8">
              <label class="block text-white text-sm font-bold mb-2" for="username">Username</label>
              <input id="username" name="username" type="text" placeholder="Username" class="shadow appearance-none border rounded w-full p-4 text-white leading-tight focus:outline-none focus:shadow-outline bg-transparent">
            </div>
            <div class="mb-4 2xl:mb-8">
              <label class="block text-white text-sm font-bold mb-2" for="password">Password</label>
              <input id="password" name="password" type="password" class="shadow appearance-none border border-white rounded w-full p-4 text-white  leading-tight focus:outline-none focus:shadow-outline bg-transparent" placeholder="password">
            </div>
            <div class="mb-4 2xl:mb-8">
              <input type="checkbox" name="remember" id="remember">
              <label class="text-white text-sm font-bold mb-2 ml-2" for="remember">Remember Me</label>
            </div>
            <div class="flex items-center justify-center">
              <button type="submit" name="login" class="bg-gradient-to-r from-teal-600 to via-violet-700 to-fuchsia-500 transition ease-in-out duration-300 text-white font-bold py-4 px-20 rounded focus:outline-none focus:shadow-outline hover:bg-gradient-to-l ring-red-800">Login</button>
            </div>
            <div class="text-center text-white mt-3 2xl:mt-5">
              <span>Not have account? <a href="./register.php" class="font-bold hover:underline">Register</a></span>
            </div>

          </form>

        </div>
      </div>

    </div>
  </section>



</body>


</html>