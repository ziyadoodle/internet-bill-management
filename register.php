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
<<<<<<< HEAD
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./src/styles.css" rel="stylesheet">
    <title>login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
=======
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./src/styles.css" rel="stylesheet">
  <title>login</title>
>>>>>>> e0049c9ad5434021f29c4d40e64ba3dbf9948fdb

</head>

<body class="bg-zinc-800">
<<<<<<< HEAD
<section class="flex items-center justify-center">
        <div class="container">
           
            <div class="relative ltr">
                <div class="backdrop-blur-[30px] bg-[#ffffff33] absolute top-44  left-96 w-1/2 h-1/2  rounded-3xl flex justify-center items-center p-16 border-solid border-2 border-white ">
                    <div class="flex flex-col space-y-4 absolute h-full w-full top-10 start-14 font-sans">
                    <h1 class="text-6xl text-white font-bold">Register Here!</h1> 
                    <h1 class="text-2xl text-white">Please fill the form for register.</h1>
                    </div>
                    <form class="pt-32 z-10" method="post">
                    <div class="mb-4 ">
      <label class="block text-white text-sm font-bold mb-2" for="username">
        Username
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-40 text-white leading-tight focus:outline-none focus:shadow-outline  bg-transparent" id="username" type="text" placeholder="Username" name="username" required>
    </div>
    <div class="mb-4">
      <label class="block text-white text-sm font-bold mb-2" for="password">
        Password
      </label>
      <input class="shadow appearance-none border border-white rounded w-full py-2 px-3 text-white  leading-tight focus:outline-none focus:shadow-outline bg-transparent" id="password" type="password" placeholder="password" name="password" required>
    </div>
    <div class="mb-4 ">
      <label class="block text-white text-sm font-bold mb-2" for="username">
        Confirm password
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-40 text-white mb-10 leading-tight focus:outline-none focus:shadow-outline bg-transparent" id="password2" type="password" placeholder="confirm password" name="password2" required> 
    </div>
    <div class="flex items-center justify-center">
      <input type="submit" class="bg-gradient-to-r from-emerald-700 to via-violet-700 to-pink-500 text-white font-bold py-2 px-20 rounded focus:outline-none focus:shadow-outline hover:from-pink-500 hover:to-violet-500  ring-red-800 "  name="tbl_register"> 
        
</input>
      
     
      
    </div>
                        </form>
                    <div>
                       
                        
                    </div>
                </div>
                <img src="./asset/bg.png" class="rounded-sm" alt="Strange liquid">
=======
  <section class="flex items-center justify-center">
    <div class="container">

      <div class="relative ltr">
        <div class="backdrop-blur-[30px] bg-[#ffffff33] absolute top-44  left-96 w-1/2 h-1/2  rounded-3xl flex justify-center items-center p-16 border-solid border-2 border-white ">
          <div class="flex flex-col space-y-4 absolute h-full w-full top-10 start-14 font-sans">
            <h1 class="text-6xl text-white font-bold">Register Here!</h1>
            <h1 class="text-2xl text-white">Please fill the form for register.</h1>
          </div>
          <form class="pt-32 z-10">
            <div class="mb-4 ">
              <label class="block text-white text-sm font-bold mb-2" for="username">
                Username
              </label>
              <input class="shadow appearance-none border rounded w-full py-2 px-40 text-white leading-tight focus:outline-none focus:shadow-outline  bg-transparent" id="username" type="text" placeholder="Username">
>>>>>>> e0049c9ad5434021f29c4d40e64ba3dbf9948fdb
            </div>
            <div class="mb-4">
              <label class="block text-white text-sm font-bold mb-2" for="password">
                Password
              </label>
              <input class="shadow appearance-none border border-white rounded w-full py-2 px-3 text-white  leading-tight focus:outline-none focus:shadow-outline bg-transparent" id="password" type="password" placeholder="password">
            </div>
            <div class="mb-4 ">
              <label class="block text-white text-sm font-bold mb-2" for="username">
                Confirm password
              </label>
              <input class="shadow appearance-none border rounded w-full py-2 px-40 text-white mb-10 leading-tight focus:outline-none focus:shadow-outline bg-transparent" id="username" type="text" placeholder="confirm password">
            </div>
            <div class="flex items-center justify-center">
              <button class="bg-gradient-to-r from-emerald-700 to via-violet-700 to-pink-500 text-white font-bold py-2 px-20 rounded focus:outline-none focus:shadow-outline hover:from-pink-500 hover:to-violet-500  ring-red-800 " type="button">
                Register
              </button>



            </div>
          </form>
          <div>


          </div>
        </div>
<<<<<<< HEAD
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
=======
        <img src="./asset/bg.png" class="rounded-sm" alt="Strange liquid">
      </div>
    </div>
  </section>



>>>>>>> e0049c9ad5434021f29c4d40e64ba3dbf9948fdb
</body>


</html>