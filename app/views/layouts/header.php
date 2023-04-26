<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-300">
  
  <nav class="flex bg-white p-5 shadow justify-between items-center">
    <div class="flex items-center pr-4 bg-red-500">
      <img class="h-10" src="https://icon-library.com/images/task-manager-icon/task-manager-icon-0.jpg" alt="">
      <p class="pl-2 font-['Open_Sans']">Tailwind</p>
    </div>

    <a href="#" class="hover:text-3xl hover:underline decoration-4">TO-DO LIST</a>

    <div class="flex bg-green-200 p-3 rounded-full justify-start">
      <ul class="flex">
        <li class="px-5 hover:text-red-500">
          <a href="#" class="">My Tasks</a>
        </li>
        <li class="pr-5">
          <a href="#" class="">Task Filter</a>
        </li>
      </ul>
    </div>
  </nav>