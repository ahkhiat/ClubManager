<?php
// var_dump($ca_jour);
?>
<div id="dashboard_container">
<!------------------------ Admin navbar --------------------->
<?php
// include('./Utils/navbar.php');
include './Utils/header.php';
include './Utils/sidebar.php';
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

    </div>

<!-- End Container fluid -->
</div>
</div>
    


    






