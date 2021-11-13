    <!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="style/style.css">
        <title>Dashboard</title>
    </head>
    <body class="overflow-x-hidden">

        <div class="flex">
          <div class="md:w-72 h-screen bg-black">
            <div class="flex mx-7 my-5 pb-6 border-b border-gray-300">
              <a href="#" class="mx-auto uppercase text-white text-2xl">Sportelli</a>
            </div>

            <div class="flex items-center px-6 h-12 hover:bg-gray-900">
              <i class="fas fa-user text-white"></i>
              <a href="#" class="pl-5 text-white text-md uppercase">Dashboard</a>
            </div>
            <div class="flex items-center my-2 h-12 border-b-4 border-black rounded-xl hover:bg-gray-300">
              <a href="#" class="mx-auto text-white text-lg font-semibold uppercase">Prenota</a>
            </div>
            <div class="flex items-center h-12 border-b-4 border-black rounded-xl hover:bg-gray-300">
              <a href="#" class="mx-auto text-white text-lg font-semibold uppercase">Le tue prenotazioni</a>
            </div>
            <div class="flex items-center my-2 h-12 border-b-4 border-black rounded-xl hover:bg-gray-300">
              <i class="fas fa-user text-white"></i>
              <a href="#" class="mx-auto text-white text-lg font-semibold uppercase">Account</a>
            </div>
          </div>

          <div>
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
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1">
                                            <p class="fs-6 text-center" id="00"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="01"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="02"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="03"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="04"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="05"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="06"></p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="10"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="11"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="12"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="13"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="14"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="15"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="16"></p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1">
                                            <p class="fs-6 text-center" id="20"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="21"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="22"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="23"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="24"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="25"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="26"></p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="30"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="31"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="32"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="33"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="34"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="35"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="36"></p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1">
                                            <p class="fs-6 text-center" id="40"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="41"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="42"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="43"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="44"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="45"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="46"></p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1">
                                            <p class="fs-6 text-center" id="50"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="51"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="52"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="53"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="54"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="55"></p>
                                        </td>
                                        <td class="rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer">
                                            <p class="fs-6 text-center" id="56"></p>
                                        </td>
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



        <script src="script/script.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </body>
</html>
