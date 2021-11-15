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
        <?php
        if(count($errors) > 0){
            print('
            <div class=" flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800 ">
            <div class="flex items-center justify-center w-12 bg-red-500">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z"/>
                </svg>
            </div>
            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                <span class="font-semibold text-red-500 dark:text-red-400">Error</span>
                <p class="text-sm text-gray-600 dark:text-gray-200">');
                if(count($errors) > 0){

                    foreach($errors as $showerror){
                        echo $showerror."    ";
                    }
                }      
                print('
                    </p>
                    </div>
                </div>
            </div>
                ');         
        }elseif(isset($_SESSION['info'])){
            print('
            <div class=" flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800 ">
            <div class="flex items-center justify-center w-12 bg-green-500">
            <svg
            class="w-6 h-6 text-white fill-current"
            viewBox="0 0 40 40"
            xmlns="http://www.w3.org/2000/svg"
            >
            <path
              d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"
            />
            </svg>
            </div>
            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                <span class="font-semibold text-green-500 dark:text-green-400">Info</span>
                <p class="text-sm text-gray-600 dark:text-gray-200">');

                echo $_SESSION['info'];     

                print('
                    </p>
                    </div>
                </div>
            </div>
            '); 
        }
        ?>


        <div class="grid grid-cols-1 pt-5 mx-auto">
            <div>
                <form action="login.php" method="POST" class="sm:w-2/3 md:w-1/3 lg:w-1/4 mx-auto w-3/4">
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