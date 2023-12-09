<?php
session_start();
include_once '../includes/checkLogin.php';
$warningScript = '';

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" href="../css/Viewer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php echo $warningScript; ?>
    <title>Créer votre annonce</title>
</head>

<style>
    /* @import url("https://fonts.googleapis.com/css?family=Lobster&display=swap") repeat scroll 0 0 rgba(0, 0, 0, 0); */

    body {
        background: #fff;
    }

    .title {
        font-size: 2.5rem;
        font-family: "Lobster", cursive;
    }

    .wrapper {
        animation: scroll 100s linear infinite;
        background: url("../pictures/white-painted-wall-texture-background.jpg"),
            #111111;
        color: #eee;
        height: 150vh;
        min-width: 360px;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        perspective: 1000px;
        perspective-origin: 50% 50%;
    }

    @keyframes scroll {
        100% {
            background-position: 0px -400%;
        }
    }

    /* Fallback if the operatring system prefers reduced motion*/
    @media (prefers-reduced-motion) {
        .wrapper {
            animation: scroll 800s linear infinite;
        }
    }

    @media (min-width: 670px) {
        .title {
            font-size: 5rem;
        }
    }
</style>

<body>

    <!-------------------------------------Start Navbar  ------------------------------------>

    <!-- <div class="h-screen w-full z-20 fixed flex overflow-hidden"> -->
    <div class="w-full z-50 fixed flex flex-col justify-between">
        <!-- Header -->
        <header class="h-16 w-full flex items-center relative justify-end px-5 space-x-10 bg-gray-800">
            <!-- Informação -->
            <div class="flex  items-center space-x-4 text-white font-bold">
                <div class="w-20">
                    <img src="../pictures/logo.png" alt="" width="100">
                </div>
                <div class="mx-100 flex z-50 " style="margin-left: 450px;">
                    <?php
                    if ($_SESSION['role'] == 'Annoncer') {
                        echo '<div class="h-10 w-10"  style="margin-left: 40px;">  </div>';
                    }

                    ?>
                    <a href="./MesAnnonces.php">
                        <div class="b relative mx-2 h-10 w-36 flex justify-center items-center ">
                            <div
                                class="i h-10 w-36 bg-red-500 items-center rounded-xl shadow-2xl cursor-pointer absolute overflow-hidden transform hover:scale-x-110 hover:scale-y-105 transition duration-300 ease-out">
                            </div>
                            <span class="text-center text-white font-semibold z-10 pointer-events-none">Mes
                                annonces</span>
                            <span class="absolute flex h-6 w-6 mx-32 top-0 right-0 transform -translate-y-2.5">
                                <span
                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                <span class="absolute inline-flex rounded-full h-6 w-6 bg-red-500"></span>
                            </span>
                        </div>
                    </a>
                    <?php
                    if ($_SESSION['role'] == 'Admin') {
                        echo '<a href="./AllUsers.php">
                        <div class="b animate-bounce relative mx-10 h-10 w-36 flex justify-center items-center ">
                            <div class="i h-10 w-36 bg-red-500 items-center rounded-xl shadow-2xl cursor-pointer absolute overflow-hidden transform hover:scale-x-110 hover:scale-y-105 transition duration-300 ease-out">
                            </div>
                            <span class="text-center text-white font-semibold z-10 pointer-events-none">All user!</span>
                            <span class="absolute flex h-6 w-6 mx-32 top-0 right-0 transform -translate-y-2.5">
                            </span>
                        </div>
                    </a>';
                    } else {
                        echo '<div class="h-10 w-8" >  </div>';
                    }

                    ?>
                    <a href="./CreateAnnonce.php">
                        <div class="b relative  h-10 w-36 flex justify-center items-center ">
                            <div
                                class="i h-10 w-36 bg-blue-500 items-center rounded-xl shadow-2xl cursor-pointer absolute overflow-hidden transform hover:scale-x-110 hover:scale-y-105 transition duration-300 ease-out">
                            </div>
                            <span class="text-center text-white font-semibold z-10 pointer-events-none">Create
                                annonce</span>
                            <span
                                class="absolute flex h-6 w-6 top-0 right-0 transform translate-x-2.5 -translate-y-2.5">
                                <span
                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                                <span class="absolute inline-flex rounded-full h-6 w-6 bg-blue-500"></span>
                            </span>
                        </div>
                    </a>
                    <?php
                    if ($_SESSION['role'] == 'Annoncer') {
                        echo '<div class="h-10 w-10"  style="margin-left: 50px; margin-right: 0px;">  </div>';
                    }

                    ?>
                </div>

                <!-- Texto -->
                <div class="flex flex-row items-end " style="margin-left: 335px;margin-right: -30px;">
                    <div>
                        <!-- Nome -->
                        <div class="text-md font-medium text-gray-500 ">
                            <?php echo $_SESSION['username']; ?>
                        </div>
                        <!-- Título -->
                        <div class="text-sm font-regular">
                            <?php echo $_SESSION['role']; ?>
                        </div>
                    </div>
                    <div
                        class="relative mx-4 h-10 w-10  cursor-pointer bg-transparent ">
                        <img src="<?php echo $_SESSION['UserImage']; ?>"
                            class="sasawi  shadow-2xl hidden lg:block">
                    </div>
                    <div class="">
                        <div class="sansan"></div>
                    </div>
                </div>

            </div>

        </header>

        <!-- Main -->

    </div>
    <!-- Sidebar -->
    <aside
        class="h-screen z-20 fixed w-16 flex flex-col space-y-10 items-center justify-center  bg-gray-800 text-white">

        <!-- Courses -->
        <a href="./Annoncer.php">
            <div
                class="h-10 w-10 flex text-white items-center justify-center rounded-lg cursor-pointer hover:text-gray-800 hover:bg-white  hover:duration-300 hover:ease-linear focus:bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>

            </div>
        </a>


        <!-- Profile -->
        <a href="./UserProfile.php">
            <div
                class="h-10 w-10 flex text-white items-center justify-center rounded-lg cursor-pointer hover:text-gray-800 hover:bg-white  hover:duration-300 hover:ease-linear focus:bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>

            </div>
        </a>

        <!-- Logout -->
        <div class="z-50">
            <a href="../includes/logout.php">
                <div
                    class="h-10 w-10 flex text-white items-center justify-center rounded-lg cursor-pointer hover:text-gray-800 hover:bg-white  hover:duration-300 hover:ease-linear focus:bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                    </svg>
                </div>
            </a>
        </div>
    </aside>



    <!-------------------------------------End Navbar  ------------------------------------>




    <!-------------------------------------start container  ------------------------------------>

    <!-- <article class="wrapper">
        <h2 class="title"></h2>
        <div class="flex my-32 bg-gray-800 justify-center backdrop-blur-2xl border-4 rounded-3xl" style=" height: 125vh;width: 30vw; ">
            <div class="">
                <div class="flex min-h-full flex-col justify-center items-center px-6 py-12 lg:px-8">
                    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                        <img class="mx-32 w-32" src="pictures/logo.png" alt="">
                        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-black">Créer votre
                            annonce</h2>
                    </div>

                    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                        <form class="space-y-6" action="../includes/Annonce_crud/Create.php" method="POST" enctype="multipart/form-data">
                            <div class="flex flex-col">
                                <div class="w-96 h-28 border-4 rounded-2xl flex flex-col justify-center">
                                    <div class="flex flex-col justify-center items-center">
                                        <img src="pictures/add.png" alt="add image" width="70" height="70" class="cursor-pointer" id="add">
                                        <img src="pictures/done.png" alt="image added" width="70" height="70" class="cursor-pointer hidden" id="done">
                                        <input type="file" name="image" id="image" class="border-4 bg-black absolute w-32 mx-12 opacity-0">
                                        <p class="font-bold text-white">Cliquer pour importer une image</p>
                                    </div>
                                </div>
                                <input type="text" name="username" placeholder="Username" value="<?php echo $_SESSION['username']; ?>" required class="p-5 placeholder-white font-bold bg-transparent border-4 border-white my-3 w-full rounded-md border-0 py-1.5 text-gray-500 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" readonly>
                                <input type="text" name="title" placeholder="Title" required class="p-5 placeholder-white font-bold bg-transparent border-4 border-white my-3 w-full rounded-md border-0 py-1.5 text-gray-500 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <input type="number" min=0 name="price" placeholder="Price" required class="p-5 bg-transparent placeholder-white font-bold border-4 border-white my-3 block w-full rounded-md border-0 py-1.5 text-gray-500 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <!-- <input type="number" name="Phone_number" placeholder="Phone number"  value="<?php echo $_SESSION['PhoneNumber']; ?>" required class="p-5 bg-transparent placeholder-white font-bold border-4 border-white my-3 block w-full rounded-md border-0 py-1.5 text-gray-500 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" readonly> -->
    <!-- <input type="text" name="description" placeholder="Description" required class="p-5 bg-transparent placeholder-white font-bold border-4 border-white my-3 block w-full h-28 rounded-md border-0 py-1.5 text-gray-500 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            <div>
                                <button type="submit" name="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create
                                    annonce</button>
                            </div>
                            <div class="flex justify-center text-blue-700 font-bold underline">
                                <a href="index.php">Go back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </article> --> -->


    <!-- component -->
    <form class="space-y-6" action="../includes/Annonce_crud/Create.php" method="post" enctype="multipart/form-data">
        <div class="flex h-screen bg-gray-100">
            <div class="m-auto">
                <div>

                    <?php
                    // Check if there is an error message in the session
                    if (isset($_SESSION['error_message'])) {
                        echo '<div class="  text-red-500 bg">' . $_SESSION['error_message'] . '</div>';
                        // Clear the error message from the session
                        unset($_SESSION['error_message']);
                    }
                    ?>
                    <button type="button" class="relative w-full flex justify-center items-center px-5 py-2.5 font-medium tracking-wide text-white capitalize   bg-black rounded-md hover:bg-gray-900  focus:outline-none   transition duration-300 transform active:scale-95 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF">
                            <g>
                                <rect fill="none" height="24" width="24"></rect>
                            </g>
                            <g>
                                <g>
                                    <path d="M19,13h-6v6h-2v-6H5v-2h6V5h2v6h6V13z"></path>
                                </g>
                            </g>
                        </svg>
                        <input type="file" name="image" id="image" class="border-4 bg-black absolute w-32 mx-12 opacity-0">
                        <p class="font-bold text-white">Cliquer pour importer une image</p>

                    </button>
                    
                    <div class="mt-5 bg-white rounded-lg shadow">
                        <div class="flex">
                            <div class="flex-1 py-5 pl-5 overflow-hidden">
                                <svg class="inline align-text-top" height="24px" viewBox="0 0 24 24" width="24px" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                    <g>
                                        <path d="m4.88889,2.07407l14.22222,0l0,20l-14.22222,0l0,-20z" fill="none" id="svg_1" stroke="null"></path>
                                        <path d="m7.07935,0.05664c-3.87,0 -7,3.13 -7,7c0,5.25 7,13 7,13s7,-7.75 7,-13c0,-3.87 -3.13,-7 -7,-7zm-5,7c0,-2.76 2.24,-5 5,-5s5,2.24 5,5c0,2.88 -2.88,7.19 -5,9.88c-2.08,-2.67 -5,-7.03 -5,-9.88z" id="svg_2"></path>
                                        <circle cx="7.04807" cy="6.97256" r="2.5" id="svg_3"></circle>
                                    </g>
                                </svg>
                                <h1 class="inline text-2xl font-semibold leading-none">Informations</h1>
                            </div>
                        </div>

                        <div class="px-5 pb-5">
                            <input placeholder="Name" name="username" readonly value="<?php echo $_SESSION['username']; ?>" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">
                            <div class="flex">
                                <div class="flex-grow w-1/4 pr-2"><input placeholder="Price" name="price" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></div>
                                <div class="flex-grow"><input placeholder="Title" name="title" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"></div>
                            </div>
                            <input placeholder="Description" name="description" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400">

                        </div>
                        <hr class="mt-4">
                        <div class="flex flex-row-reverse p-3">
                            <div class="flex-initial pl-3">
                                <button type="submit" name="submit" class="flex items-center px-5 py-2.5 font-medium tracking-wide text-white capitalize   bg-black rounded-md hover:bg-gray-800  focus:outline-none focus:bg-gray-900  transition duration-300 transform active:scale-95 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF">
                                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                                        <path d="M5 5v14h14V7.83L16.17 5H5zm7 13c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm3-8H6V6h9v4z" opacity=".3"></path>
                                        <path d="M17 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V7l-4-4zm2 16H5V5h11.17L19 7.83V19zm-7-7c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3zM6 6h9v4H6z">
                                        </path>
                                    </svg>
                                    <span class="pl-2 mx-1">Save</span>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </form>
    <?php echo $warningScript; ?>

</body>

</html>