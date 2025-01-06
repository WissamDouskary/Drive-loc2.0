<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
require_once '../classes/vehicule_class.php';
require_once '../classes/Avis.php';
require_once '../classes/client.php';

$vehicule = new Vehicule();
$avis = new Avis();

if(isset($_POST['submit_review']) && isset($_SESSION['vehicule_id'])){
    $commentaire = $_POST['commentaire'];
    $car_id = $_SESSION['vehicule_id'];
    $user_id = $_SESSION['user_id'];

    $avis->ajouterAvis($commentaire, $user_id, $car_id);
}

if(isset($_SESSION['commentAdd'])){
    $message = $_SESSION['commentAdd'];
    $alertType = 'success'; 
    unset($_SESSION['commentAdd']);
}else if(isset($_SESSION['commentdontAdd'])){
    $message = $_SESSION['commentdontAdd'];
    $alertType = 'error';
    unset($_SESSION['commentdontAdd']);
}else if(isset($_SESSION['success'])) {
    $message = $_SESSION['success'];
    $alertType = 'success';
    unset($_SESSION['success']); 
}else if(isset($_SESSION['date_invalide'])){
    $message = $_SESSION['date_invalide'];
    $alertType = 'error'; 
    unset($_SESSION['date_invalide']); 
}else if(isset($_SESSION['suppavissuccess'])){
    $message = $_SESSION['suppavissuccess'];
    $alertType = 'success';
    unset($_SESSION['suppavissuccess']);
}else if(isset($_SESSION['suppaviserror'])){
    $message = $_SESSION['suppaviserror'];
    $alertType = 'success';
    unset($_SESSION['suppaviserror']);
} else {
    $message = '';
    $alertType = '';
}





