<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Palace</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Navigation Bar -->
    <header class="bg-gray-800 py-4">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="text-white text-xl font-bold">Pet Palace</a>
            <!-- Navigation Links -->
            <nav class="hidden md:flex space-x-4">
                <a href="../home/index.php" class="text-white">Home</a>
                <a href="../orang/index.php" class="text-white">Orang</a>
                <a href="../hewan/index.php" class="text-white">Hewan</a>
                <a href="../warna/index.php" class="text-white">Warna</a>
                <a href="../peliharaan/index.php" class="text-white">Peliharaan</a>
            </nav>
            <!-- Mobile Navigation Button -->
            <button class="md:hidden focus:outline-none">
                <svg class="text-white h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
    </header>

    <!-- Content Area -->
    <main class="container mx-auto py-8 flex flex-col items-center">
        <h1 class="text-5xl font-bold mb-4 text-gray-800 text-center">Welcome to Pet Palace</h1>
        <p class="text-xl text-gray-700 text-center mb-8">Your one-stop destination for all things related to pets.</p>
        <div class="flex justify-center">
            <img src="../img/pet.png" alt="pet picture" class="max-w-full h-auto md:max-w-3xl">
        </div>
    </main>

</body>

</html>
