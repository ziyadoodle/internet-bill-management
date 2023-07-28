<?php

require './functions.php';

?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./src/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">

</head>

<body class="bg-zinc-800">

    <div class="flex flex-row p-6 w-full h-screen">
        <div class="basis-2/12">
            <div class="sidebar w-[250px] h-full p-2 overflow-y-auto text-center bg-gradient-to-b from-fuchsia-400 to-purple-800 rounded-2xl">
                <div class="text-white text-xl">
                    <div class="p-2.5 mt-1 flex items-center">
                        <i><img class="w-14 h-14" src="https://img.icons8.com/ios/100/ffffff/happy-cloud.png" alt="happy-cloud" /></i>
                        <h1 class="font-bold text-white text-2xl ml-3">MIKROBILL</h1>
                    </div>
                    <div class="my-2 bg-gray-600 h-[1px]"></div>
                </div>
                <div class="p-2.5 mt-10 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-fuchsia-700 text-white">
                    <i><img class="w-5 h-5" src="https://img.icons8.com/material/48/ffffff/speedometer.png" alt="speedometer" /></i>
                    <span class="text-[15px] ml-4 text-white font-normal">Overview</span>
                </div>
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-fuchsia-700 text-white">
                    <i><img class="w-5 h-5" src="https://img.icons8.com/ios-filled/50/ffffff/conference-background-selected.png" alt="conference-background-selected" /></i>
                    <span class="text-[15px] ml-4 text-white font-normal">User</span>
                </div>
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-fuchsia-700 text-white">
                    <i><img class="w-5 h-5" src="https://img.icons8.com/ios-filled/50/ffffff/online-package-tracking.png" alt="online-package-tracking" /></i>
                    <span class=" text-[15px] ml-4 text-white font-normal">Package</span>
                </div>
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-fuchsia-700 text-white">
                    <i><img class="w-5 h-5" src="https://img.icons8.com/ios-filled/50/ffffff/line-chart.png" alt="line-chart" /></i>
                    <span class="text-[15px] ml-4 text-white font-normal">Transaction!</span>
                </div>
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-fuchsia-700 text-white">
                    <i><img class="w-5 h-5" src="https://img.icons8.com/ios-filled/50/ffffff/user-male-circle.png" alt="user-male-circle" /></i>
                    <span class="text-[15px] ml-4 text-white font-normal">Account</span>
                </div>

                <div class="p-2.5 mt-10 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-zinc-800 hover:bg-zinc-950  text-white">
                    <span class="text-[15px] mx-auto text-white font-bold">Logout</span>
                </div>
            </div>
        </div>

        <div class="topbar flex flex-col basis-10/12 px-16 2xl:px-20">
            <div class="h-14 left-0 top-0 flex justify-between items-center bg-neutral-600 rounded-xl px-6">
                <div class="text-white text-base font-normal">date</div>
                <div class="text-white text-base font-normal">admin</div>
                <div class="text-white text-base font-normal">time</div>
            </div>

            <div class="flex flex-col w-[70%] h-[22rem] bg-neutral-600 rounded-lg p-8 mt-24">
                <div class="flex flex-row items-center text-white font-bold">
                    <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/FFFFFF/new-product.png" alt="new-product" />
                    <h1 class="pl-2">Create Package</h1>
                </div>

                <div class="flex flex-col text-white mt-6">
                    <div class="flex flex-row w-full items-center pr-10 py-2">
                        <label for="name" class="w-3/12">Name</label>
                        <input type="text" name="name" id="name" class="h-8 w-9/12 border-none outline-none mt-1 rounded px-4 bg-neutral-500" value="" autocomplete="off" />
                    </div>
                    <div class="flex flex-row w-full items-center pr-10 py-2">
                        <label for="description" class="w-3/12">Description</label>
                        <input type="text" name="description" id="description" class="h-8 w-9/12 border-none outline-none mt-1 rounded px-4 bg-neutral-500" value="" autocomplete="off" />
                    </div>
                    <div class="flex flex-row w-full items-center pr-10 py-2">
                        <label for="price" class="w-3/12">Price</label>
                        <div class="price-input w-9/12 flex justify-between">
                            <input type="text" class="h-8 w-1/12 border-none outline-none mt-1 mr-2 px-1 text-center rounded bg-neutral-500" value="Rp." disabled />
                            <input type="text" name="price" id="price" class="h-8 w-11/12 border-none outline-none mt-1 rounded px-4 bg-neutral-500" value="" autocomplete="off" />
                        </div>
                    </div>
                    <div class="flex flex-row justify-end w-full items-center pr-10 py-2 mt-6">
                        <button type="submit" name="create-package" class="bg-neutral-500 text-white rounded-md px-4 py-2 transition duration-300 ease select-none hover:bg-neutral-700 focus:outline-none focus:shadow-outline">Create</button>
                    </div>
                </div>
            </div>

            <div class="flex-none w-full h-72 bg-neutral-600 rounded-lg mt-10">asd</div>
        </div>
    </div>

</body>

</html>