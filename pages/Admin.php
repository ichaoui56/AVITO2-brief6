<?php
session_start();
include_once '../includes/checkLogin.php';
include_once '../includes/config.php';

mysqli_select_db($connection, 'avito2');


if($_SESSION['role']!= 'Admin'){
    header('location:./Viewer.php');
}

$query = "SELECT * FROM annonce";
$result = mysqli_query($connection, $query);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Viewer.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>

<body class="bg-gray-200">


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
                    <a href="./MesAnnonces.php">
                        <div class="b relative mx-2 h-10 w-36 flex justify-center items-center ">
                            <div class="i h-10 w-36 bg-red-500 items-center rounded-xl shadow-2xl cursor-pointer absolute overflow-hidden transform hover:scale-x-110 hover:scale-y-105 transition duration-300 ease-out">
                            </div>
                            <span class="text-center text-white font-semibold z-10 pointer-events-none">Mes
                                annonces</span>
                            <span class="absolute flex h-6 w-6 mx-32 top-0 right-0 transform -translate-y-2.5">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                <span class="absolute inline-flex rounded-full h-6 w-6 bg-red-500"></span>
                            </span>
                        </div>
                    </a>
                    <a href="./AllUsers.php">
                        <div class="b animate-bounce relative mx-10 h-10 w-36 flex justify-center items-center ">
                            <div class="i h-10 w-36 bg-red-500 items-center rounded-xl shadow-2xl cursor-pointer absolute overflow-hidden transform hover:scale-x-110 hover:scale-y-105 transition duration-300 ease-out">
                            </div>
                            <span class="text-center text-white font-semibold z-10 pointer-events-none">All user!</span>
                            <span class="absolute flex h-6 w-6 mx-32 top-0 right-0 transform -translate-y-2.5">
                            </span>
                        </div>
                    </a>
                    <a href="./MesAnnonces.php">
                        <div class="b relative  h-10 w-36 flex justify-center items-center ">
                            <div class="i h-10 w-36 bg-blue-500 items-center rounded-xl shadow-2xl cursor-pointer absolute overflow-hidden transform hover:scale-x-110 hover:scale-y-105 transition duration-300 ease-out">
                            </div>
                            <span class="text-center text-white font-semibold z-10 pointer-events-none">Create
                                annonce</span>
                            <span class="absolute flex h-6 w-6 top-0 right-0 transform translate-x-2.5 -translate-y-2.5">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                                <span class="absolute inline-flex rounded-full h-6 w-6 bg-blue-500"></span>
                            </span>
                        </div>
                    </a>
                </div>

                <!-- Texto -->
                <div class="flex flex-row items-end " style="margin-left: 335px;margin-right: -68px;">
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
    <aside class="h-screen z-20 fixed w-16 flex flex-col space-y-10 items-center justify-center  bg-gray-800 text-white">

        <!-- Courses -->
        <a href="./Annoncer.php">
            <div class="h-10 w-10 flex text-white items-center justify-center rounded-lg cursor-pointer hover:text-gray-800 hover:bg-white  hover:duration-300 hover:ease-linear focus:bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>

            </div>
        </a>


        <!-- Profile -->
        <a href="./UserProfile.php">
            <div class="h-10 w-10 flex text-white items-center justify-center rounded-lg cursor-pointer hover:text-gray-800 hover:bg-white  hover:duration-300 hover:ease-linear focus:bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>

            </div>
        </a>

        <!-- Logout -->
        <div class="z-50">
            <a href="../includes/logout.php">
                <div class="h-10 w-10 flex text-white items-center justify-center rounded-lg cursor-pointer hover:text-gray-800 hover:bg-white  hover:duration-300 hover:ease-linear focus:bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                    </svg>
                </div>
            </a>
        </div>
    </aside>



    <!-------------------------------------End Navbar  ------------------------------------>




    <!-------------------------------------start container  ------------------------------------>

    <div class="shell relative">
        <div class="container-fluid">
            <div class="custom-row">
                <?php
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="col-sm-3">
                            <div class="container page-wrapper">
                                <div class="page-inner">
                                    <div class="row">
                                        <div class="el-wrapper">
                                            <div class="box-up">
                                                <img class="img" src="../pictures/photoimport/<?php echo $row['Image']; ?>" />
                                                <div class="img-info">
                                                    <div class="info-inner">
                                                        <span class="p-name">
                                                            <?php echo $row['Username']; ?>
                                                        </span>

                                                    </div>
                                                    <div class="a-size">
                                                        <?php echo $row['Title'] . '<br>' . '<span style="color:rgb(125, 125, 125);font-weight: 100;";>' . $_SESSION['PhoneNumber'] . '</span>' . '<br> <br><br>' . '<span class="Description">' . $row['Description'] . '</span>'; ?>
                                                    </div>


                                                </div>
                                            </div>

                                            <div class="box-down">
                                                <div class="h-bg">
                                                    <div class="h-bg-inner"></div>
                                                </div>

                                                <a class="cart" href="#">
                                                    <span class="price">
                                                        <?php echo $row['Price'];
                                                        echo " ";
                                                        echo " MAD"; ?>
                                                    </span>
                                                    <span class="add-to-cart">
                                                        <span class="txt">Add in cart</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php
                    }
                }


                // Close the connection
                mysqli_close($connection);
                ?>

            </div>
        </div>
    </div>

    <footer>
        <div class="my-96 bg-gray-800 py-4 text-gray-400"   style="margin-top: 100vh;">
            <div class="container px-4 mx-auto">
                <div class="-mx-4 flex flex-wrap justify-between">
                    <div class="px-4 my-4 w-full xl:w-1/5">
                        <a href="/" class="block w-56 mb-10">
                            <svg version="1.1" viewBox="0 0 3368 512" xmlns="http://www.w3.org/2000/svg">
                                <g fill="none" fill-rule="evenodd">
                                    <g transform="translate(0 -75)">
                                        <g transform="translate(0 75)">
                                            <rect width="512" height="512" rx="128" fill="#3D5AFE"></rect>
                                            <rect x="149" y="176" width="220" height="220" fill="#fff"></rect>
                                            <circle cx="259" cy="156" r="40" fill="#fff"></circle>
                                            <circle cx="369" cy="286" r="40" fill="#2962FF"></circle>
                                        </g>
                                        <text fill="white" font-family="Nunito-Bold, Nunito" font-size="512" font-weight="bold">
                                            <tspan x="654" y="518">Tailwindow</tspan>
                                        </text>
                                    </g>
                                </g>
                            </svg>
                        </a>
                        <p class="text-justify">
                            Tailwindow is a collection of UI Components created using Tailwind CSS Framework. The UI Components gives you all of the building blocks you need to build any designs without any annoying opinionated styles you have to fight to override.
                        </p>
                    </div>

                    <div class="px-4 my-4 w-full sm:w-auto">
                        <div>
                            <h2 class="inline-block text-2xl pb-4 mb-4 border-b-4 border-blue-600">Company</h2>
                        </div>
                        <ul class="leading-8">
                            <li><a href="#" class="hover:text-blue-400">About Us</a></li>
                            <li><a href="#" class="hover:text-blue-400">Terms &amp; Conditions</a></li>
                            <li><a href="#" class="hover:text-blue-400">Privacy Policy</a></li>
                            <li><a href="#" class="hover:text-blue-400">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="px-4 my-4 w-full sm:w-auto">
                        <div>
                            <h2 class="inline-block text-2xl pb-4 mb-4 border-b-4 border-blue-600">Blog</h2>
                        </div>
                        <ul class="leading-8">
                            <li><a href="#" class="hover:text-blue-400">Getting Started With HTML and CSS</a></li>
                            <li><a href="#" class="hover:text-blue-400">What Is Flex And When to Use It?</a></li>
                            <li><a href="#" class="hover:text-blue-400">How TailwindCSS Can Help Your Productivity?</a></li>
                            <li><a href="#" class="hover:text-blue-400">5 Tips to Make Responsive Website</a></li>
                            <li><a href="#" class="hover:text-blue-400">See More</a></li>
                        </ul>
                    </div>
                    <div class="px-4 my-4 w-full sm:w-auto xl:w-1/5">
                        <div>
                            <h2 class="inline-block text-2xl pb-4 mb-4 border-b-4 border-blue-600">Connect With Us</h2>
                        </div>
                        <a href="#" class="inline-flex items-center justify-center h-8 w-8 border border-gray-100 rounded-full mr-1 hover:text-blue-400 hover:border-blue-400">
                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                <path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path>
                            </svg>
                        </a>
                        <a href="#" class="inline-flex items-center justify-center h-8 w-8 border border-gray-100 rounded-full mr-1 hover:text-blue-400 hover:border-blue-400">
                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path>
                            </svg>
                        </a>
                        <a href="#" class="inline-flex items-center justify-center h-8 w-8 border border-gray-100 rounded-full mr-1 hover:text-blue-400 hover:border-blue-400">
                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
                            </svg>
                        </a>
                        <a href="#" class="inline-flex items-center justify-center h-8 w-8 border border-gray-100 rounded-full mr-1 hover:text-blue-400 hover:border-blue-400">
                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                                <path d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"></path>
                            </svg>
                        </a>
                        <a href="#" class="inline-flex items-center justify-center h-8 w-8 border border-gray-100 rounded-full hover:text-blue-400 hover:border-blue-400">
                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </footer>

</body>

</html>