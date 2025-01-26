<?php
session_start();
var_dump($_SESSION);
?>
<div id="dashboard_container">
<!------------------------ Admin navbar --------------------->
<?php
// include('./Utils/navbar.php');
include './Utils/header.php';
include './Utils/navbar.php';
?>


<h1 class="text-center text-2xl mt-10">Dashboard</h1>





<?php
include './Utils/footer.php'
?>


    






