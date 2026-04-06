<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perpustakaan SMK Infokom  - Perpustakaan Digital</title>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  @vite('resources/css/app.css')
</head>
    <body class="bg-[#F4F7FB] text-gray-800 min-h-screen">
    <div class="flex min-h-screen">
        <x-aside/>
        <div class="flex-1 min-w-0 flex flex-col">
            <x-topbar/>
        {{ $slot }}
        </div>
    </div>
    </body>
</html>