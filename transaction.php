<?php

require './functions.php';

$transaction = query("SELECT * FROM transaction");
$package = query("SELECT * FROM package");


if (isset($_POST["create"])) {
    if (create_transaction($_POST) > 0) {
        echo "<script> 
                alert('Transaksi Berhasil!');
                document.location.href = 'transaction.php';
            </script>";
    } else {
        echo "<script> 
                alert('Transaksi Gagal!');
            </script>";
    }
}

//jika paket sudah diset
if(isset($_POST["package_name"])){
    $cari = $_GET["package_name"];

    //ambil data dari database
    $data = mysqli_query($conn, "SELECT * FROM package WHERE package_name = '$cari'");
}else{
    //jika paket belum diset
    $data = [];
}

if (isset($_POST["print"])){
    
}

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
                    <span class="text-[15px] ml-4 text-white font-normal">Transaction</span>
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
            <div class="flex justify-between items-center bg-neutral-600 rounded-xl px-6 py-4">
                <div class="text-white text-base font-normal">date</div>
                <div class="text-white text-base font-normal">admin</div>
                <div class="text-white text-base font-normal">time</div>
            </div>

            <div class="flex flex-row justify-betwee mt-5">
                <div class="w-[70%] 2xl:w-[70%] h-[32rem] bg-neutral-600 rounded-lg p-8">
                    <div class="flex flex-row items-center text-white font-bold">
                        <img width="30" height="30" src="https://img.icons8.com/?size=512&id=15115&format=png" alt="new-transaction" />
                        <h1 class="pl-2">Create Transaction</h1>
                    </div>

                    <form action="" method="POST">
                        <div class="flex flex-col text-white mt-6">
                            <div class="flex flex-row w-full items-center pr-10 py-2">
                                <label for="name" class="w-3/12">Name</label>
                                <select name="name" id="name" class="form-control h-8 w-9/12 border-none outline-none mt-1 rounded px-4 bg-neutral-500" value="" onChange= "document.getElementById.submit();">
                                    <?php
                                        $query = mysqli_query($conn, "SELECT * FROM user");
                                        while ($data = mysqli_fetch_array($query)) {
                                        ?>
                                        <option value="<?=$data['user_name'];?>"><?php echo $data['user_name'];?></option>
                                        <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="flex flex-row w-full items-center pr-10 py-2">
                                <label for="package" class="w-3/12">Package</label>
                                <select name="package" id="package" class="form-control h-8 w-9/12 border-none outline-none mt-1 rounded px-4 bg-neutral-500" value="" onChange= "document.getElementById.submit();">
                                    <?php
                                        $query = mysqli_query($conn, "SELECT * FROM package");
                                        while ($data = mysqli_fetch_array($query)) {
                                        ?>
                                        <option value="<?=$data['package_name'];?>"><?php echo $data['package_name'];?></option>
                                        <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="flex flex-row w-full items-center pr-10 py-2">
                                <label for="date" class="w-3/12">Date</label>
                                <input type="date" name="date" id="date" class="h-8 w-9/12 border-none outline-none mt-1 rounded px-4 bg-neutral-500" value="" autocomplete="off" />
                            </div>
                            <div class="flex flex-row w-full items-center pr-10 py-2">
                                <label for="start" class="w-3/12">Start</label>
                                <input type="date" name="start" id="start" class="h-8 w-9/12 border-none outline-none mt-1 rounded px-4 bg-neutral-500" value="" autocomplete="off" />
                            </div>
                            <div class="flex flex-row w-full items-center pr-10 py-2">
                                <label for="end" class="w-3/12">End</label>
                                <input type="date" name="end" id="end" class="h-8 w-9/12 border-none outline-none mt-1 rounded px-4 bg-neutral-500" value="" autocomplete="off" />
                            </div>
                            <div class="flex flex-row w-full items-center pr-10 py-2">
                                <label for="price" class="w-3/12">Price</label>
                                <div class="price-input w-9/12 flex justify-between">
                                    <input type="text" class="h-8 w-1/12 border-none outline-none mt-1 mr-2 px-1 text-center rounded bg-neutral-500" value="Rp." disabled />
                                    <input type="text" name="price" id="price" class="h-8 w-11/12 border-none outline-none mt-1 rounded px-4 bg-neutral-500" value="" />
                                </div>
                            </div>
                            <div class="flex flex-row justify-end w-full items-center pr-10 py-2 mt-6">
                                <button type="submit" name="create" class="bg-neutral-500 text-white rounded-md px-4 py-2 transition duration-300 ease select-none hover:bg-neutral-700 focus:outline-none focus:shadow-outline">Create</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="flex flex-col w-[30%] bg-neutral-600 rounded-xl ml-10">
                    <div class="flex flex-col text-center p-4 font-semibold text-white">
                        <h3 class="text-xl">Report Transaction</h3>
                        <div class="mx-auto my-5 w-20 bg-gray-200 h-[2px]"></div>
                    </div>
                    <div class="flex flex-col items-center p-4 text-white">
                        <h1>From : </h1>
                        <input type="date" name="end" id="end" class="h-8 w-9/12 border-none outline-none mt-1 rounded px-4 bg-neutral-500" value="" autocomplete="off" />
                        <h1>To : </h1>
                        <input type="date" name="end" id="end" class="h-8 w-9/12 border-none outline-none mt-1 rounded px-4 bg-neutral-500" value="" autocomplete="off" />
                    </div>
                    <div class="flex flex-row justify-end w-full items-center pr-10 py-2 mt-6">
                        <button type="submit" name="print" class="bg-neutral-500 text-white rounded-md px-4 py-2 transition duration-300 ease select-none hover:bg-neutral-700 focus:outline-none focus:shadow-outline">Print</button>
                    </div>
                </div>
            </div>

            <div class="flex w-full h-72 bg-neutral-600 rounded-lg mt-10 p-8">

                <div class="col-span-12">
                    <div class="overflow-y-auto h-full">
                        <table class="table-fixed overflow-y-scroll text-white border-collapse space-y-6 text-sm w-full">
                            <thead class="text-white sticky top-0 bg-neutral-700">
                                <tr>
                                    <th class="p-3 text-left w-1/12">No</th>
                                    <th class="p-3 text-left w-2/12">Name</th>
                                    <th class="p-3 text-left w-2/12">Package</th>
                                    <th class="p-3 text-left w-2/12">Date</th>
                                    <th class="p-3 text-left w-2/12">Start</th>
                                    <th class="p-3 text-left w-2/12">End</th>
                                    <th class="p-3 text-left w-1/12">Action</th>
                                </tr>
                            </thead>

                            <?php $i = 1; ?>
                            <?php foreach ($transaction as $row) : ?>
                                <tbody>
                                    <tr class="">
                                        <td class="p-3">
                                            <?= $i; ?>
                                        </td>
                                        <td class="p-3">
                                            <?= $row["user_name"]; ?>
                                        </td>
                                        <td class="p-3">
                                            <?= $row["package_name"]; ?>
                                        </td>
                                        <td class="p-3">
                                            <?= $row["date"]; ?>
                                        </td>
                                        <td class="p-3">
                                            <?= $row["start"]; ?>
                                        </td>
                                        <td class="p-3">
                                            <?= $row["end"]; ?>
                                        </td>
                                        <td class="flex justify-center py-3">
                                            <a type="button" id="editButton" class="editButton w-4 mr-2 hover:text-neutral-400 hover:cursor-pointer" title="edit" onclick="modalHandler(true);" data-bs-toggle="modal" data-bs-target="#ubahModal" data-id_transaction="<?= $row['id'] ?>" data-name="<?= $row['user_name'];?>" data>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                            <div class="w-4 mr-2 hover:text-neutral-400 hover:cursor-pointer" title="delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let IDR = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
        });

        for (let i = 0; i < <?= $i - 1; ?>; i++) {
            document.getElementsByClassName("price-coll")[i].innerText = IDR.format(document.getElementsByClassName("price-coll")[i].innerText);
        }
    </script>

</body>

</html>