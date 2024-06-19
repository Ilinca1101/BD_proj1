<?php
$con=mysqli_connect('localhost','root','','proiect') or die("Failed to connect: ".mysqli_error($con));

// Conexiunea PDO
try {
    $pdo = new PDO('mysql:host=localhost;dbname=proiect', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
