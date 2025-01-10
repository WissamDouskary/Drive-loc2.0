<?php 
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drive & Loc - My Favorites</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #FFD700;
            --secondary: #FFFFFF;
        }
        .bg-primary { background-color: var(--primary); }
        .btn-primary { 
            background-color: var(--primary);
            transition: all 0.3s ease;
        }
        .btn-primary:hover { transform: translateY(-2px); }
        .card-animation { transition: transform 0.3s ease; }
        .card-animation:hover { transform: translateY(-5px); }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-primary shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-4">
                    <a href="index.html" class="text-2xl font-bold w-8 mr-24">
                        <img src="imgs/logo.png" alt="LOGO" width="32" height="32">
                    </a>
                </div>
                <div class="hidden w-full md:block md:w-auto">
                    <ul class="flex space-x-8">
                        <li><a href="index.html" class="hover:text-gray-700">Home</a></li>
                        <li><a href="vehicles.html" class="hover:text-gray-700">Cars</a></li>
                        <li><a href="blog.html" class="hover:text-gray-700">Blog</a></li>
                        <li><a href="favorites.html" class="border-b-2 border-black-200">My Favorites</a></li>
                    </ul>
                </div>
                
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <button type="button" class="flex text-sm rounded-full md:me-0" id="user-menu-button" aria-expanded="false">
                        <span class="sr-only">Open user menu</span>
                        <img width="40px" src="imgs/profile.png" alt="user photo">
                    </button>
                    <!-- Dropdown menu -->
                    <div class="z-50 hidden absolute top-10 right-40 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow" id="user-dropdown">
                        <div class="px-4 py-3">
                            <span class="block text-sm text-gray-900"><?php echo $_SESSION['nom'] . " " . $_SESSION['prenom'] ?></span>
                            <span class="block text-sm text-gray-500 truncate"><?php echo $_SESSION['email'] ?></span>
                        </div>
                        <ul class="py-2">
                            <li><a href="../blog/myarticles.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Reservations</a></li>
                            <li><a href="../blog/create_article.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Create Article</a></li>
                            <li><a href="../" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Header Section -->
    <div class="bg-primary py-8">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold">My Favorites</h1>
                    <p class="text-gray-700 mt-2">Your collection of saved articles from the Drive & Loc community</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 py-8">
        <!-- Statistics Section -->
        <div class="bg-white p-4 rounded-lg shadow mb-6">
            <h3 class="text-gray-500">Saved Articles</h3>
            <p class="text-2xl font-bold">5</p>
        </div>

        <!-- Articles List -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="space-y-6">
                <!-- Article Item 1 -->
                <div class="border-b pb-6">
                    <div class="flex justify-between items-start">
                        <div class="flex space-x-4">
                            <img src="https://via.placeholder.com/192x112" alt="Article thumbnail" class="w-48 h-28 object-cover rounded">
                            <div>
                                <h3 class="text-xl font-bold mb-2">The Ultimate Guide to Car Maintenance</h3>
                                <p class="text-gray-600 mb-2">Learn essential tips and tricks to keep your car running smoothly. Regular maintenance can extend your vehicle's life and save you money in the long run...</p>
                                <div class="flex space-x-2">
                                    <span class="text-sm bg-gray-100 px-2 py-1 rounded">Maintenance</span>
                                    <span class="text-sm bg-gray-100 px-2 py-1 rounded">Tips</span>
                                    <span class="text-sm bg-gray-100 px-2 py-1 rounded">Cars</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col items-end space-y-2">
                            <span class="text-gray-500">Saved on: Jan 15, 2024</span>
                            <div class="flex space-x-2">
                                <button class="text-blue-500 hover:text-blue-700">Read</button>
                                <button class="text-red-500 hover:text-red-700">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Article Item 2 -->
                <div class="border-b pb-6">
                    <div class="flex justify-between items-start">
                        <div class="flex space-x-4">
                            <img src="https://via.placeholder.com/192x112" alt="Article thumbnail" class="w-48 h-28 object-cover rounded">
                            <div>
                                <h3 class="text-xl font-bold mb-2">Road Trip Essentials: What to Pack</h3>
                                <p class="text-gray-600 mb-2">Planning a road trip? Don't leave without these essential items. From emergency kits to entertainment options, we've got you covered...</p>
                                <div class="flex space-x-2">
                                    <span class="text-sm bg-gray-100 px-2 py-1 rounded">Travel</span>
                                    <span class="text-sm bg-gray-100 px-2 py-1 rounded">Safety</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col items-end space-y-2">
                            <span class="text-gray-500">Saved on: Jan 12, 2024</span>
                            <div class="flex space-x-2">
                                <button class="text-blue-500 hover:text-blue-700">Read</button>
                                <button class="text-red-500 hover:text-red-700">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Article Item 3 -->
                <div class="border-b pb-6">
                    <div class="flex justify-between items-start">
                        <div class="flex space-x-4">
                            <img src="https://via.placeholder.com/192x112" alt="Article thumbnail" class="w-48 h-28 object-cover rounded">
                            <div>
                                <h3 class="text-xl font-bold mb-2">Electric Cars: The Future of Driving</h3>
                                <p class="text-gray-600 mb-2">Explore the advantages and challenges of electric vehicles. From charging infrastructure to environmental impact, get the full picture...</p>
                                <div class="flex space-x-2">
                                    <span class="text-sm bg-gray-100 px-2 py-1 rounded">Electric</span>
                                    <span class="text-sm bg-gray-100 px-2 py-1 rounded">Technology</span>
                                    <span class="text-sm bg-gray-100 px-2 py-1 rounded">Future</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col items-end space-y-2">
                            <span class="text-gray-500">Saved on: Jan 10, 2024</span>
                            <div class="flex space-x-2">
                                <button class="text-blue-500 hover:text-blue-700">Read</button>
                                <button class="text-red-500 hover:text-red-700">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="flex justify-center space-x-2 mt-8">
                <button class="px-4 py-2 rounded-lg border hover:bg-gray-100">Previous</button>
                <button class="px-4 py-2 rounded-lg border bg-primary">1</button>
                <button class="px-4 py-2 rounded-lg border hover:bg-gray-100">2</button>
                <button class="px-4 py-2 rounded-lg border hover:bg-gray-100">Next</button>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Drive & Loc Blog</h3>
                    <p class="text-gray-400">Share your driving experiences and automotive passion.</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Popular Themes</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white">Car Reviews</a></li>
                        <li><a href="#" class="hover:text-white">Travel Stories</a></li>
                        <li><a href="#" class="hover:text-white">Maintenance Tips</a></li>
                        <li><a href="#" class="hover:text-white">Driving Guides</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white">Write Article</a></li>
                        <li><a href="#" class="hover:text-white">My Articles</a></li>
                        <li><a href="#" class="hover:text-white">Community Guidelines</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Follow Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white">Twitter</a>
                        <a href="#" class="text-gray-400 hover:text-white">Facebook</a>
                        <a href="#" class="text-gray-400 hover:text-white">Instagram</a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 Drive & Loc. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // User dropdown toggle
        let isModalOpen = false;
        document.getElementById('user-menu-button').addEventListener('click', function() {
            let dropdown = document.getElementById('user-dropdown');
            if (isModalOpen) {
                dropdown.classList.add('hidden');
                isModalOpen = false;
            } else {
                dropdown.classList.remove('hidden');
                isModalOpen = true;
            }
        });
    </script>
</body>
</html>