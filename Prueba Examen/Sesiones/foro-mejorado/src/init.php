<?php
    session_start();

    // Cargar variables de entorno
    require '../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    // Inicializar conexión BD
    require_once("DWESBaseDatos.php");
    $db = DWESBaseDatos::obtenerInstancia();
    $db->inicializa(
        $_ENV['DB_HOST'],
        $_ENV['DB_USER'],
        $_ENV['DB_PASS']
    );

    // Comprobar token
    require_once("comprobar-token.php");

    // Cargar clase Mailer
    require_once("Mailer.php");

    // Título de las páginas
    $title = $_ENV['TITLE'];
?>