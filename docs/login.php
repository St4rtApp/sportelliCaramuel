<?php require_once "controller.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link  href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="test/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <body style="background-image: url('IMGs/study.jpg')"class="overflow-hidden">
        <h1 id="titolo" class="text-center">Login</h1>

        <div id="error_popup" style="width:500px;position:relative;top:115px" class="hidden flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800 ">
          <div class="flex items-center justify-center w-12 bg-red-500">
              <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                  <path d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z"/>
              </svg>
          </div>
          <div class="px-4 py-2 -mx-3">
              <div class="mx-3">
                <span class="font-semibold text-red-500 dark:text-red-400">Error</span>
                <p id="error_log" class="text-sm text-gray-600 dark:text-gray-200"></p>
              </div>
          </div>
        </div>

        <div style="width:500px;position:relative;top:125px" class="mx-auto shadow-lg py-10 bg-white rounded page-centered">
            <div>
                <form method="POST" id="login_form" class="mx-10">
                    <div class="relative flex w-full flex-wrap items-stretch mb-3">
                        <span class="flex items-center z-10 h-full leading-snug font-normal absolute text-center text-gray-400 absolute bg-transparent rounded text-base justify-center w-8 pl-2 py-1">
                            <i class="fas fa-user"></i>
                        </span>

                        <input name="email" type="text" placeholder="mail@esempio.com" class=" px-2 py-3 placeholder-gray-400 text-gray-600 relative bg-white bg-white text-md border-b-2 border-gray-400 focus:rounded-xl focus:ring w-full pl-10"/>
                    </div>

                    <div class="relative flex w-full flex-wrap items-stretch">
                        <span class="flex z-10 h-full leading-snug font-normal absolute text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-2 py-1">
                            <i class="fas fa-lock"></i>
                        </span>

                        <input name="password" id="pswd" type="password" placeholder="Password" class=" px-2 py-3 placeholder-gray-400 text-gray-600 relative bg-white bg-white text-md border-b-2 border-gray-400 focus:rounded-xl focus:ring w-full pl-10"/>

                        <span class="flex z-10 h-full leading-snug font-normal absolute text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 right-0 pr-2 py-1">
                            <i id="eye" class="fas fa-eye" onclick="showPassword()"></i>
                        </span>
                    </div>

                    <div class="pt-4">
                        <input id="submit_btn" name="login" type="submit" value="login" class="cursor-pointer bg-gradient-to-r from-green-400 to-blue-500 text-white font-bold uppercase text-sm px-4 py-1 rounded-full shadow hover:shadow-md hover:bg-blue-800 outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                        <a id="dimenticanza" href="#" class="bg-gradient-to-r from-blue-500 to-blue-800 text-white active:bg-purple-600 font-bold uppercase text-sm px-4 py-1 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Dimenticata?</a>
                    </div>
                </form>
            </div>
        </div>

        <script>
            $("#titolo").click(function(){
              document.getElementById("error_popup").classList.remove("hidden");
            });

            $("#submit_btn").click(function(){
              $.ajax({
                type: "POST",
                url: "controller.php",
                datatype: "html",
                data: dataString,

                success: function(data) {
                  var errori = $.parseJSON(data);
                  if(errori.email!="" || errori.dberror!=""){
                    document.getElementById("error_popup").classList.remove("hidden");
                    document.getElementById("error_log").innerHTML=errori.email + errori.dberror;
                  }
                },
                error: function() {
                  alert("Problema di comunicazione con il server!");
                }
              });
            });

        </script>

        <script src="script/login.js"></script>
    </body>
</html>
