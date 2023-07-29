<?php

require 'functions.php';

?>

<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./src/styles.css" rel="stylesheet">
  <title>login</title>

</head>

<body class="bg-zinc-800">
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
        <img src="./asset/bg.png" class="rounded-sm" alt="Strange liquid">
      </div>
    </div>
  </section>



</body>

</html>