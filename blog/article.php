<?php
session_start();

require_once '../blog_class/artcile_class.php';
require_once '../blog_class/favori_class.php';
require_once '../blog_class/comments_class.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Title - Drive & Loc Blog</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #FFD700;
            --secondary: #FFFFFF;
        }
        .bg-primary { background-color: var(--primary); }
        .like-button { transition: all 0.3s ease; }
        .like-button:hover { transform: scale(1.1); }
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
                    <a href="../index.php" class="text-2xl font-bold w-8 mr-24"><img src="../imgs/360_F_323469705_belmsoxt9kj49rxSmOBXpO0gHtfVJvjl-removebg-preview.png" alt="LOGO"></a>
                </div>
                <div class="hidden w-full md:block md:w-auto">
                <ul class="flex space-x-8">
                        <li><a href="../index.php" class="hover:text-gray-700">Home</a></li>
                        <li><a href="../pages/vehicles.php" class="hover:text-gray-700">Cars</a></li>
                        <li><a href="../blog/blog_index.php" class="hover:text-gray-700">Blog</a></li>
                        <li><a href="../blog/myarticles.php" class="hover:text-gray-700">My Articles</a></li>
                    </ul>
                </div>
                
                    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      <button type="button" class="flex text-sm rounded-full md:me-0" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        <span class="sr-only">Open user menu</span>
        <img width="40px" src="../imgs/profilephoto.png" alt="user photo">
      </button>
      <!-- Dropdown menu -->
      <div class="z-50 hidden absolute top-10 right-40 z-50 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
        <div class="px-4 py-3">
          <span class="block text-sm text-gray-900 dark:text-white"><?php echo $_SESSION['nom'] . " " . $_SESSION['prenom'] ?></span>
          <span class="block text-sm  text-gray-500 truncate dark:text-gray-400"><?php echo $_SESSION['email'] ?></span>
        </div>
          <li>
            <a href="../pages/reservation_hestorie.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white ">My Reservations</a>
          </li>
          <li>
            <a href="../blog/create_article.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white ">Create Article</a>
          </li>
          <li><a href="../blog/favori.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Favorite</a></li>
          <li>
            <a href="../classes/user.php?signout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white ">Sign out</a>
          </li>
        </ul>
      </div>
      <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
  </div>
                
            </div>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-4 py-8">
        <!-- Article Header -->
         <?php 
        $rows = Article::getSpecifiqueArticle($_GET['article_name']);
        foreach($rows as $row){
         ?>
        <article class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
            <img src="<?php echo $row['article_image'] ?>" alt="Article Cover" class="w-full h-96 object-cover">
            
            <div class="p-8">
                <!-- Article Meta -->
                <div class="flex items-center justify-between mb-6">
                    <div class="flex space-x-3">
                        <?php if(!Favori::CheckclientFavorites($_SESSION['user_id'], $row['article_id'])){ ?>
                        <a href="../handling/favori_handl.php?article_id=<?php echo $row['article_id'] ?>"><button class="like-button flex items-center space-x-2 text-gray-500 hover:text-red-500">
                            <span>🤍</span>
                            <span><?php echo count(Favori::CountFavorite($row['article_id'])) ?></span>
                        </button></a>
                        <?php }else{ ?>
                        <span>❤️</span>
                        <span class="text-red-500"><?php echo count(Favori::CountFavorite($row['article_id'])) ?></span>
                        <?php } ?>
                    </div>
                </div>

                <!-- Article Content -->
                <h1 class="text-4xl font-bold mb-4"><?php echo $row['title'] ?></h1>
                
                <div class="flex flex-wrap gap-2 mb-6">
                    <?php 
                    $tags = Article::gettagsForArticle($_GET['article_name']);
                    foreach($tags as $tag){
                    ?>
                    <span class="bg-gray-100 px-3 py-1 rounded-full text-sm"><?php echo $tag['name'] ?></span>
                    <?php } ?>
                </div>

                <div class="prose max-w-none">
                    <p class="text-gray-600 mb-4">
                    <?php echo $row['content'] ?>
                    </p>
                    
                </div>
            </div>
        </article>
        <?php 
        }
         ?>

        <!-- Comments Section -->
        <section class="bg-white rounded-xl shadow-lg p-8">
            <h2 class="text-2xl font-bold mb-6">Comments (12)</h2>

            <!-- Add Comment Form -->
            <?php if($_GET['article_name']){
                  
            ?>
            <form class="mb-8" method="post" action="../handling/comment_handle.php?article_id=<?php echo $_GET['article_name']?>">
                <div class="mb-4">
                    <textarea 
                        class="w-full p-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400"
                        rows="3"
                        placeholder="Add a comment..."
                        name="typedcomment"
                    ></textarea>
                </div>
                <button type="submit" class="bg-primary px-6 py-2 rounded-lg hover:bg-yellow-500">
                    Post Comment
                </button>
            </form>
            <?php } ?>
            <!-- Comments List -->
            <div class="space-y-6">
                <!-- Single Comment -->
                 <?php 
                 $rows = Comments::allCommentsByArticle($_GET['article_name']);
                 foreach($rows as $row){
                 ?>
                <div class="border-b pb-6">
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center space-x-3">
                            <div>
                                <p class="font-semibold"><?php echo $row['nom'] . " " . $row['prenom'] ?></p>
                                <p class="text-gray-500 text-sm"><?php echo $row['date_creation'] ?></p>
                            </div>
                        </div>
                        <?php if($_SESSION['user_id'] == $row['user_id']){ ?>
                        <div class="flex space-x-2 text-sm">
                            <a href="../handling/delete_comment.php?comment_id=<?php echo $row['comments_id'] ?>&article_name=<?php echo $row['article_id'] ?>"><button class="text-red-500 hover:text-red-700">Delete</button></a>
                        </div>
                        <?php } ?>
                    </div>
                    <p class="text-gray-600">
                        <?php echo $row['content'] ?>
                    </p>
                </div>
                <?php } ?>

            </div>

            <!-- Pagination for comments -->
            <div class="flex justify-center space-x-2 mt-8">
                <button class="px-4 py-2 rounded-lg border hover:bg-gray-100">Previous</button>
                <button class="px-4 py-2 rounded-lg border bg-primary">1</button>
                <button class="px-4 py-2 rounded-lg border hover:bg-gray-100">2</button>
                <button class="px-4 py-2 rounded-lg border hover:bg-gray-100">3</button>
                <button class="px-4 py-2 rounded-lg border hover:bg-gray-100">Next</button>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-12">
        <!-- Footer content -->
    </footer>

    <script>
        let isModalOpen = false;

document.getElementById('user-menu-button').addEventListener('click', function () {
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