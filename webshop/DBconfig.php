<?php
DEFINE("USER","root");
DEFINE("PASSWORD", "Osmanosman1.");

try {
    $verbinding = new
    PDO("mysql:host=localhost;dbname=webshop", USER,PASSWORD);
    $verbinding->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo $e->getMessage();
    echo "Kon geen verbinding maken.";
}
