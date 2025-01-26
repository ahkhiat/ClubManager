
<?php
include './Utils/header.php';
var_dump($_SESSION);
?>

<h1>Bienvenue sur CoachTracker</h1>


<!-- <a href="?controller=admin&action=dashboard_admin" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Admin</a>     -->

<div class="bg-gray-50  text-gray-800 flex items-center justify-center min-h-screen">

    <div class="max-w-md text-center bg-white rounded-2xl shadow-lg p-8 dark:bg-gray-800">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">
            Bienvenue sur <span class="text-blue-600">CoachTracker</span>
        </h1>
        <p class="text-gray-600 dark:text-gray-300 mb-6">
            Vous devez être administrateur pour accéder à cette application.
        </p>
        <a href="?controller=auth&action=form_login" class="px-6 py-3 text-white bg-blue-600 rounded-lg shadow hover:bg-blue-500 focus:ring focus:ring-blue-300 focus:outline-none">
            Accéder au formulaire
        </a>
    </div>
</div>
