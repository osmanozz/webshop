<?php
DEFINE("USER","root");
DEFINE("PASSWORD", "Osmanosman1.");

try {
    $verbinding = new
    PDO("mysql:host=localhost;dbname=webshop2", USER,PASSWORD);
    $verbinding->settAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo $e->getMessage();
    echo "Kon geen verbinding maken.";
}
