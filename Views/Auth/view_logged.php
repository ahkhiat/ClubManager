<?php
    session_start();

    $_SESSION['email'] = $user->email;
    $_SESSION['lastname'] = $user->lastname;
    $_SESSION['firstname'] = $user->firstname;
    $_SESSION['birthdate'] = $user->birthdate;
    $_SESSION['role'] = $user->role;
    $_SESSION['id_user'] = $user->id_user;
?>

<script>window.location.href="?controller=admin&action=dashboard_admin"</script>