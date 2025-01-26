
<?php
/*
// /admin/index.php

session_start();

// require_once('../config/db.php');
// require_once('../utils/auth.php');
require_once './header.php';

// Vérifie si une page spécifique est demandée via l'URL
$page = $_GET['page'] ?? null;

// Gestion des routes
if (isset($_SESSION['admin'])) {
    // Si l'utilisateur est connecté en tant qu'admin
    if ($page === 'register') {
        require_once './register.php';
    } else {
        require_once './dashboard.php';
    }
} else {
    // Si l'utilisateur n'est pas connecté
    if ($page === 'register') {
        require_once './register.php';
    } else {
        require_once './login.php';
    }
}


// Inclut le footer
require_once 'footer.php';

*/

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Inclure les fichiers globaux
// require_once '../config/db.php';        // Configuration de la base de données
require_once '../App/Model.php';
require_once '../App/Controller.php';

require_once '../Models/Auth.php';      // Fonctions d'authentification

require_once './header.php';


// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['admin'])) {
    // Si non connecté, forcer le contrôleur à "auth" et l'action à "login"
    $controller = 'auth';
    $action = 'login';
} else {
    // Récupérer les paramètres de l'URL
    $controller = $_GET['controller'] ?? 'dashboard'; // Contrôleur par défaut : 'dashboard'
    $action = $_GET['action'] ?? 'index';            // Action par défaut : 'index'
}

// Vérifier si le contrôleur existe dans le projet principal
$controllerFile = "../Controllers/Controller_{$controller}.php";

if (file_exists($controllerFile)) {
    // Inclure le contrôleur
    require_once $controllerFile;

    // Vérifier si la classe du contrôleur existe
    $controllerClass = ucfirst($controller);

    if (class_exists($controllerClass)) {
        $controllerInstance = new $controllerClass();

        $actionMethod = 'action_' . $action;  // Ajouter 'action_' avant le nom de l'action

        // Vérifier si l'action demandée existe dans le contrôleur
        if (method_exists($controllerInstance, $actionMethod)) {
            $controllerInstance->$actionMethod();
        } else {
            echo "Erreur : L'action `$actionMethod` n'existe pas.";
        }
    } else {
        echo "Erreur : Le contrôleur `$controllerClass` n'existe pas.";
    }
} else {
    echo "Erreur : Le fichier contrôleur `$controllerFile` est introuvable.";
}

require_once 'footer.php';




    

