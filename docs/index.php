<?php
session_start();
require "php/connection.php";

$email = $_SESSION['email'];
$password = $_SESSION['password'];

if($email != false && $password != false){
    $sql = "SELECT * FROM users WHERE email = '$email'";
    if($run_sql = $connessione->query($sql)){
        $fetch_info = $run_sql->fetch_assoc();
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];

        if($status == "notverified" || $code != 0){
            header('Location: otp.html');
        }
    }else{
        echo "sql fail";
        die();
    }
}else{
    header('Location: login.php');
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="test/style.css">
        <title>Dashboard</title>
    </head>
    <body class="overflow-x-hidden">

        <div class="flex">
          <div class="md:w-72 h-screen bg-black">
            <div class="flex mr-12 my-5 pb-6 border-b border-gray-300">
              <a href="#" class="pl-6 uppercase font-light text-white text-2xl">Sportelli</a>
            </div>

            <div id="dashboard" class="flex items-center px-6 h-12 hover:bg-gray-900">
              <i class="fas fa-chalkboard text-white"></i>
              <a href="#" class="pl-5 text-white text-md font-light">Dashboard</a>
            </div>
            <div id="prenota" class="flex items-center py-2 px-6 h-12 hover:bg-gray-900">
              <i class="fas fa-calendar text-white"></i>
              <a href="#" class="pl-5 text-white text-md font-light">Prenota</a>
            </div>
            <div id="prenotazioni" class="flex items-center px-6 h-12 hover:bg-gray-900">
              <i class="fas fa-bookmark text-white"></i>
              <a href="#" class="pl-5 text-white text-md font-light">Le tue prenotazioni</a>
            </div>
            <div id="account" class="flex items-center py-2 px-6 h-12 hover:bg-gray-900">
              <i class="fas fa-user text-white"></i>
              <a href="#" class="pl-5 text-white text-md font-light">Account</a>
            </div>
          </div>

          <div class="w-max">
            <div class="my-5 pb-6">
              <p class="text-center text-2xl">Prenota</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 pt-3">
                <div>
                    <div class="sm:float-right sm:pr-4">
                        <div class="w-min mx-auto pb-2">
                                <table class="table-auto">
                                    <tr>
                                        <th scope="col">
                                            <button onclick="previousMonth()"><<</button>
                                        </th>
                                        <th scope="col" class="px-2">
                                            <h4 class="text-center" id="month"></h4>
                                        </th>
                                        <th scope="col" class="pr-2">
                                            <h4 class="text-center" id="year"></h4>
                                        </th>
                                        <th scope="col">
                                            <button onclick="nextMonth()">>></button>
                                        </th>
                                    </tr>
                                </table>
                            </div>
                        <div class="w-min mx-auto">
                            <table class="table-auto">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-2">
                                            <h6 class="text-center">L</h6>
                                        </th>
                                        <th scope="col" class="px-2">
                                            <h6 class="text-center">M</h6>
                                        </th>
                                        <th scope="col" class="px-2">
                                            <h6 class="text-center">M</h6>
                                        </th>
                                        <th scope="col" class="px-2">
                                            <h6 class="text-center">G</h6>
                                        </th>
                                        <th scope="col" class="px-2">
                                            <h6 class="text-center">V</h6>
                                        </th>
                                        <th scope="col" class="px-2">
                                            <h6 class="text-center">S</h6>
                                        </th>
                                        <th scope="col" class="px-2">
                                            <h6 class="text-center">D</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                    </tr>

                                    <tr>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                    </tr>

                                    <tr>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                    </tr>

                                    <tr>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                    </tr>

                                    <tr>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                    </tr>

                                    <tr>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                        <td class="rounded-full justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1 fs-6 "></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:float-left sm:pl-4 sm:mx-0 sm:pt-0 pt-10 mx-auto">
                    <div class="sm:w-72 w-64 flex h-full rounded-lg shadow pl-2 items-center">
                            <p class="mx-auto text-center text-gray-400">No day selected</p>
                    </div>
                </div>
            </div>
          </div>
        </div>



        <script src="test/script.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
          $("#dashboard").click(function(){
            document.getElementById("dashboard").innerHTML="ccaaaccaca";
          });



        </script>
    </body>
</html>
