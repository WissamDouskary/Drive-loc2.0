<?php 
require_once '../classes/user.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User();
    $user->signUp($nom, $prenom, $email, $password);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drive & Loc - Sign Up</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        .bg-primary { background-color: #FFD700; }
        .btn-hover:hover { transform: translateY(-2px); transition: transform 0.3s ease; }
    </style>
</head>
<body class="bg-gray-50">
    <nav class="bg-primary shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-4">
                    <a href="../index.php" class="text-2xl font-bold w-8 mr-24"><img src="../imgs/360_F_323469705_belmsoxt9kj49rxSmOBXpO0gHtfVJvjl-removebg-preview.png" alt="LOGO"></a>
                </div>
                <div class="hidden w-full md:block md:w-auto">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium rounded-lg md:flex-row md:space-x-8 md:mt-0">
                    <li>
                        <a href="../index.php" class="block py-2 pl-3 pr-4 text-white hover:text-black-200 md:p-0">Home</a>
                    </li>
                    <li>
                        <a href="../pages/vehicles.php" class="block py-2 pl-3 pr-4 text-white hover:text-black-200 md:p-0">Cars</a>
                    </li>
                </ul>
                </div>
                <div class="flex items-center space-x-6">
                    <a href="../autentification/login.php">Login</a>
                    <a href="../autentification/signup.php" class="bg-white px-6 py-2 rounded-lg hover:bg-gray-100">Register</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="min-h-screen flex items-center justify-center py-12 px-4">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold">Create Account</h2>
                <p class="mt-2 text-gray-600">Join us to start renting vehicles</p>
            </div>
            
            <form class="mt-8 space-y-6 bg-white p-8 rounded-lg shadow" method="POST">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">First Name</label>
                        <input name="prenom" type="text" required class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-yellow-500 focus:border-transparent outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input name="nom" type="text" required class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-yellow-500 focus:border-transparent outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input name="email" type="email" required class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-yellow-500 focus:border-transparent outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Password</label>
                    <input name="password" type="password" required class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-yellow-500 focus:border-transparent outline-none">
                </div>

                <button type="submit" class="w-full bg-primary py-2 px-4 border border-transparent rounded-md text-sm font-medium btn-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                    Create Account
                </button>

                <div class="text-center text-sm text-gray-600">
                    Already have an account? 
                    <a href="../autentification/login.php" class="font-medium text-yellow-600 hover:text-yellow-500">Log in</a>
                </div>
            </form>
        </div>
    </main>

    <footer class="bg-gray-800 text-white py-6">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2024 Drive & Loc. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>