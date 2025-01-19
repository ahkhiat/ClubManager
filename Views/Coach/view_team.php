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
    <h1>Mon équipe</h1>

    <div class="table-responsive">
    
    <table id='table' class="table w-75 mx-auto">
               
        <thead>
            <th>Id</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Date de naissance</th>
            <th>Tél</th>
            
        </thead>
        <?php  foreach($players as $u ): ?>
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