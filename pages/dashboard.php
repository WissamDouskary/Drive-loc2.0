<?php 
require_once '../classes/Categorie.php';
require_once '../classes/client.php';
require_once '../classes/vehicule_class.php';
require_once '../classes/reservation.php';

$client = new client();
$vehicule = new Vehicule();
$categorie = new Categorie();
$reservation = new Reservation();


if(isset($_POST['Category_submit'])){
    $categorie_name = $_POST['cat_name'];
    $categorie_desc = $_POST['cat_desc'];
    $categorie->ajouterCategorie($categorie_name, $categorie_desc);
}

if(isset($_POST['Vehicle_submit'])){
    $modele = $_POST['modele'];
    $marque = $_POST['marque'];
    $Category = $_POST['Category'];
    $price = $_POST['price'];
    $Vehicle_Image = $_FILES['Vehicle_Image'];

    $vehicule->AjouterVehicule($modele, $marque, $price, $Vehicle_Image, $Category);
}

if(isset($_POST['deletevehicule_id'])){
    $vehicule_id = $_POST['deletevehicule_id'];
    if($vehicule->removeVehicule($vehicule_id)){
        header('Location: ../pages/dashboard.php');
        exit();
    }
}

if(isset($_POST['approve_reservation'])) {
    $reservation_id = $_POST['reservation_id'];
    if($reservation->updateReservationStatus($reservation_id, 'accepte')){
        header('Location: ../pages/dashboard.php');
        exit();
    }
}

if(isset($_POST['refuse_reservation'])) {
    $reservation_id = $_POST['reservation_id'];
    if($reservation->updateReservationStatus($reservation_id, 'refuse')){
        header('Location: ../pages/dashboard.php');
        exit();
    }
}


