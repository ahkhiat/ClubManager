<?php
// var_dump($users);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tous les users</h1>

    <table id='table' class="table w-75 mx-auto">
    <h2 class="text-center">Liste des clients</h2>

    <div class="align-self-end">
        <a href="?controller=client&action=client_add"><button class="mt-3 btn btn-secondary">Ajouter un client</button></a>
    </div>

        <thead>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Adresse</th>
            <th>Code Postal</th>
            <th>Ville</th>
            <th>Email</th>
            <th>Téléphone</th>
        </thead>
        <?php  foreach($users as $u ): ?>
        <tr>
            <td><?= $u->firstname ?></td>
            <td><?=$u->lastname?></td>
            <td><?=$u->adress?></td>
            <td><?=$u->postal_code?></td>
            <td><?=$u->town?></td>
            <td><?=$u->email?></td>
            <td><?=$u->phone?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    
</body>
</html>