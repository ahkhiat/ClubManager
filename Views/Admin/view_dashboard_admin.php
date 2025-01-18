<?php
// var_dump($ca_jour);
?>
<div id="dashboard_container">
<!------------------------ Admin navbar --------------------->
<?php
include('./Utils/header_admin.php')
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Row 1 -->
    <div class="row mt-5">
        <h2>Aujourd'hui, le 
            <?php
                $date_du_jour = new DateTime();
                echo $date_du_jour->format('d m Y'); // Format: Jour_de_la_semaine Numéro_du_jour Mois Année
            ?>

        </h2>

      

    </div>

    <!-- Row 2 -->
    <div class="row">

       
   
    </div>


    <!-- Action Container -->
    <div class="row">
        
    <div class="table-responsive">
    
    <table id='table' class="table w-75 mx-auto">
    <h2>
        Ventes du jour
    </h2>

    <!-- <div class="badge-nom text-center text-success fw-bold mb-5"> <?php if(isset($_SESSION)){echo $_SESSION['prenom'].str_repeat('&nbsp;', 1).$_SESSION['nom'];}?></div> -->
                

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


        
    </div>




<!-- End Container fluid -->
</div>
</div>
    


    






