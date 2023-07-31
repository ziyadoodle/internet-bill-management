<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit();
}

require './functions.php';

// get timezone
date_default_timezone_set('Asia/Jakarta');

// get date and time
$currentDate = date('Y-m-d');
$currentTime = date('H:i:s');

$user = query("SELECT * FROM user");
$activeUserCount = count($user);

// create check
if (isset($_POST["submit"])) {
    if (create_user($_POST) > 0) {
        echo "<script> 
                alert('User Berhasil di Buat !');
                document.location.href = 'user.php';
            </script>";
    } else {
        echo "<script> 
        alert('User Gagal di Buat !');
    </script>";
    }
}


?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./src/styles.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/datepicker.min.js"></script>
</head>

<body class="bg-zinc-800">
    <div class="flex flex-row p-6 w-full h-screen">
        <div class="basis-2/12">
            <div class="sidebar w-[250px] h-full p-2 overflow-y-auto text-center bg-gradient-to-b from-fuchsia-400 to-purple-800 rounded-2xl">
                <div class="text-white text-xl">
                    <div class="p-2.5 mt-1 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" style="fill: #ffffff;">
                            <path d="M18.944 11.112C18.507 7.67 15.56 5 12 5 9.244 5 6.85 6.611 5.757 9.15 3.609 9.792 2 11.82 2 14c0 2.757 2.243 5 5 5h11c2.206 0 4-1.794 4-4a4.01 4.01 0 0 0-3.056-3.888zM18 17H7c-1.654 0-3-1.346-3-3 0-1.404 1.199-2.756 2.673-3.015l.581-.102.192-.558C8.149 8.274 9.895 7 12 7c2.757 0 5 2.243 5 5v1h1c1.103 0 2 .897 2 2s-.897 2-2 2z"></path>
                        </svg>
                        <h1 class="font-bold text-white text-2xl ml-3">MIKROBILL</h1>
                    </div>
                    <div class="my-2 bg-gray-600 h-[1px]"></div>
                </div>
                <a href="index.php" class="p-2.5 mt-10 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-fuchsia-700 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: #ffff;">
                        <path d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v7zm1-10h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1z"></path>
                    </svg>
                    <span class="text-[15px] ml-4 text-white font-normal">Overview</span>
                </a>
                <a class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-fuchsia-700 text-white">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                        <path d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
                        <path d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z" />
                    </svg>
                    <span class="text-[15px] ml-4 text-white font-normal">User</span>
                </a>
                <a href="package.php" class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-fuchsia-700 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: #ffff;">
                        <path d="M21.993 7.95a.96.96 0 0 0-.029-.214c-.007-.025-.021-.049-.03-.074-.021-.057-.04-.113-.07-.165-.016-.027-.038-.049-.057-.075-.032-.045-.063-.091-.102-.13-.023-.022-.053-.04-.078-.061-.039-.032-.075-.067-.12-.094-.004-.003-.009-.003-.014-.006l-.008-.006-8.979-4.99a1.002 1.002 0 0 0-.97-.001l-9.021 4.99c-.003.003-.006.007-.011.01l-.01.004c-.035.02-.061.049-.094.073-.036.027-.074.051-.106.082-.03.031-.053.067-.079.102-.027.035-.057.066-.079.104-.026.043-.04.092-.059.139-.014.033-.032.064-.041.1a.975.975 0 0 0-.029.21c-.001.017-.007.032-.007.05V16c0 .363.197.698.515.874l8.978 4.987.001.001.002.001.02.011c.043.024.09.037.135.054.032.013.063.03.097.039a1.013 1.013 0 0 0 .506 0c.033-.009.064-.026.097-.039.045-.017.092-.029.135-.054l.02-.011.002-.001.001-.001 8.978-4.987c.316-.176.513-.511.513-.874V7.998c0-.017-.006-.031-.007-.048zm-10.021 3.922L5.058 8.005 7.82 6.477l6.834 3.905-2.682 1.49zm.048-7.719L18.941 8l-2.244 1.247-6.83-3.903 2.153-1.191zM13 19.301l.002-5.679L16 11.944V15l2-1v-3.175l2-1.119v5.705l-7 3.89z"></path>
                    </svg>
                    <span class=" text-[15px] ml-4 text-white font-normal">Package</span>
                </a>
                <a href="transaction.php" class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-fuchsia-700 text-white">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1v14h16m0-9-3-2-3 5-3-2-3 4" />
                    </svg>
                    <span class="text-[15px] ml-4 text-white font-normal">Transaction</span>
                </a>
                <a href="account.php" class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-fuchsia-700 text-white">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                    </svg>
                    <span class="text-[15px] ml-4 text-white font-normal">Account</span>
                </a>

                <div class="p-2.5 mt-10 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-zinc-800 hover:bg-zinc-950  text-white">
                    <span class="text-[15px] mx-auto text-white font-bold">Logout</span>
                </div>
            </div>
        </div>

        <div class="topbar flex flex-col basis-10/12 px-16 2xl:px-20">
            <div class="flex justify-between items-center bg-neutral-600 rounded-xl px-6 py-4">
                <div class="text-white text-base font-normal">Date : <span id="currentDate"></span></div>
                <div class="text-white text-base font-normal"> @<?= $_SESSION["username"]; ?></div>
                <div class="text-white text-base font-normal">Time : <span id="currentTime"></span></div>
            </div>

            <div class="flex flex-between">
                <div class="flex flex-col items-center w-[30%] bg-neutral-600 rounded-lg p-8 mt-10 2xl:mt-24">
                    <a type="button" id="createButton" class="createButton hover:text-red-400 hover:cursor-pointer" title="Create" onclick="modalHandler(true);" data-bs-toggle="modal" data-bs-target="#ubahModal">
                        <div class=" flex flex-row items-center mt-1 text-white font-bold">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                <path d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Zm11-3h-2V5a1 1 0 0 0-2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 0 0 2 0V9h2a1 1 0 1 0 0-2Z" />
                            </svg>
                            <h1 class="pl-2">Create User</h1>
                        </div>
                    </a>

                </div>
                <div class="flex flex-col items-center w-[30%] ml-4 bg-neutral-600 rounded-lg p-8 mt-10 2xl:mt-24">
                    <div class="flex flex-row items-center text-white font-bold">
                        <h1 class="text-3xl"><?= $activeUserCount ?></h1>
                        <h1 class="pl-2">Active User</h1>
                    </div>
                </div>
            </div>


            <div class="flex w-full h-72 bg-neutral-600 rounded-lg mt-10 p-8">

                <div class="col-span-12">
                    <div class="overflow-y-auto h-full">
                        <table id="table" class="table-fixed overflow-y-scroll text-white border-collapse space-y-6 text-sm w-full">
                            <thead class="text-white sticky top-0 bg-neutral-700">
                                <tr>
                                    <th class="p-3 text-left w-1/12">No</th>
                                    <th class="p-3 text-left w-3/12">Name</th>
                                    <th class="p-3 text-center w-3/6">Address</th>
                                    <th class="p-3 text-left w-3/12">Comment</th>
                                    <th class="p-3 text-center w-1/12">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($user as $row) : ?>
                                    <tr class="">
                                        <td class="p-3">
                                            <?= $i; ?>
                                        </td>
                                        <td class="p-3 user_name" id="user_name">
                                            <?= $row["user_name"]; ?>
                                        </td>
                                        <td class="p-2 text-center address" id="address">
                                            <?= $row["address"]; ?>
                                        </td>
                                        </td>
                                        <td class="p-3 comment" id="comment">
                                            <?= $row["comment"]; ?>
                                        </td>
                                        <td class="flex justify-center py-3">
                                            <a href="userDelete.php?id=<?= $row['id']; ?>" type="button" id="delButton" name="delete" class="w-4 mr-2 hover:text-neutral-400 hover:cursor-pointer" title="delete" onclick="return confirm('Are you sure?');">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modals -->
    <div class="py-12 bg-gradient-to-b from-purple-800 to-transparent transition duration-150 ease-in-out z-10 absolute hidden top-0 right-0 bottom-0 left-0" id="modal">
        <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
            <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                <div class="w-full flex justify-start text-gray-600 mb-3">
                    <svg class="w-6 h-6 text-dark" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Zm11-3h-2V5a1 1 0 0 0-2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 0 0 2 0V9h2a1 1 0 1 0 0-2Z" />
                    </svg>
                </div>
                <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Create User</h1>

                <form method="POST">
                    <div class="modal-body">

                        <label for="user_name" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Name</label>
                        <input type="text" name="user_name" id="user_name" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" autocomplete="off" />

                        <label for="user_address" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Address</label>
                        <input type="text" name="address" id="address" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" autocomplete="off" />

                        <label for="package_price" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Comment</label>
                        <input type="text" name="comment" id="comment" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" autocomplete="off" />

                        <div class="flex items-center justify-start w-full">
                            <button type="submit" name="submit" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">Submit</button>
                            <button class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm" onclick="modalHandler()">Cancel</button>
                        </div>

                        <button class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600" onclick="modalHandler()" aria-label="close modal" role="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                        </button>
                    </div>
                </form>


            </div>
        </div>
    </div>

    <script src="./src/script.js"></script>
    <script>
        // modal
        let modal = document.getElementById("modal");

        function modalHandler(val) {
            if (val) {
                fadeIn(modal);
            } else {
                fadeOut(modal);
            }
        }

        function fadeOut(el) {
            el.style.opacity = 1;
            (function fade() {
                if ((el.style.opacity -= 0.1) < 0) {
                    el.style.display = "none";
                } else {
                    requestAnimationFrame(fade);
                }
            })();
        }

        function fadeIn(el, display) {
            el.style.opacity = 0;
            el.style.display = display || "flex";
            (function fade() {
                let val = parseFloat(el.style.opacity);
                if (!((val += 0.2) > 1)) {
                    el.style.opacity = val;
                    requestAnimationFrame(fade);
                }
            })();
        }

        // date and time
        function updateClock() {
            const currentDateElement = document.getElementById('currentDate');
            const currentTimeElement = document.getElementById('currentTime');

            const now = new Date();

            const currentDateStr = now.toDateString();
            const currentTimeStr = now.toLocaleTimeString(undefined, {
                hour12: false
            });

            currentDateElement.textContent = currentDateStr;
            currentTimeElement.textContent = currentTimeStr;
        }

        setInterval(updateClock, 1000);

        updateClock();
    </script>

</body>

</html>