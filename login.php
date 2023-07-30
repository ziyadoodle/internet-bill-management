<?php

// session_start();

require 'functions.php';

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['login'])) {
    if (login($_POST)) {
        // Login successful, redirect to index.php
        header("Location: index.php");
        exit();
    }
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

<body class="bg-zinc-800">
<div class="alert alert-warning" role="alert">
    </div>

  <section class="flex items-center justify-center h-full">
    <div class="container">

      <div class="flex justify-center items-center">
        <div class="flex flex-col backdrop-blur-[30px] bg-[#67676733] w-2/5 2xl:w-1/2 h-1/2  rounded-3xl justify-center items-center py-8 px-10 2xl:py-16 2xl:px-16 border-solid border-2 border-white">
          <div class="flex flex-col space-y-4 h-full w-full start-14 font-sans mb-6 2xl:mb-12">
            <h1 class="text-4xl 2xl:text-6xl text-white font-bold">Hey,Hello ! 👋</h1>
            <h1 class="text-lg 2xl:text-2xl text-white">Welcome to MIKROBILL.</h1>
          </div>
          <form class="pt-20 z-10" method="POST">
            <div class="mb-4 ">
              <label class="block text-white text-sm font-bold mb-2" for="username">
                Username
              </label>
              <input class=" shadow appearance-none border rounded w-full py-2 px-40 text-white leading-tight focus:outline-none focus:shadow-outline bg-transparent" id="username" type="text" placeholder="Username">
            </div>
            <div class="mb-4 2xl:mb-8">
              <label class="block text-white text-sm font-bold mb-2" for="password">Password</label>
              <input id="password" name="password" type="password" class="shadow appearance-none border border-white rounded w-full p-4 text-white  leading-tight focus:outline-none focus:shadow-outline bg-transparent" placeholder="Password">
            </div>
            <div class="mb-4 2xl:mb-8">
              <input type="checkbox" name="remember" id="remember">
              <label class="text-white text-sm font-bold mb-2 ml-2" for="remember">Remember Me</label>
            </div>
            <div class="flex items-center justify-center">
              <input class="bg-gradient-to-r from-emerald-700 to via-violet-700 to-pink-500 text-white font-bold py-2 px-20 rounded focus:outline-none focus:shadow-outline hover:from-pink-500 hover:to-violet-500  ring-red-800 " type="submit" name="login">
              </input>



            </div>
          </form>

        </div>
      </div>

    </div>
  </section>



</body>


</html>