<?php

session_start();

// Periksa apakah pengguna sudah login, jika tidak, arahkan kembali ke halaman login
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit();
}


require 'functions.php';

$tableRecent = query('SELECT user_name, date FROM transaction ORDER BY id DESC LIMIT 4');
$namaUser = $_SESSION['username'];

// get timezone
date_default_timezone_set('Asia/Jakarta');

// get date and time
$currentDate = date('Y-m-d');
$currentTime = date('H:i:s');

//total of the month
$currentYear = date('Y');
$currentMonth = date('m');

//total income
$totalIncomeQuery = mysqli_query($conn, "SELECT SUM(price) AS totalIncome FROM transaction WHERE month(date) = $currentMonth");

if ($totalIncomeQuery) {
    $totalIncomeData = mysqli_fetch_assoc($totalIncomeQuery);
    $totalIncome = $totalIncomeData['totalIncome'];

    if ($totalIncome === null) {
        $totalIncome = 0;
    }
} else {
    $totalIncome = 0;
    echo 'Error : ' . mysqli_error($conn);
}
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href="./src/styles.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

</head>

<body class="bg-zinc-800">

    <div class="flex flex-row p-6 w-full h-full">

        <div class="basis-2/12">
            <div class="sidebar w-[250px] h-screen p-2 overflow-y-auto text-center bg-gradient-to-b from-fuchsia-400 to-purple-800 rounded-2xl">
                <div class="text-white text-xl">
                    <div class="p-2.5 mt-1 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" style="fill: #ffffff;">
                            <path d="M18.944 11.112C18.507 7.67 15.56 5 12 5 9.244 5 6.85 6.611 5.757 9.15 3.609 9.792 2 11.82 2 14c0 2.757 2.243 5 5 5h11c2.206 0 4-1.794 4-4a4.01 4.01 0 0 0-3.056-3.888zM18 17H7c-1.654 0-3-1.346-3-3 0-1.404 1.199-2.756 2.673-3.015l.581-.102.192-.558C8.149 8.274 9.895 7 12 7c2.757 0 5 2.243 5 5v1h1c1.103 0 2 .897 2 2s-.897 2-2 2z"></path>
                        </svg>
                        <h1 class="font-bold text-white text-2xl ml-3">MIKROBILL</h1>
                    </div>
                    <div class="my-2 bg-gray-600 h-[1px]"></div>
                </div>
                <a class="p-2.5 mt-10 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-fuchsia-700 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: #ffff;">
                        <path d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v7zm1-10h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1z"></path>
                    </svg>
                    <span class="text-[15px] ml-4 text-white font-normal">Overview</span>
                </a>
                <a href="user.php" class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-fuchsia-700 text-white">
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
                    <a href="logout.php" class="text-[15px] mx-auto text-white font-bold">Logout</a>
                </div>
            </div>
        </div>

        <div class="flex flex-col basis-10/12 px-16 2xl:px-20">
            <div class="flex justify-between items-center bg-neutral-600 rounded-xl px-6 py-4">
                <div class="text-white text-base font-normal">Date : <span id="currentDate"></span></div>
                <div class="text-white text-base font-normal"> @<?= $_SESSION["username"]; ?></div>
                <div class="text-white text-base font-normal">Time : <span id="currentTime"></span></div>
            </div>

            <div class="flex flex-col text-white font-bold mt-10">
                <h2 class="text-3xl font-semibold ">Overview</h2>
                <p class="text-md font-normal">Here what’s happening in your finance</p>
            </div>

            <div class="flex flex-row justify-between mt-5">
                <div class="w-[60%] 2xl:w-3/5 h-full bg-neutral-600 rounded-lg p-8">
                    <div class="flex flex-col text-white">
                        <canvas id="chart"></canvas>
                    </div>
                </div>
                <div class="flex flex-col w-[30%] bg-neutral-600 rounded-xl">
                    <div class="flex flex-col text-center p-4 font-semibold text-white">
                        <h3 class="text-xl">Recent Transaction</h3>
                        <div class="mx-auto mt-4 mb-2 w-24 bg-gray-200 h-[2px]"></div>
                    </div>

                    <?php foreach ($tableRecent as $row) : ?>
                        <div class="flex flex-row justify-between items-center p-4 text-white">
                            <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 18">
                                <path d="M7 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm2 1H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                            </svg>
                            <h1 class="pl-1"><?= $row["user_name"]; ?></h1>
                            <h1><?= $row["date"]; ?></h1>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>

            <div class="flex flex-row justify-between mt-10">
                <div class="w-[40%] 2xl:w-[40%] h-[18rem] bg-neutral-600 rounded-lg p-8">
                    <div class="flex flex-col text-center font-semibold text-white ">
                        <h3 class="text-xl">Package of Internet</h3>
                        <div class="mx-auto my-5 w-20 bg-gray-200 h-[2px]"></div>
                    </div>
                    <div class="flex flex-col text-white">
                        <div class="flex flex-row justify-between mt-3">
                            <img width="25" height="25" src="https://img.icons8.com/ios-filled/50/ffffff/student-male--v1.png" alt="student-male--v1" />
                            <h1 class="pl-2 font-semibold text-md">Paket Pelajar</h1>
                            <h1 class="text-md">150/Month</h1>
                        </div>
                        <div class="flex flex-row justify-between mt-3">
                            <img width="25" height="25" src="https://img.icons8.com/ios-glyphs/30/ffffff/tuition--v1.png" alt="tuition--v1" />
                            <h1 class="pl-2 font-semibold text-md">Paket Guru</h1>
                            <h1 class="text-md">150/Month</h1>
                        </div>
                        <div class="flex flex-row justify-between mt-3">
                            <img width="25" height="25" src="https://img.icons8.com/ios-filled/50/ffffff/ps-controller.png" alt="ps-controller" />
                            <h1 class="pl-2 font-semibold text-md">Paket Gamer</h1>
                            <h1 class="text-md">220/Month</h1>
                        </div>
                        <div class="flex flex-row justify-between mt-3">
                            <img width="25" height="25" src="https://img.icons8.com/pastel-glyph/25/ffffff/company--v2.png" alt="company--v2" />
                            <h1 class="pl-2 font-semibold text-md">Paket Bisnis</h1>
                            <h1 class="text-md">300/Month</h1>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col w-[60%] bg-neutral-600 rounded-xl p-8 ml-10">
                    <div class="flex flex-col text-center font-semibold">
                        <h3 class="text-white text-2xl">Total Income of The Month</h3>
                        <h3 class="text-white mt-20 text-4xl">Rp. <?= number_format($totalIncome, 0, ',', '.'); ?></h3>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php
    $months = [];
    for ($i = 1; $i <= 12; $i++) {
        $month = query("SELECT SUM(price) AS total FROM transaction WHERE month(start) = $i")[0];
        if ($month["total"] === NULL) {
            $month["total"] = 0;
        }
        array_push($months, $month["total"]);
    }
    ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the chart canvas element
            const ctx = document.getElementById('chart').getContext('2d');

            // Define the chart data
            const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec'];
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Income of The Months',
                    data: [
                        <?php foreach ($months as $m) : ?><?= "$m,"; ?><?php endforeach; ?>
                    ],
                    backgroundColor: 'rgba(232, 121, 249, 0.7)',
                    barThickness: 20,
                }]
            };

            // Define the chart options
            const chartOptions = {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
            };

            // Create and render the bar chart
            new Chart(ctx, {
                type: 'bar',
                data: data,
                options: chartOptions
            });
        });

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