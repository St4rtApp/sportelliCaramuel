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
        <div class="grid grid-cols-1 pt-5 mx-auto">
            <div>
                <form class="sm:w-2/3 md:w-1/3 lg:w-1/4 mx-auto w-3/4">

                    <div class="relative flex w-full flex-wrap items-stretch mb-3">
                        <span class=" z-10 h-full leading-snug font-normal absolute text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-2 py-1">
                            <i class="fas fa-at"></i>
                        </span>
                        
                        <input name="email" type="text" placeholder="Esempio@caramuelroncalli.it" class=" px-2 py-1 placeholder-gray-400 text-gray-600 relative bg-white bg-white rounded text-sm border border-gray-400 outline-none focus:outline-none focus:ring w-full pl-10"/>
                    </div>
                    


                    <div class="relative flex w-full flex-wrap items-stretch mb-3">
                        <span class=" z-10 h-full leading-snug font-normal absolute text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-2 py-1">
                            <i class="material-icons">badge</i>
                        </span>
                        
                        <input name="nome" type="text" placeholder="Nome" class=" px-2 py-1 placeholder-gray-400 text-gray-600 relative bg-white bg-white rounded text-sm border border-gray-400 outline-none focus:outline-none focus:ring w-full pl-10"/>
                    </div>



                    <div class="relative flex w-full flex-wrap items-stretch mb-3">
                        <span class=" z-10 h-full leading-snug font-normal absolute text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-2 py-1">
                            <i class="material-icons">badge</i>
                        </span>
                        <input name="cognome" type="text" placeholder="Cognome" class=" px-2 py-1 placeholder-gray-400 text-gray-600 relative bg-white bg-white rounded text-sm border border-gray-400 outline-none focus:outline-none focus:ring w-full pl-10"/>
                    </div>



                    <div class="relative flex w-full flex-wrap items-stretch mb-3">
                        <div class="sm:w-1/2 w-28 sm:pr-0 pr-2">
                            <span class=" z-10 h-full leading-snug font-normal absolute text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-2 py-1">
                                <i class="material-icons">school</i>
                            </span>

                            <input name="classe" type="number" placeholder="Classe" class="px-2 py-1 placeholder-gray-400 text-gray-600 relative bg-white bg-white rounded text-sm border border-gray-400 outline-none focus:outline-none focus:ring w-full pl-10"/>
                        </div>

                        <div class="sm:w-1/2 w-28">
                            <span class=" z-10 h-full leading-snug font-normal absolute text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-2 py-1">
                                <i class="material-icons">text_fields</i>
                            </span>
                            
                            <input name="sezione" type="text" placeholder="Sezione" class="px-2 py-1 placeholder-gray-400 text-gray-600 relative bg-white bg-white rounded text-sm border border-gray-400 outline-none focus:outline-none focus:ring w-full pl-10"/>
                        </div>
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

                    <div class="relative flex w-full flex-wrap items-stretch">
                        <span class=" z-10 h-full leading-snug font-normal absolute text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-2 py-1">
                            <i class="fas fa-lock"></i>
                        </span>
                        
                        <input name="cpassword" id="cpswd" type="cpassword" placeholder="Reinserisci password" class=" px-2 py-1 placeholder-gray-400 text-gray-600 relative bg-white bg-white rounded text-sm border border-gray-400 outline-none focus:outline-none focus:ring w-full pl-10"/>
                        
                        <span class=" z-10 h-full leading-snug font-normal absolute text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 right-0 pr-2 py-1">
                            <i id="eye" class="fas fa-eye" onclick="showPassword()"></i>
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