<?php
include "connection.php";
require "procedures.php";
session_start();

if ($_SESSION["email"] == "anca_maria@yahoo.com") {
    $imageId = $_GET['id'];

    $sql1 = "SELECT * FROM images WHERE id=:imageId";
    $stmt1 = $pdo->prepare($sql1);
    $stmt1->bindParam(':imageId', $imageId, PDO::PARAM_INT);
    $stmt1->execute();
    $row = $stmt1->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        if (unlink($row["image"])) { // Șterge imaginea din sistemul de fișiere
            if (deleteImage($pdo, $imageId)) { // Șterge img din baza de date folosind procedura stocată
                echo "Imaginea a fost ștearsă cu succes!";
            } else {
                echo "Eroare la ștergerea imaginii din baza de date!";
            }
        } else {
            echo "Eroare la ștergerea imaginii din sistemul de fișiere!";
        }
    } else {
        echo "Imaginea nu a fost găsită!";
    }

    // header('Location: login_succes.php#work'); // Activează după testare
} else {
    header("Location: logout.php");
}




/*
if($_SESSION["email"]=="anca_maria@yahoo.com"){
$sql1="SELECT * FROM images WHERE id='{$_GET['id']}'";
$query=mysqli_query($con,$sql1) or die(mysqli_error($con));
$row=mysqli_fetch_array($query);
unlink($row["image"]);
$sql2="DELETE FROM images WHERE id='{$_GET['id']}'";
$query=mysqli_query($con,$sql2) or die(mysqli_error($con));
header('location:login_succes.php#work');
}else{ header("Location:logout.php"); }
*/
?>
