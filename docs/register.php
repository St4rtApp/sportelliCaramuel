<?php require_once "controller.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link  href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="style/style.css">
    </head>

    <body>
        <h1 class="text-center">Register</h1>

        <!-- show error -->
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
        }
        ?>
            

            
        


        <div class="grid grid-cols-1 pt-5 mx-auto">
            <div>
            
                <form method="POST" class="sm:w-2/3 md:w-1/3 lg:w-1/4 mx-auto w-3/4">

                    <div class="relative flex w-full flex-wrap items-stretch mb-3">
                        <span class=" z-10 h-full leading-snug font-normal absolute text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-2 py-1">
                            <i class="fas fa-at"></i>
                        </span>
                        
                        <input required name="email" type="text" placeholder="Esempio@caramuelroncalli.it" class=" px-2 py-1 placeholder-gray-400 text-gray-600 relative bg-white bg-white rounded text-sm border border-gray-400 outline-none focus:outline-none focus:ring w-full pl-10"/>
                    </div>
                    


                    <div class="relative flex w-full flex-wrap items-stretch mb-3">
                        <span class=" z-10 h-full leading-snug font-normal absolute text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-2 py-1">
                            <i class="material-icons">badge</i>
                        </span>
                        
                        <input required name="nome" type="text" placeholder="Nome" class=" px-2 py-1 placeholder-gray-400 text-gray-600 relative bg-white bg-white rounded text-sm border border-gray-400 outline-none focus:outline-none focus:ring w-full pl-10"/>
                    </div>



                    <div class="relative flex w-full flex-wrap items-stretch mb-3">
                        <span class=" z-10 h-full leading-snug font-normal absolute text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-2 py-1">
                            <i class="material-icons">badge</i>
                        </span>
                        <input required name="cognome" type="text" placeholder="Cognome" class=" px-2 py-1 placeholder-gray-400 text-gray-600 relative bg-white bg-white rounded text-sm border border-gray-400 outline-none focus:outline-none focus:ring w-full pl-10"/>
                    </div>



                    <div class="relative flex w-full flex-wrap items-stretch mb-3">
                        <div class="sm:w-1/2 w-28 sm:pr-0 pr-2">
                            <span class=" z-10 h-full leading-snug font-normal absolute text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-2 py-1">
                                <i class="material-icons">school</i>
                            </span>

                            <select required name="anno" class="px-2 py-1 placeholder-gray-400 text-gray-600 relative bg-white bg-white rounded text-sm border border-gray-400 outline-none focus:outline-none focus:ring w-full pl-10">
                                <option value="" selected disabled hidden>-Anno-</option>
                                <option value="biennio">Biennio (1°-2°)</option>
                                <option value="triennio">Triennio (3°-5°)</option>
                            </select>
                            
                        </div>

                        <div class="sm:w-1/2 w-28">
                            <span class=" z-10 h-full leading-snug font-normal absolute text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-2 py-1">
                                <i class="material-icons">text_fields</i>
                            </span>
                            
                            <select required name="corso" class="px-2 py-1 placeholder-gray-400 text-gray-600 relative bg-white bg-white rounded text-sm border border-gray-400 outline-none focus:outline-none focus:ring w-full pl-10">
                                <option value="" selected disabled hidden>-Indirizzo-</option>
                                <option value="liceo">Liceo</option>
                                <option value="itis">I.T.I.S.</option>
                            </select>
                        </div>
                    </div>
                    


                    <div class="relative flex w-full flex-wrap items-stretch mb-3">
                        <span class=" z-10 h-full leading-snug font-normal absolute text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-2 py-1">
                            <i class="fas fa-lock"></i>
                        </span>
                        
                        <input required name="password" id="pswd" type="password" placeholder="Password" class=" px-2 py-1 placeholder-gray-400 text-gray-600 relative bg-white bg-white rounded text-sm border border-gray-400 outline-none focus:outline-none focus:ring w-full pl-10"/>
                        
                        <span class=" z-10 h-full leading-snug font-normal absolute text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 right-0 pr-2 py-1">
                            <i id="eye" class="fas fa-eye" onclick="showPassword('pswd', 'eye')"></i>
                        </span>
                    </div>

                    <div class="relative flex w-full flex-wrap items-stretch">
                        <span class=" z-10 h-full leading-snug font-normal absolute text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-2 py-1">
                            <i class="fas fa-lock"></i>
                        </span>
                        
                        <input required name="cpassword" id="cpswd" type="password" placeholder="Conferma password" class=" px-2 py-1 placeholder-gray-400 text-gray-600 relative bg-white bg-white rounded text-sm border border-gray-400 outline-none focus:outline-none focus:ring w-full pl-10"/>
                        
                        <span class=" z-10 h-full leading-snug font-normal absolute text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 right-0 pr-2 py-1">
                            <i id="ceye" class="fas fa-eye" onclick="showPassword('cpswd', 'ceye')"></i>
                        </span>
                    </div>



                    <div class="pt-4" align="center">
                        <input name="register" type="submit" value="register" class="bg-purple-500 text-white active:bg-purple-600 font-bold uppercase text-sm px-4 py-1 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                    </div>
                </form>
            </div>
        </div>
        
        <script src="script/register.js"></script>
    </body>
</html>