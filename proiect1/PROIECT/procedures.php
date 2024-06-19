<?php
require 'connection.php';

function getUsers($pdo) {
    $stmt = $pdo->query("CALL GetUsers()");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function insertUsers($pdo, $strNume, $strEmail, $strParola) {
    try {
        $stmt = $pdo->prepare("CALL insertUsers(:strNume, :strParola, :strEmail)");
        $stmt->bindParam(':strNume', $strNume, PDO::PARAM_STR);
        $stmt->bindParam(':strParola', $strParola, PDO::PARAM_STR);
        $stmt->bindParam(':strEmail', $strEmail, PDO::PARAM_STR);
        $stmt->execute();
        echo "User registered successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function deleteImage($pdo, $imageId) {
    try {
        $stmt = $pdo->prepare("CALL deleteImages(:imageId)");
        $stmt->bindParam(':imageId', $imageId, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return false;
    }
}
?>