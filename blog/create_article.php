<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-primary shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-4">
                    <a href="index.php" class="text-2xl font-bold w-8 mr-24">
                        <img src="/api/placeholder/40/40" alt="Drive & Loc Logo" class="w-12 h-12">
                    </a>
                </div>
                <div class="hidden md:block">
                    <ul class="flex space-x-8">
                        <li><a href="index.php" class="hover:text-gray-700">Home</a></li>
                        <li><a href="vehicles.php" class="hover:text-gray-700">Cars</a></li>
                        <li><a href="blog.php" class="hover:text-gray-700">Blog</a></li>
                        <li><a href="my-articles.php" class="hover:text-gray-700">My Articles</a></li>
                    </ul>
                </div>
                <div class="flex items-center space-x-4">
                    <img src="/api/placeholder/40/40" alt="Profile" class="w-10 rounded-full cursor-pointer">
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
                    <button class="px-4 py-2 border rounded-lg hover:bg-gray-100">Save Draft</button>
                    <button class="bg-primary px-6 py-2 rounded-lg hover:bg-yellow-500">Publish</button>
                </div>
            </div>

            <!-- Article Form -->
            <form class="space-y-6">
                <!-- Title -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Article Title</label>
                    <input type="text" 
                           placeholder="Enter your article title..." 
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-yellow-400 focus:outline-none">
                </div>

                <!-- Cover Image -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Cover Image</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center">
                        <div class="space-y-2">
                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400"></i>
                            <p class="text-gray-500">Drag and drop your cover image here, or</p>
                            <button class="text-blue-500 hover:text-blue-700">browse files</button>
                        </div>
                    </div>
                </div>

                <!-- Category and Tags -->
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Category</label>
                        <select class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-yellow-400 focus:outline-none">
                            <option value="">Select a category</option>
                            <option value="car-reviews">Car Reviews</option>
                            <option value="travel-stories">Travel Stories</option>
                            <option value="maintenance">Maintenance Tips</option>
                            <option value="driving-guide">Driving Guide</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Tags</label>
                        <input type="text" 
                               placeholder="Add tags separated by commas..." 
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-yellow-400 focus:outline-none">
                    </div>
                </div>

                <!-- Text Editor Toolbar -->
                <div class="border rounded-t-lg bg-gray-50 p-2 editor-toolbar">
                    <div class="flex flex-wrap items-center">
                        <button type="button" title="Bold"><i class="fas fa-bold"></i></button>
                        <button type="button" title="Italic"><i class="fas fa-italic"></i></button>
                        <button type="button" title="Underline"><i class="fas fa-underline"></i></button>
                        <div class="w-px h-6 bg-gray-300 mx-2"></div>
                        <button type="button" title="Heading 1"><i class="fas fa-heading"></i></button>
                        <button type="button" title="Bullet List"><i class="fas fa-list-ul"></i></button>
                        <button type="button" title="Numbered List"><i class="fas fa-list-ol"></i></button>
                        <div class="w-px h-6 bg-gray-300 mx-2"></div>
                        <button type="button" title="Insert Link"><i class="fas fa-link"></i></button>
                        <button type="button" title="Insert Image"><i class="fas fa-image"></i></button>
                        <button type="button" title="Insert Video"><i class="fas fa-video"></i></button>
                        <div class="w-px h-6 bg-gray-300 mx-2"></div>
                        <button type="button" title="Quote"><i class="fas fa-quote-right"></i></button>
                        <button type="button" title="Code Block"><i class="fas fa-code"></i></button>
                    </div>
                </div>

                <!-- Text Editor -->
                <div class="border rounded-b-lg p-4 min-h-[400px]">
                    <textarea 
                        placeholder="Start writing your article..." 
                        class="w-full h-full focus:outline-none resize-none"
                    ></textarea>
                </div>

                <!-- SEO Section -->
                <div class="border-t pt-6 mt-8">
                    <h3 class="text-xl font-bold mb-4">SEO Settings</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Meta Title</label>
                            <input type="text" 
                                   placeholder="Enter SEO title..." 
                                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-yellow-400 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Meta Description</label>
                            <textarea 
                                placeholder="Enter SEO description..." 
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-yellow-400 focus:outline-none h-24"
                            ></textarea>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end space-x-3 border-t pt-6">
                    <button type="button" class="px-6 py-2 border rounded-lg hover:bg-gray-100">Preview</button>
                    <button type="button" class="px-4 py-2 border rounded-lg hover:bg-gray-100">Save Draft</button>
                    <button type="submit" class="bg-primary px-6 py-2 rounded-lg hover:bg-yellow-500">Publish Article</button>
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
</body>
</html>