<?php 
session_start();


if($_SESSION['role_id'] == 2){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drive & Loc - Car Rental</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #FFD700;
            --secondary: #FFFFFF;
        }
        .bg-primary { background-color: var(--primary); }
        .btn-primary { 
            background-color: var(--primary);
            transition: transform 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
        }
        .card-hover {
            transition: transform 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <nav class="bg-primary shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-4">
                    <span class="text-2xl font-bold w-8 mr-24"><img src="../Drive-Loc/imgs/360_F_323469705_belmsoxt9kj49rxSmOBXpO0gHtfVJvjl-removebg-preview.png" alt="LOGO"></span>
                </div>
                <div class="hidden w-full md:block md:w-auto">
                <ul class="flex space-x-8">
                        <li><a href="../index.php" class="border-b-2 border-black-200">Home</a></li>
                        <li><a href="../Drive-loc2.0/pages/vehicles.php" class="hover:text-gray-700">Cars</a></li>
                        <li><a href="../Drive-loc2.0/blog/blog_index.php" class="hover:text-gray-700">Blog</a></li>
                        <li><a href="../Drive-loc2.0/blog/myarticles.php" class="hover:text-gray-700">My Articles</a></li>
                </ul>
                </div>
                <?php if(isset($_SESSION['user_id'])){ ?>

  <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      <button type="button" class="flex text-sm rounded-full md:me-0" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        <span class="sr-only">Open user menu</span>
        <img width="40px" src="../Drive-Loc/imgs/profilephoto.png" alt="user photo">
      </button>
      <!-- Dropdown menu -->
      <div class="z-50 hidden absolute top-10 right-40 z-50 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
        <div class="px-4 py-3">
          <span class="block text-sm text-gray-900 dark:text-white"><?php echo $_SESSION['nom'] . " " . $_SESSION['prenom'] ?></span>
          <span class="block text-sm  text-gray-500 truncate dark:text-gray-400"><?php echo $_SESSION['email'] ?></span>
        </div>
          <li>
            <a href="../Drive-Loc/pages/reservation_hestorie.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white ">My Reservations</a>
          </li>
          <li>
            <a href="../Drive-Loc/classes/user.php?signout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white ">Sign out</a>
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
                <?php }else{ ?>
                <div class="flex items-center space-x-6">
                    <a href="../Drive-Loc/autentification/login.php">Login</a>
                    <a href="../Drive-Loc/autentification/signup.php" class="bg-white px-6 py-2 rounded-lg hover:bg-gray-100">Register</a>
                </div>
                <?php } ?>
            </div>
        </div>
    </nav>

    <main>
        <section class="bg-primary py-20">
            <div class="max-w-7xl mx-auto px-4 text-center">
                <h1 class="text-5xl font-bold mb-6">Discover Our Vehicle Fleet</h1>
                <p class="text-xl mb-8">Quick and easy rentals for all your travels</p>
                <a href="#vehicles" class="inline-block bg-white px-8 py-3 rounded-lg font-semibold hover:bg-gray-100">
                    View Our Vehicles
                </a>
            </div>
        </section>

        <section class="py-16 bg-white" id="vehicles">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-12">Available Vehicles</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="rounded-lg shadow-lg overflow-hidden card-hover">
                        <img src="../Drive-Loc/uploads/784f7a74-a71b-425b-aeea-7e8ba80eb0de.webp" alt="City Car" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="font-bold text-xl mb-2">Comfort City Car</h3>
                            <p class="text-gray-600 mb-4">Perfect for city driving</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold">$45/day</span>
                                <button class="btn-primary px-6 py-2 rounded-lg">Book Now</button>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-lg shadow-lg overflow-hidden card-hover">
                        <img src="../Drive-Loc/uploads/439807.jpeg" alt="SUV" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="font-bold text-xl mb-2">Family SUV</h3>
                            <p class="text-gray-600 mb-4">Ideal for travel</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold">$75/day</span>
                                <button class="btn-primary px-6 py-2 rounded-lg">Book Now</button>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-lg shadow-lg overflow-hidden card-hover">
                        <img src="../Drive-Loc/uploads/2024-honda-cr-v-hybrid-front-right-angle.avif" alt="Premium" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="font-bold text-xl mb-2">Premium Sedan</h3>
                            <p class="text-gray-600 mb-4">Luxury within reach</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold">$95/day</span>
                                <button class="btn-primary px-6 py-2 rounded-lg">Book Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 text-center">
                <h2 class="text-3xl font-bold mb-8">Why Choose Us?</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-4">Quick Booking</h3>
                        <p>Simple and efficient process</p>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-4">Premium Service</h3>
                        <p>Recent and well-maintained vehicles</p>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-4">24/7 Support</h3>
                        <p>A team at your service</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2024 Drive & Loc. All rights reserved.</p>
        </div>
    </footer>
    <script src="../Drive-Loc/scripts/script.js"></script>
</body>
</html>
<?php 
}else{
    header('location: ../Drive-Loc/autentification/signup.php');
    exit();
}
?>