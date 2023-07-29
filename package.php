<<<<<<< HEAD
<?php

require './functions.php';

$package = query("SELECT * FROM package");

// $id = $_GET["id"];
// $packageId = query("SELECT * FROM package WHERE id = $id")[0];

// create check
if (isset($_POST["submit"])) {
    if (create_package($_POST) > 0) {
        echo "<script> 
                alert('Package Berhasil di Buat!');
                document.location.href = 'package.php';
            </script>";
    } else {
        echo "<script> 
                alert('Package Gagal di Buat!');
            </script>";
    }
}

// update check
if (isset($_POST["edit"])) {
    if (update_package($_POST) > 0) {
        echo "<script> 
                alert('Package Berhasil di Edit!');
                document.location.href = 'package.php';
            </script>";
    } else {
        echo "<script> 
                alert('Package Gagal di Edit!');
            </script>";
    }
}
?>

=======
>>>>>>> 568a55ca1614ddafe2950712713c665b97764027
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./src/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
</head>

<body class="bg-zinc-800">
<<<<<<< HEAD

=======
    <?php

    require './functions.php';

    $package = query("SELECT * FROM package");

    if (isset($_POST["submit"])) {

        if (create_package($_POST) > 0) {
            echo "<script> 
                Swal.fire({
                    icon: 'success',
                    title: 'Package Berhasil di Buat!',
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>";
        } else {
            echo "<script> 
                Swal.fire({
                    icon: 'error',
                    title: 'Package Gagal di Buat!',
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>";
        }
    }

    ?>
>>>>>>> 568a55ca1614ddafe2950712713c665b97764027
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
            <div class="flex justify-between items-center bg-neutral-600 rounded-xl px-6 py-4">
                <div class="text-white text-base font-normal">date</div>
                <div class="text-white text-base font-normal">admin</div>
                <div class="text-white text-base font-normal">time</div>
            </div>


            <div class="flex flex-col w-[70%] 2xl:w-[60%] h-[22rem] bg-neutral-600 rounded-lg p-8 mt-10 2xl:mt-24">
                <div class="flex flex-row items-center text-white font-bold">
                    <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/FFFFFF/new-product.png" alt="new-product" />
                    <h1 class="pl-2">Create Package</h1>
                </div>

                <form action="" method="POST">
                    <div class="flex flex-col text-white mt-6">
                        <div class="flex flex-row w-full items-center pr-10 py-2">
                            <label for="name" class="w-3/12">Name</label>
                            <input type="text" name="name" id="name" class="h-8 w-9/12 border-none outline-none mt-1 rounded px-4 bg-neutral-500" value="" autocomplete="off" placeholder="ex: Paket Geming" required />
                        </div>
                        <div class="flex flex-row w-full items-center pr-10 py-2">
                            <label for="description" class="w-3/12">Description</label>
                            <input type="text" name="description" id="description" class="h-8 w-9/12 border-none outline-none mt-1 rounded px-4 bg-neutral-500" value="" autocomplete="off" placeholder="ex: Upload 10Mbps/Download 50Mbps" required />
                        </div>
                        <div class="flex flex-row w-full items-center pr-10 py-2">
                            <label for="price" class="w-3/12">Price</label>
                            <div class="price-input w-9/12 flex justify-between">
                                <input type="text" class="h-8 w-1/12 border-none outline-none mt-1 mr-2 px-1 text-center rounded bg-neutral-500" value="Rp." disabled />
                                <input type="text" name="price" id="price" class="h-8 w-11/12 border-none outline-none mt-1 rounded px-4 bg-neutral-500" value="" autocomplete="off" required />
                            </div>
                        </div>
                        <div class="flex flex-row justify-end w-full items-center pr-10 py-2 mt-6">
                            <button type="submit" name="submit" class="bg-neutral-500 text-white rounded-md px-4 py-2 transition duration-300 ease select-none hover:bg-neutral-700 focus:outline-none focus:shadow-outline">Create</button>
                        </div>
                    </div>
                </form>
            </div>


            <div class="flex w-full h-72 bg-neutral-600 rounded-lg mt-10 p-8">

                <div class="col-span-12">
                    <div class="overflow-y-auto h-full">
                        <table id="table" class="table-fixed overflow-y-scroll text-white border-collapse space-y-6 text-sm w-full">
                            <thead class="text-white sticky top-0 bg-neutral-700">
                                <tr>
                                    <th class="p-3 text-left w-1/12">No</th>
                                    <th class="p-3 text-left w-2/12">Name</th>
                                    <th class="p-3 text-center w-4/6">Description</th>
                                    <th class="p-3 text-left w-2/12">Price</th>
                                    <th class="p-3 text-left w-1/12">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($package as $row) : ?>
                                    <tr class="">
                                        <td class="p-3">
                                            <?= $i; ?>
                                        </td>
                                        <td class="p-3 package_name" id="package_name">
                                            <?= $row["package_name"]; ?>
                                        </td>
                                        <td class="p-3 text-center desc" id="desc">
                                            <?= $row["descriptions"]; ?>
                                        </td>
                                        <td class="p-3 price-col" id="price-col">
                                            <?= $row["price"]; ?>
                                        </td>
                                        <td class="flex justify-center py-3">
                                            <a type="button" id="editButton" class="editButton w-4 mr-2 hover:text-neutral-400 hover:cursor-pointer" title="edit" onclick="modalHandler(true);" data-bs-toggle="modal" data-bs-target="#ubahModal" data-id_package="<?= $row['id'] ?>" data-package_name="<?= $row['package_name'] ?>" data-desc="<?= $row['descriptions'] ?>" data-price="<?= $row['price'] ?>">
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
                    <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/4B5563/new-product.png" alt="new-product" />
                </div>
                <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Edit Package</h1>

                <form action="" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id_package" id="id_package_i" class="id_package">

                        <label for="package_name" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Package Name</label>
                        <input type="text" name="package_name" id="package_name_i" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" autocomplete="off" />

                        <label for="package_desc" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Description</label>
                        <input type="text" name="package_desc" id="package_desc_i" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" autocomplete="off" />

                        <label for="package_price" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Price</label>
                        <input type="text" name="package_price" id="package_price_i" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" autocomplete="off" />

                        <div class="flex items-center justify-start w-full">
                            <button type="submit" name="edit" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">Submit</button>
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
        // format number
        let IDR = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
        });

        for (let i = 0; i < <?= $i - 1; ?>; i++) {
            document.getElementsByClassName("price-col")[i].innerText = IDR.format(document.getElementsByClassName("price-col")[i].innerText);
        }

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

        // edit
        $(document).on("click", "#editButton", function() {
            let pkgId = $(this).data('id_package');
            let pkgName = $(this).data('package_name');
            let pkgDesc = $(this).data('desc');
            let pkgPrice = $(this).data('price');

            $(".modal-body #id_package_i").val(pkgId);
            $(".modal-body #package_name_i").val(pkgName);
            $(".modal-body #package_desc_i").val(pkgDesc);
            $(".modal-body #package_price_i").val(pkgPrice);
        });
    </script>

</body>

</html>