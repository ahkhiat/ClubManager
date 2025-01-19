<?php
// var_dump($users);
include './Utils/sidebar.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <div class="table-responsive">

    <table id='table' class="table w-75 mx-auto">
        <h1>Tous les users</h1>

        <div class="flex justify-center mb-4">
            <a href="?controller=admin&action=user_add" 
                class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl 
                focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium 
                rounded-lg text-sm px-5 py-2.5 text-center">Ajouter un utilisateur
            </a>
        </div>

        <thead>
            <th>Id</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Date de naissance</th>
            <th>Tél</th>
            
        </thead>
        <?php  foreach($users as $u ): ?>
        <tr>
            <td><?= $u->id_user ?></td>
            <td><?=$u->firstname?></td>
            <td><?=$u->lastname?></td>
            <td><?=$u->email?></td>
            <td><?=$u->birthdate?></td>
            <td><?=$u->phone?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>  
    
</body>
</html>