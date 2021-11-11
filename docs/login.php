<?php require_once "controller.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link  href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="style/style.css">
    </head>

    <body>
        <h1 class="text-center">Login</h1>
        <div class="grid grid-cols-1 pt-5 mx-auto">
            <div>
                <form class="sm:w-2/3 md:w-1/3 lg:w-1/4 mx-auto w-3/4">
                    <div class="relative flex w-full flex-wrap items-stretch mb-3">
                        <span class=" z-10 h-full leading-snug font-normal absolute text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-2 py-1">
                            <i class="fas fa-user"></i>
                        </span>
                        
                        <input name="email" type="text" placeholder="User" class=" px-2 py-1 placeholder-gray-400 text-gray-600 relative bg-white bg-white rounded text-sm border border-gray-400 outline-none focus:outline-none focus:ring w-full pl-10"/>
                    </div>

                    <div class="relative flex w-full flex-wrap items-stretch">
                        <span class=" z-10 h-full leading-snug font-normal absolute text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-2 py-1">
                            <i class="fas fa-lock"></i>
                        </span>
                        
                        <input name="password" id="pswd" type="password" placeholder="Password" class=" px-2 py-1 placeholder-gray-400 text-gray-600 relative bg-white bg-white rounded text-sm border border-gray-400 outline-none focus:outline-none focus:ring w-full pl-10"/>
                        
                        <span class=" z-10 h-full leading-snug font-normal absolute text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 right-0 pr-2 py-1">
                            <i id="eye" class="fas fa-eye" onclick="showPassword()"></i>
                        </span>
                    </div>

                    <div class="pt-4">
                        <input name="login" type="submit" value="login" class="bg-purple-500 text-white active:bg-purple-600 font-bold uppercase text-sm px-4 py-1 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                        <a href="#" class="bg-purple-500 text-white active:bg-purple-600 font-bold uppercase text-sm px-4 py-1 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Dimenticata?</a>
                    </div>
                </form>
            </div>
        </div>
        
        <script src="script/login.js"></script>
    </body>
</html>