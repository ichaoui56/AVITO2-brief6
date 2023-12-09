<?php
session_start();
include_once '../includes/checkLogin.php';
include_once '../includes/config.php';

mysqli_select_db($connection, 'avito2');
$ID = $_SESSION['user'];
$select = "SELECT * FROM users WHERE Id = $ID ";
$result = mysqli_query($connection, $select);
$row = mysqli_fetch_assoc($result);
// $replace = str_replace('../', '', $row['UserImage']);
// die($replace);
// $query = "SELECT * FROM annonce";
// $result = mysqli_query($connection, $query);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/Viewer.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tailwind Profile Card Template : Tailwind Toolbox</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <!-- Font Awesome if you need it
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
  -->
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <!--Replace with your tailwind.css once created-->

</head>

<body class="font-sans antialiased text-gray-900 leading-normal tracking-wider bg-cover" style="background-image:url('https://source.unsplash.com/1L71sPT5XKc');">


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
                    <?php
                    if ($_SESSION['role'] == 'Annoncer') {
                        '';
                    }
                    ?>
                    <?php
                    if ($_SESSION['role'] == 'Admin') {
                        echo '<a href="./MesAnnonces.php">
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
                        <a href="./AllUsers.php">
                        <div class="b animate-bounce relative mx-10 h-10 w-36 flex justify-center items-center ">
                            <div class="i h-10 w-36 bg-red-500 items-center rounded-xl shadow-2xl cursor-pointer absolute overflow-hidden transform hover:scale-x-110 hover:scale-y-105 transition duration-300 ease-out">
                            </div>
                            <span class="text-center text-white font-semibold z-10 pointer-events-none">All user!</span>
                            <span class="absolute flex h-6 w-6 mx-32 top-0 right-0 transform -translate-y-2.5">
                            </span>
                        </div>
                    </a>
                    <a href="./CreateAnnonce.php">
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
                    ';
                    } else {
                        echo '<div class="h-10 w-8" >  </div>';
                    }

                    ?>
                    <?php
                    if ($_SESSION['role'] == 'Annoncer') {
                        echo '<a href="./MesAnnonces.php">
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
                       
                    <a href="./CreateAnnonce.php">
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
                    ';
                    } elseif($_SESSION['role'] == 'Viewer') {
                        echo '<div class="h-10 w-96" >  </div>
                        <div class="h-10 w-28" >  </div>';
                    }

                    ?>
                    
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
    <aside class="h-screen z-20 fixed w-16 flex flex-col space-y-10 items-center justify-center  bg-gray-800 text-white">

        <!-- Courses -->
        <a href="./<?php echo $_SESSION['role'] ?>.php">
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


    <div class="max-w-4xl flex items-center h-auto lg:h-screen flex-wrap mx-auto my-32 lg:my-0">

        <!--Main Col-->
        <div id="profile" class="w-full lg:w-3/5 rounded-lg lg:rounded-l-lg lg:rounded-r-none shadow-2xl bg-white opacity-75 mx-6 lg:mx-0">


            <div class="p-4 md:p-12 text-center lg:text-left">
                <!-- Image for mobile view-->
                <div class="block lg:hidden rounded-full shadow-xl mx-auto -mt-16 h-48 w-48 bg-cover bg-center" style="background-image: url('https://source.unsplash.com/MP0IUfwrn0A')"></div>

                <h1 class="text-3xl font-bold pt-8 lg:pt-0"><?php echo $_SESSION['username']; ?></h1>
                <div class="mx-auto lg:mx-0 w-4/5 pt-3 border-b-2 border-green-500 opacity-25"></div>
                <p class="pt-4 mx-1 text-base font-bold flex items-center justify-center lg:justify-start"><svg class="h-4 fill-current text-green-700 pr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9 12H1v6a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-6h-8v2H9v-2zm0-1H0V5c0-1.1.9-2 2-2h4V2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1h4a2 2 0 0 1 2 2v6h-9V9H9v2zm3-8V2H8v1h4z" />
                    </svg><?php echo $_SESSION['role']; ?></p>
                <p class="pt-4 text-base font-bold flex items-center justify-center lg:justify-start"><svg class="h-6 text-green-700 pr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                    </svg>
                    <?php echo $_SESSION['Email']; ?></p>
                <p class="pt-4 mx-1 text-base font-bold flex items-center justify-center lg:justify-start"><svg class="h-6 text-green-700 pr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                    </svg>
                    <?php echo $_SESSION['PhoneNumber']; ?></p>





                <div class="pt-12 pb-8">
                    <a href="./EditProfileFrom.php" class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded-full">
                        Edit Profile
                    </a>
                </div>

                <div class="mt-6 pb-16 lg:pb-0 w-4/5 lg:w-full mx-auto flex flex-wrap items-center justify-between">
                    <a class="link" href="#" data-tippy-content="@facebook_handle"><svg class="h-6 fill-current text-gray-600 hover:text-green-700" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <title>Facebook</title>
                            <path d="M22.676 0H1.324C.593 0 0 .593 0 1.324v21.352C0 23.408.593 24 1.324 24h11.494v-9.294H9.689v-3.621h3.129V8.41c0-3.099 1.894-4.785 4.659-4.785 1.325 0 2.464.097 2.796.141v3.24h-1.921c-1.5 0-1.792.721-1.792 1.771v2.311h3.584l-.465 3.63H16.56V24h6.115c.733 0 1.325-.592 1.325-1.324V1.324C24 .593 23.408 0 22.676 0" />
                        </svg></a>
                    <a class="link" href="#" data-tippy-content="@twitter_handle"><svg class="h-6 fill-current text-gray-600 hover:text-green-700" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <title>Twitter</title>
                            <path d="M23.954 4.569c-.885.389-1.83.654-2.825.775 1.014-.611 1.794-1.574 2.163-2.723-.951.555-2.005.959-3.127 1.184-.896-.959-2.173-1.559-3.591-1.559-2.717 0-4.92 2.203-4.92 4.917 0 .39.045.765.127 1.124C7.691 8.094 4.066 6.13 1.64 3.161c-.427.722-.666 1.561-.666 2.475 0 1.71.87 3.213 2.188 4.096-.807-.026-1.566-.248-2.228-.616v.061c0 2.385 1.693 4.374 3.946 4.827-.413.111-.849.171-1.296.171-.314 0-.615-.03-.916-.086.631 1.953 2.445 3.377 4.604 3.417-1.68 1.319-3.809 2.105-6.102 2.105-.39 0-.779-.023-1.17-.067 2.189 1.394 4.768 2.209 7.557 2.209 9.054 0 13.999-7.496 13.999-13.986 0-.209 0-.42-.015-.63.961-.689 1.8-1.56 2.46-2.548l-.047-.02z" />
                        </svg></a>
                    <a class="link" href="#" data-tippy-content="@github_handle"><svg class="h-6 fill-current text-gray-600 hover:text-green-700" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <title>GitHub</title>
                            <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                        </svg></a>
                    <a class="link" href="#" data-tippy-content="@unsplash_handle"><svg class="h-6 fill-current text-gray-600 hover:text-green-700" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <title>Unsplash</title>
                            <path d="M7.5 6.75V0h9v6.75h-9zm9 3.75H24V24H0V10.5h7.5v6.75h9V10.5z" />
                        </svg></a>
                    <a class="link" href="#" data-tippy-content="@dribble_handle"><svg class="h-6 fill-current text-gray-600 hover:text-green-700" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <title>Dribbble</title>
                            <path d="M12 24C5.385 24 0 18.615 0 12S5.385 0 12 0s12 5.385 12 12-5.385 12-12 12zm10.12-10.358c-.35-.11-3.17-.953-6.384-.438 1.34 3.684 1.887 6.684 1.992 7.308 2.3-1.555 3.936-4.02 4.395-6.87zm-6.115 7.808c-.153-.9-.75-4.032-2.19-7.77l-.066.02c-5.79 2.015-7.86 6.025-8.04 6.4 1.73 1.358 3.92 2.166 6.29 2.166 1.42 0 2.77-.29 4-.814zm-11.62-2.58c.232-.4 3.045-5.055 8.332-6.765.135-.045.27-.084.405-.12-.26-.585-.54-1.167-.832-1.74C7.17 11.775 2.206 11.71 1.756 11.7l-.004.312c0 2.633.998 5.037 2.634 6.855zm-2.42-8.955c.46.008 4.683.026 9.477-1.248-1.698-3.018-3.53-5.558-3.8-5.928-2.868 1.35-5.01 3.99-5.676 7.17zM9.6 2.052c.282.38 2.145 2.914 3.822 6 3.645-1.365 5.19-3.44 5.373-3.702-1.81-1.61-4.19-2.586-6.795-2.586-.825 0-1.63.1-2.4.285zm10.335 3.483c-.218.29-1.935 2.493-5.724 4.04.24.49.47.985.68 1.486.08.18.15.36.22.53 3.41-.43 6.8.26 7.14.33-.02-2.42-.88-4.64-2.31-6.38z" />
                        </svg></a>
                    <a class="link" href="#" data-tippy-content="@instagram_handle"><svg class="h-6 fill-current text-gray-600 hover:text-green-700" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <title>Instagram</title>
                            <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                        </svg></a>
                    <a class="link" href="#" data-tippy-content="@youtube_handle"><svg class="h-6 fill-current text-gray-600 hover:text-green-700" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <title>YouTube</title>
                            <path d="M23.495 6.205a3.007 3.007 0 0 0-2.088-2.088c-1.87-.501-9.396-.501-9.396-.501s-7.507-.01-9.396.501A3.007 3.007 0 0 0 .527 6.205a31.247 31.247 0 0 0-.522 5.805 31.247 31.247 0 0 0 .522 5.783 3.007 3.007 0 0 0 2.088 2.088c1.868.502 9.396.502 9.396.502s7.506 0 9.396-.502a3.007 3.007 0 0 0 2.088-2.088 31.247 31.247 0 0 0 .5-5.783 31.247 31.247 0 0 0-.5-5.805zM9.609 15.601V8.408l6.264 3.602z" />
                        </svg></a>
                </div>

                <!-- Use https://simpleicons.org/ to find the svg for your preferred product -->

            </div>

        </div>

        <!--Img Col-->
        <div class="w-full lg:w-2/5">
            <!-- Big profile image for side bar (desktop) -->
            <img src="<?php echo $row['UserImage']; ?>" class="rounded-none lg:rounded-lg shadow-2xl hidden lg:block">

            <!-- Image from: http://unsplash.com/photos/MP0IUfwrn0A -->

        </div>


        <!-- Pin to top right corner -->
        <div class="absolute top-12 right-0 h-12 w-18 p-4">
            <button class="js-change-theme focus:outline-none">🌙</button>
        </div>

    </div>

    <footer>
        <div class="bg-gray-800 py-4 text-gray-400">
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

    <script src="https://unpkg.com/popper.js@1/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tippy.js@4"></script>
    <script>
        //Init tooltips
        tippy('.link', {
            placement: 'bottom'
        })

        //Toggle mode
        const toggle = document.querySelector('.js-change-theme');
        const body = document.querySelector('body');
        const profile = document.getElementById('profile');


        toggle.addEventListener('click', () => {

            if (body.classList.contains('text-gray-900')) {
                toggle.innerHTML = "☀️";
                body.classList.remove('text-gray-900');
                body.classList.add('text-gray-100');
                profile.classList.remove('bg-white');
                profile.classList.add('bg-gray-900');
            } else {
                toggle.innerHTML = "🌙";
                body.classList.remove('text-gray-100');
                body.classList.add('text-gray-900');
                profile.classList.remove('bg-gray-900');
                profile.classList.add('bg-white');

            }
        });
    </script>

</body>

</html>