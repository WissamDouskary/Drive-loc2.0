<?php 
session_start();
require_once '../blog_class/Theme_class.php';


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" integrity="sha512-9UR1ynHntZdqHnwXKTaOm1s6V9fExqejKvg5XMawEMToW4sSw+3jtLrYfZPijvnwnnE8Uol1O9BcAskoxgec+g==" crossorigin="anonymous"></script>
    <title>Drive & Loc - Create Article</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
        .editor-toolbar button {
            padding: 0.5rem;
            margin: 0.25rem;
            border-radius: 0.375rem;
            transition: all 0.2s;
        }
        .editor-toolbar button:hover {
            background-color: #f3f4f6;
        }
        .bootstrap-tagsinput .tag {
   background: red;
   padding: 4px;
   font-size: 14px;
}
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-primary shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-4">
                    <a href="index.php" class="text-2xl font-bold w-8 mr-24">
                        <img src="../imgs/360_F_323469705_belmsoxt9kj49rxSmOBXpO0gHtfVJvjl-removebg-preview.png" alt="Drive & Loc Logo" class="w-12">
                    </a>
                </div>
                <div class="hidden md:block">
                    <ul class="flex space-x-8">
                        <li><a href="../index.php" class="hover:text-gray-700">Home</a></li>
                        <li><a href="../pages/vehicles.php" class="hover:text-gray-700">Cars</a></li>
                        <li><a href="../blog/blog_index.php" class="hover:text-gray-700">Blog</a></li>
                        <li><a href="../blog/myarticles.php" class="hover:text-gray-700">My Articles</a></li>
                    </ul>
                </div>
                <div class="flex items-center space-x-4">
                    <img src="../imgs/profilephoto.png" alt="Profile" class="w-10 rounded-full cursor-pointer">
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-5xl mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">Create New Article</h1>
                <div class="flex space-x-3">
                    <button class="bg-primary px-6 py-2 rounded-lg hover:bg-yellow-500">Publish</button>
                </div>
            </div>

            <!-- Article Form -->
            <form id="myForm" class="space-y-6" method="post" enctype="multipart/form-data" action="../blog_class/submit_form.php">
                <!-- Title -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Article Title</label>
                    <input type="text" 
                           placeholder="Enter your article title..." 
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-yellow-400 focus:outline-none"
                           name="artcile_titre"
                           >
                </div>

                <!-- Cover Image -->
                <div class="flex">
                <input type="file" name="article_photo" id="file-upload" class="file-upload">
                </div>
                <!-- Category and Tags -->
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Themes</label>
                        <select class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-yellow-400 focus:outline-none" name="article_theme">
                            <option value="" disabled>Select a Theme</option>
                            <?php
                            $rows = Theme::getAllThemes();
                            foreach($rows as $row){
                                echo "<option value='". $row['theme_id'] ."' > " . $row['name'] ." ";
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Tags</label>
                        <input type="text"
                                id="tags-input"
                                name="tags-input"
                               placeholder="Add tags separated by commas..." 
                               data-role="tagsinput"
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-yellow-400 focus:outline-none">
                               
                    </div>
                </div>

                <!-- Text Editor -->
                <div class="border rounded-b-lg p-4 min-h-[400px]">
                    <textarea 
                        placeholder="Start writing your article..." 
                        class="w-full h-full focus:outline-none resize-none"
                        name="article_content"
                    ></textarea>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end space-x-3 border-t pt-6">
                    <button type="submit" id="article_submited" name="article_submited" class="bg-primary px-6 py-2 rounded-lg hover:bg-yellow-500">Publish Article</button>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-12">
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
                        <li><a href="#" class="hover:text-white">My Favorites</a></li>
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
  $(document).ready(function () {

    $('#tags-input').tagsinput({
        
    });

  });
</script>
</body>
</html>