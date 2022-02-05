<!-- pagina che richiede la nuova password e conferma password e fa una POST a 'change-pswd'  -->
<?php require_once "controller.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link  href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="style/login.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <body style="background-image: url('IMGs/study.jpg')"class="overflow-hidden">

        <div id="error_popup" style="width:500px;" class="hidden flex w-full max-w-sm mx-auto overflow-hidden relative top-36 bg-white rounded-lg shadow-md dark:bg-gray-800 ">
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

        <div id="form_container" class="mx-auto relative sm:top-40 shadow-lg pt-6 pb-10 bg-white rounded page-centered">
            <h1 id="titolo" class="text-center sm:text-xl text-2xl">Reimposta password</h1>
            <div class="pt-8">
                <form method="POST" id="login_form" class="mx-10">

                    <div class="relative flex w-full flex-wrap items-stretch">
                            <span class="flex z-10 h-full leading-snug font-normal absolute text-center sm:text-base text-2xl text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-2 py-1">
                                <i class="fas fa-lock"></i>
                            </span>

                            <input name="password" id="pswd" type="password" placeholder="Password" class=" px-2 py-3 placeholder-gray-400 text-gray-600 relative bg-white bg-white sm:text-base text-2xl border-b-3 sm:border-b-2 border-gray-400 w-full pl-10"/>

                            <span class="flex z-10 h-full leading-snug font-normal absolute text-center sm:text-base text-2xl text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 right-0 pr-2 py-1">
                                <i id="eye" class="fas fa-eye" onclick="showPassword('pswd','eye')"></i>
                            </span>
                        </div>

                        <div class="relative flex w-full flex-wrap items-stretch">
                            <span class="flex z-10 h-full leading-snug font-normal absolute text-center sm:text-base text-2xl text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-2 py-1">
                                <i class="fas fa-lock"></i>
                            </span>

                            <input name="cpassword" id="cpswd" type="password" placeholder="Conferma password" class=" px-2 py-3 placeholder-gray-400 text-gray-600 relative bg-white bg-white sm:text-base text-2xl border-b-3 sm:border-b-2 border-gray-400 w-full pl-10"/>

                            <span class="flex z-10 h-full leading-snug font-normal absolute text-center sm:text-base text-2xl text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 right-0 pr-2 py-1">
                                <i id="ceye" class="fas fa-eye" onclick="showPassword('cpswd','ceye')"></i>
                            </span>
                        </div>

                        <div class="sm:pt-4 pt-12">
                            <input id="submit_btn" name="change-password" value="change-password" type="submit" class="cursor-pointer bg-gradient-to-r from-green-400 to-blue-500 text-white font-bold uppercase sm:text-sm text-lg sm:px-4 px-7 sm:py-1 py-2 sm:rounded-full rounded-lg shadow hover:shadow-md hover:bg-blue-800 outline-none focus:outline-none ease-linear transition-all duration-150">
                        </div>
                </form>
            </div>
        </div>

        <script>

        </script>

        <script src="script/register.js"></script>
    </body>
</html>
