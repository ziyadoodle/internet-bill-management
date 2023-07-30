<?php

require 'functions.php';

if (isset($_POST["tbl_register"])) {
  // Panggil fungsi registrasi untuk menangani pendaftaran user
  $result = registrasi($_POST);

  if ($result) {
    echo "<script>alert('User berhasil ditambahkan');</script>";
  } else {
    // Tidak perlu menampilkan pesan gagal disini, sudah ditampilkan di fungsi registrasi
  }
}
?>

<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./src/styles.css" rel="stylesheet">
  <title>Mikrobill - Register</title>

  <style>
    body {
      background: url("./asset/bg.png") no-repeat center/70%;
    }
  </style>

</head>

<body class="bg-zinc-800 h-screen">
  <section class="flex items-center justify-center h-full">
    <div class="container">
      <div class="flex justify-center items-center">
        <div class="flex flex-col backdrop-blur-[30px] bg-[#67676733] w-2/5 2xl:w-1/2 h-1/2  rounded-3xl justify-center items-center py-8 px-10 2xl:py-16 2xl:px-16 border-solid border-2 border-white ">
          <div class="flex flex-col space-y-4 h-full w-full start-14 font-sans mb-6 2xl:mb-12">
            <h1 class="text-4xl 2xl:text-6xl text-white font-bold">Register Here!</h1>
            <h1 class="text-lg 2xl:text-2xl text-white">Please fill the form for register.</h1>
          </div>
          <form class="w-full" method="post">
            <div class="mb-4 2xl:mb-8">
              <label class="block text-white text-sm font-bold mb-2" for="username">
                Username
              </label>
              <input class="shadow appearance-none border rounded w-full p-4 text-white leading-tight focus:outline-none focus:shadow-outline  bg-transparent" id="username" type="text" name="username" required autocomplete="off">
            </div>
            <div class="mb-4 2xl:mb-8">
              <label class="block text-white text-sm font-bold mb-2" for="password">
                Password
              </label>
              <input class="shadow appearance-none border border-white rounded w-full p-4 text-white  leading-tight focus:outline-none focus:shadow-outline bg-transparent" id="password" type="password" name="password" required autocomplete="off">
            </div>
            <div class="mb-6 2xl:mb-8">
              <label class="block text-white text-sm font-bold mb-2" for="username">
                Confirm password
              </label>
              <input class="shadow appearance-none border rounded w-full p-4 text-white leading-tight focus:outline-none focus:shadow-outline bg-transparent" id="password2" type="password" name="password2" required autocomplete="off">
            </div>
            <div class="flex items-center justify-center">
              <button type="submit" name="tbl_register" class="bg-gradient-to-r from-teal-600 to via-violet-700 to-fuchsia-500 transition ease-in-out duration-300 text-white font-bold py-4 px-20 rounded focus:outline-none focus:shadow-outline hover:bg-gradient-to-l ring-red-800">Register</button>
            </div>
            <div class="text-center text-white mt-3 2xl:mt-5">
              <span>Already have account? <a href="./login.php" class="font-bold hover:underline">Login</a></span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</body>


</html>