if($_SESSION['role_id'] == 1){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drive & Loc - Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        .bg-primary { background-color: #FFD700; }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }
        .modal.active {
            display: flex;
        }
        .stat-card {
            transition: transform 0.2s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body class="bg-gray-50">


    <!-- Sidebar -->
<div class="fixed left-0 top-0 h-full w-64 bg-white shadow-lg z-10">
    <!-- Logo Section -->
    <div class="flex items-center p-6 border-b">
        <img src="../imgs/360_F_323469705_belmsoxt9kj49rxSmOBXpO0gHtfVJvjl-removebg-preview.png" alt="LOGO" class="h-8 w-auto">
        <span class="ml-2 font-semibold text-lg">Drive & Loc</span>
    </div>
    
    <!-- Navigation Links -->
    <nav class="mt-6">
        <div class="px-4 space-y-2">
            <!-- Dashboard -->
            <a href="dashboard.php" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <span>Dashboard</span>
            </a>

            <!-- Blog dash -->
            <a href="../pages/blog_dashboard.php" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 4H5a2 2 0 00-2 2v12a2 2 0 002 2h14a2 2 0 002-2V6a2 2 0 00-2-2z"></path>
                </svg>
                <span>Blog</span>
            </a>
        </div>
    </nav>

    <!-- User Section -->
    <div class="absolute bottom-0 w-full border-t p-4">
        <div class="flex items-center">
            <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-gray-700"><?php echo $_SESSION['prenom'] . " " . $_SESSION['nom'] ?></p>
                <a href="../classes/user.php?signout" class="text-xs text-gray-500 hover:text-gray-700">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Add margin to main content to accommodate sidebar -->
<style>
    .max-w-7xl {
        margin-left: 16rem; /* 256px = width of sidebar */
    }
</style>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-6">
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
            <div class="bg-white p-6 rounded-lg shadow-md stat-card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Total Categories</p>
                        <h3 class="text-2xl font-bold mt-1">
                            <?php echo count($categorie->showCategorie()); ?>
                        </h3>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-green-500 text-sm mt-4">↑ 12% from last month</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md stat-card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Active Vehicles</p>
                        <h3 class="text-2xl font-bold mt-1"><?php echo count($vehicule->showAllVehicule()); ?></h3>
                    </div>
                    <div class="bg-green-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-green-500 text-sm mt-4">↑ 8% from last month</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md stat-card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Total Reservations</p>
                        <h3 class="text-2xl font-bold mt-1"><?php echo count($reservation->getAllReservations()); ?></h3>
                    </div>
                    <div class="bg-yellow-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-green-500 text-sm mt-4">↑ 23% from last month</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md stat-card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Clients</p>
                        <h3 class="text-2xl font-bold mt-1"><?php echo $_SESSION['role_id'] == 2 ? count($client->ShowAllClients()) : count($client->ShowAllClients())-1 ?></h3>
                    </div>
                    <div class="bg-purple-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-green-500 text-sm mt-4">↑ 15% from last month</p>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="mb-6 flex space-x-4">
            <button onclick="openModal('addVehicleModal')" class="bg-primary px-4 py-2 rounded-lg hover:bg-yellow-400 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add Vehicle
            </button>
            <button onclick="openModal('addCategoryModal')" class="bg-primary px-4 py-2 rounded-lg hover:bg-yellow-400 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add Category
            </button>
        </div>

        <!-- Vehicles Table -->
        <div class="bg-white rounded-lg shadow-md mb-6">
            <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                <h2 class="text-xl font-bold">Vehicles Management</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Model</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Marque</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price/Day</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php
                        $rows = $vehicule->showAllVehicule();
                        foreach($rows as $row){
                            $_SESSION['vehicule_id'] = $row['vehicule_id'];
                        ?>
                        <tr>
                            <td class="px-6 py-4"><?php echo $row['vehicule_id'] ?></td>
                            <td class="px-6 py-4"><?php echo $row['modele'] ?></td>
                            <td class="px-6 py-4"><?php echo $row['marque'] ?></td>
                            <td class="px-6 py-4"><?php echo $row['nom'] ?></td>
                            <td class="px-6 py-4"><?php echo $row['prix'] ?></td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-sm"><?php echo $row['status'] ?></span>
                            </td>
                            <td class="px-6 py-4">
                                <form action="" method="post">
                                <input class="editvehicule_id_input" type="hidden" name="editvehicule_id" value="<?php echo $row['vehicule_id'] ?>">
                                <button class="editbtn text-blue-600 hover:text-blue-800 mr-2">Edit</button>
                                </form>
                                
                                <form action="" method="post">
                                <input type="hidden" name="deletevehicule_id" value="<?php echo $row['vehicule_id'] ?>">
                                <button class="text-red-600 hover:text-red-800">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-gray-200">
                <div class="flex justify-between items-center">
                    <span class="text-gray-600">Showing 1 to 10 of 50 entries</span>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 border rounded hover:bg-gray-50">Previous</button>
                        <button class="px-3 py-1 bg-primary rounded">1</button>
                        <button class="px-3 py-1 border rounded hover:bg-gray-50">2</button>
                        <button class="px-3 py-1 border rounded hover:bg-gray-50">3</button>
                        <button class="px-3 py-1 border rounded hover:bg-gray-50">Next</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Clients Table -->
        <div class="bg-white rounded-lg shadow-md">
            <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                <h2 class="text-xl font-bold">Clients Management</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php
                        $rows = $client->ShowAllClients();
                        foreach($rows as $row){
                        if($row['role_id'] == 2){
                        ?>
                        <tr>
                            <td class="px-6 py-4"><?php echo $row['user_id'] ?></td>
                            <td class="px-6 py-4"><?php echo $row['nom'] . " " . $row['prenom'] ?></td>
                            <td class="px-6 py-4"><?php echo $row['email'] ?></td>
                        </tr>
                        <?php 
                        } 
                        } 
                        ?>
                    </tbody>
                </table>
            </div>
                </div>

                <!-- Category Table -->
        <div class="bg-white rounded-lg shadow-md mt-6">
            <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                <h2 class="text-xl font-bold">Categories Management</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Description</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>

                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    <?php $arrays = $categorie->showCategorie();
                            foreach($arrays as $array){
                            ?>
                        <tr>
                            <td class="px-6 py-4"><?php echo $array['Categorie_id'] ?></td>
                            <td class="px-6 py-4"><?php echo $array['nom'] ?></td>
                            <td class="px-6 py-4"><?php echo $array['description'] ?></td>
                            <td class="px-6 py-4 flex gap-6">
                                <button class="text-green-600 hover:text-green-800 mr-2">Edit</button>
                                <button class="text-red-600 hover:text-red-800">Delete</button>
                            </td>
                            <?php } ?>
                        </tr>
                    </tbody>
                </table>
            </div>
                            </div>
        <!-- Reservations Table -->
        <div class="bg-white rounded-lg shadow-md mt-6">
            <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                <h2 class="text-xl font-bold">Reservations Management</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Client</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Vehicle</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Start Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">End Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php
                        $reservations = $reservation->getAllReservations();
                        foreach($reservations as $res) {
                            $status_color = '';
                            switch($res['status']) {
                                case 'waiting':
                                    $status_color = 'bg-yellow-100 text-yellow-800';
                                    break;
                                case 'accepte':
                                    $status_color = 'bg-green-100 text-green-800';
                                    break;
                                case 'refuse':
                                    $status_color = 'bg-red-100 text-red-800';
                                    break;
                            }
                        ?>
                        <tr>
                            <td class="px-6 py-4"><?php echo $res['reservation_id'] ?></td>
                            <td class="px-6 py-4"><?php echo $res['client_name'] ?></td>
                            <td class="px-6 py-4"><?php echo $res['vehicle_name'] ?></td>
                            <td class="px-6 py-4"><?php echo $res['date_debut'] ?></td>
                            <td class="px-6 py-4"><?php echo $res['date_fin'] ?></td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 rounded-full text-sm <?php echo $status_color ?>">
                                    <?php echo $res['status'] ?>
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <?php if($res['status'] == 'waiting') { ?>
                                    <form method="POST" class="inline-block">
                                        <input type="hidden" name="reservation_id" value="<?php echo $res['reservation_id'] ?>">
                                        <button type="submit" name="approve_reservation" class="text-green-600 hover:text-green-800 mr-2">
                                            Approve
                                        </button>
                                        <button type="submit" name="refuse_reservation" class="text-red-600 hover:text-red-800">
                                            Refuse
                                        </button>
                                    </form>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        </div>

    <!-- Add Vehicle Modal -->
    <div id="addVehicleModal" class="modal">
        <div class="bg-white rounded-lg w-1/2 mx-auto my-auto p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Add New Vehicle</h3>
                <button onclick="closeModal('addVehicleModal')" class="text-gray-500 hover:text-gray-700">×</button>
            </div>
            <form class="space-y-4" method="post" enctype="multipart/form-data">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Vehicle modele</label>
                        <input type="text" class="w-full border rounded-lg p-2" name="modele">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Vehicle marque</label>
                        <input type="text" class="w-full border rounded-lg p-2" name="marque">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Category</label>
                        <select class="w-full border rounded-lg p-2" name="Category">
                            <?php 
                            $arr = $categorie->showCategorie();
                            foreach($arr as $row){
                                echo "<option value='". $row['Categorie_id'] . "'>". $row['nom'] ."</option>";
                            }
                             ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Price per Day</label>
                        <input type="number" class="w-full border rounded-lg p-2" name="price">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Vehicle Image</label>
                    <input type="file" class="w-full border rounded-lg p-2" name="Vehicle_Image">
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeModal('addVehicleModal')" class="px-4 py-2 border rounded-lg">Cancel</button>
                    <button type="submit" name="Vehicle_submit" class="px-4 py-2 bg-primary rounded-lg">Add Vehicle</button>
                </div>
            </form>
        </div>
    </div>

        <!-- Edit Vehicle Modal -->
        <div id="editVehicleModal" class="modal">
        <div class="bg-white rounded-lg w-1/2 mx-auto my-auto p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Add New Vehicle</h3>
                <button onclick="closeModal('editVehicleModal')" class="text-gray-500 hover:text-gray-700">×</button>
            </div>
            <form class="space-y-4" method="post" enctype="multipart/form-data" action="../classes/vehicule_class.php">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Vehicle modele</label>
                        <input type="text" class="w-full border rounded-lg p-2" id="editmodele" name="editmodele">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Vehicle marque</label>
                        <input type="text" class="w-full border rounded-lg p-2" id="editmarque" name="editmarque">
                    </div>
                            <input type="hidden" id="editVehicleId" name="vehiculeId">
                    <div>
                        <label class="block text-sm font-medium mb-1">Category</label>
                        <select class="w-full border rounded-lg p-2" id="editCategory" name="editCategory">
                        <?php 
                            $arr = $categorie->showCategorie();
                            foreach($arr as $row){
                                echo "<option value='". $row['Categorie_id'] . "'>". $row['nom'] ."</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Price per Day</label>
                        <input type="number" class="w-full border rounded-lg p-2" id="editprice" name="editprice">
                    </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Vehicle Image</label>
                    <input type="file" class="w-full border rounded-lg p-2" id="editVehicle_Image" name="editVehicle_Image">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Current Vehicle Image</label>
                    <img id="editVehicleImage" src="" alt="Vehicle Image" style="max-width: 200px; margin-bottom: 10px; border: 1px solid #ccc;">
                </div>
                <?php
                        $rows = $vehicule->showAllVehicule();
                        foreach($rows as $row){
                ?>
                
                <?php } ?>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeModal('editVehicleModal')" class="px-4 py-2 border rounded-lg">Cancel</button>
                    <button type="submit" name="editVehicle_submit" class="px-4 py-2 bg-primary rounded-lg">Edit Vehicule</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Category Modal -->
    <div id="addCategoryModal" class="modal">
        <div class="bg-white rounded-lg w-1/3 mx-auto my-auto p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Add New Category</h3>
                <button onclick="closeModal('addCategoryModal')" class="text-gray-500 hover:text-gray-700">×</button>
            </div>
            <form class="space-y-4" method="POST">
                <div>
                    <label class="block text-sm font-medium mb-1">Category Name</label>
                    <input type="text" name="cat_name" class="w-full border rounded-lg p-2">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Description</label>
                    <textarea class="w-full border rounded-lg p-2" name="cat_desc"  rows="3"></textarea>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeModal('addCategoryModal')" class="px-4 py-2 border rounded-lg">Cancel</button>
                    <button type="submit" name="Category_submit" class="px-4 py-2 bg-primary rounded-lg">Add Category</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.add('active');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('active');
        }
        
        document.querySelectorAll('.editbtn').forEach(editbtn => {
            editbtn.addEventListener('click', function(e){
            
            e.preventDefault();

            let vehiculeid = this.parentElement.querySelector('.editvehicule_id_input').value;

            openModal('editVehicleModal');

            let conn = new XMLHttpRequest();
            conn.open('GET', '../classes/getAllVehicules.php?vehicule_id=' + vehiculeid, true);
            
            conn.send();

            conn.onload = function(){
                if(conn.status === 200){
                    let vehicles = JSON.parse(conn.responseText);

                    vehicles.forEach(vehicle => {
                        document.getElementById('editmarque').value = vehicle.marque;
                        document.getElementById('editmodele').value = vehicle.modele;
                        document.getElementById('editCategory').value = vehicle.Categorie_id;
                        document.getElementById('editprice').value = vehicle.prix;
                        document.getElementById('editVehicleImage').src = vehicle.vehicule_image;
                        document.getElementById('editVehicleId').value = vehicle.vehicule_id;
                    })
                }
            }
        })
        })

        document.querySelector('form')[1].addEventListener('submit', function(e) {
        e.preventDefault();

    let formData = new FormData(this);
    
    let xhr = new XMLHttpRequest();
    xhr.open('POST', '../classes/vehicule_class.php', true);
    
    xhr.onload = function() {
        if (xhr.status === 200) {
            alert('Vehicle updated successfully!');
            closeModal('editVehicleModal');
            location.reload(); 
        }
    };

    xhr.send(formData);
});
            
        
    </script>
</body>
</html>
<?php
}else if($_SESSION['role_id'] == 2){
    header('location: ../index.php');
    exit();
}else{
    header('location: ../autentification/signup.php');
    exit();
}
?>