if($_SESSION['role_id'] == 2){


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drive & Loc - Car Reservation</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js"></script>
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
    </style>
</head>
<body class="bg-gray-50">
        
        <?php if ($message != ''){ ?>
        <div class="fixed top-0 left-1/2 transform -translate-x-1/2 z-50 w-80 mt-4 px-4 py-3 rounded-lg text-center 
            <?php echo $alertType == 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'; ?>" 
            x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300" x-transition:leave="transition ease-in duration-200" x-init="setTimeout(() => show = false, 5000)">
            <span><?php echo $message; ?></span>
            <button @click="show = false" class="absolute top-1 right-1 text-xl font-bold">&times;</button>
        </div>
    <?php } ?>

            <?php if ($message != ''){ ?>
        <div class="fixed top-0 left-1/2 transform -translate-x-1/2 z-50 w-80 mt-4 px-4 py-3 rounded-lg text-center 
            <?php echo $alertType == 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'; ?>" 
            x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300" x-transition:leave="transition ease-in duration-200" x-init="setTimeout(() => show = false, 5000)">
            <span><?php echo $message; ?></span>
            <button @click="show = false" class="absolute top-1 right-1 text-xl font-bold">&times;</button>
        </div>
    <?php } ?>
    <!-- Navigation Bar -->
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
                        <a href="../pages/vehicles.php" class="block py-2 pl-3 pr-4 text-black-200 border-b-2 border-black-200 md:p-0">Cars</a>
                    </li>
                </ul>
                </div>
                <?php if(isset($_SESSION['user_id'])){ ?>
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
                <?php }else{ ?>
                <div class="flex items-center space-x-6">
                    <a href="../autentification/login.php">Login</a>
                    <a href="../autentification/signup.php" class="bg-white px-6 py-2 rounded-lg hover:bg-gray-100">Register</a>
                </div>
                <?php } ?>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 py-8">
        <!-- Car Details Section -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="md:flex">
                <?php
                $_SESSION['vehicule_id'] = $_GET['vehiculeId'];
                if(isset($_SESSION['vehicule_id']) || isset($_GET['vehiculeId'])){
                
                $rows = $vehicule->showSpiceficAllVehicule($_SESSION['vehicule_id']);
                foreach($rows as $row){
                ?>
                    
                <!-- Car Image -->
                <div class="md:w-1/2">
                    <img src="<?php echo $row['vehicule_image'] ?>" alt="Car Image" class="w-full h-96 object-cover">
                </div>
                <!-- Car Information -->
                
                <div class="md:w-1/2 p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h1 class="text-3xl font-bold"><?php echo $row['marque'] ?></h1>
                            <p class="text-gray-600 text-xl mt-2"><?php echo $row['modele'] ?></p>
                        </div>
                        <span class="bg-primary px-4 py-2 rounded-full text-lg font-semibold">$<?php echo $row['prix'] ?>/day</span>
                    </div>

                    <!-- Availability Status -->
                    <div class="mb-6">
                        <?php if($row['status'] == 'active'){ ?>
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-green-100 text-green-800">
                            <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                            <?php echo $row['status'] ?>
                        </span>
                        <?php }else if($row['status'] == 'Reserved'){ ?>
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-yellow-100 text-yellow-800">
                            <span class="w-2 h-2 bg-yellow-500 rounded-full mr-2"></span>
                            <?php echo $row['status'] ?>
                        </span>
                        <?php } ?>
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-red-100 text-red-800">
                            <span class="w-2 h-2 bg-red-500 rounded-full mr-2"></span>
                            <?php echo $row['nom'] ?>
                        </span>
                    </div>

                    <!-- Car Features -->
                    <div class="grid grid-cols-2 gap-6 mb-6">
                        <div>
                            <h3 class="font-semibold mb-2">Features:</h3>
                            <ul class="space-y-2">
                                <li>✓ 5 Seats</li>
                                <li>✓ Automatic Transmission</li>
                                <li>✓ GPS Navigation</li>
                                <li>✓ Bluetooth</li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="font-semibold mb-2">Specifications:</h3>
                            <ul class="space-y-2">
                                <li>• Engine: 2.5L 4-cylinder</li>
                                <li>• Fuel: Gasoline</li>
                                <li>• Year: 2024</li>
                                <li>• Mileage: 15,000 km</li>
                            </ul>
                        </div>
                    </div>
                    <?php if($row['status'] == 'active'){  ?>
                    <!-- Reservation Form -->
                    <form class="space-y-4" method="post" action="reservation_page.php?vehicule_Id=<?php echo $_SESSION['vehicule_id'] ?>&clientId=<?php echo $_SESSION['user_id'] ?>">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1">Pick-up Date</label>
                                <input type="date" class="w-full border rounded-lg p-2" name="date_debut">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Return Date</label>
                                <input type="date" class="w-full border rounded-lg p-2" name="date_fin">
                            </div>
                        </div>
                        <input name="reservation_submit" type="submit" class="cursor-pointer btn-primary w-full py-3 rounded-lg text-lg font-semibold mt-6" value="Reserve Now">
                    </form>
                    <?php }else{  ?>
                    <h2 class="text-xl">You can't reserve this car, please return another time !</h2>
                    <?php }  ?>
                </div>
                <?php
                } 
                }
                 ?>
            </div>
        </div>



        <!-- Comments Section -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold mb-6">Customer Reviews</h2>
            
            <!-- Add Comment Form -->
            <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                <h3 class="text-lg font-semibold mb-4">Add Your Review</h3>
                <form class="space-y-4" method="post">
                    <div>
                        <label class="block text-sm font-medium mb-1">Your Review</label>
                        <textarea class="w-full border rounded-lg p-2" rows="4" name="commentaire"></textarea>
                    </div>
                    <button class="bg-primary px-6 py-2 rounded-lg" name="submit_review">Submit Review</button>
                </form>
            </div>

            <!-- Comments -->
             <?php
            $reviews = $avis->showAvis($_SESSION['vehicule_id']);
            foreach($reviews as $rev){
             ?>
            <div class="space-y-6">
                <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h4 class="font-semibold"><?php echo $rev['nom'] . " " . $rev['prenom'] ?></h4>
                        </div>
                        <div class="flex justify-end gap-6">
                        <span class="text-gray-500"><?php echo $rev['date_creation'] ?></span>
                        <?php if($_SESSION['user_id'] == $rev['user_id']){ ?>
                        <form method="post" action="../classes/Avis.php">
                            <input type="hidden" name="DeleteAvisID" id="DeleteAvisID" value="<?php echo $rev['avis_id']; ?>">
                            <input type="image" name="AvisSubmitDel" src="../imgs/delete_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24 (1).svg" alt="submit" class="bg-red-500 rounded-full">
                        </form>
                        <?php } ?>
                        </div>

                    </div>
                    <p class="text-gray-700"><?php echo $rev['commentaire'] ?></p>
                </div>
            </div>
            <?php } ?>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2024 Drive & Loc. All rights reserved.</p>
        </div>
    </footer>

    <script src="../scripts/script.js"></script>
</body>
</html>
<?php 
}else{
    header('location: ../autentification/signup.php');
    exit();
}
?>