<?php
    session_start();

    require_once("DWESBaseDatos.php");

    // Cargar variables de entorno
    require '../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    // Inicializar conexión BD
    $db = DWESBaseDatos::obtenerInstancia();
    $db->inicializa(
        $_ENV['DB_HOST'],
        $_ENV['DB_USER'],
        $_ENV['DB_PASS']
    );

    $title = $_ENV['TITLE'];
?>