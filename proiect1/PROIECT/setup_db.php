<?php
require 'connection.php';

function createProcedures($pdo) {
    // Procedura insertUsers
    $createInsertUsers = "
        DROP PROCEDURE IF EXISTS insertUsers;
        CREATE PROCEDURE insertUsers(
            IN strNume VARCHAR(100),
            IN strParola VARCHAR(100),
            IN strEmail VARCHAR(200)
        )
        BEGIN
            INSERT INTO users (nume, parola, email)
            VALUES (strNume, strParola, strEmail);
        END;
    ";

    // Procedura getUsers
    $createGetUsers = "
        DROP PROCEDURE IF EXISTS getUsers;
        CREATE PROCEDURE getUsers()
        BEGIN
            SELECT * FROM users;
        END;
    ";

    // Procedura deleteImages
    $createDeleteImages = "
        DROP PROCEDURE IF EXISTS deleteImages;
        CREATE PROCEDURE deleteImages(IN imageId INT)
        BEGIN
            DELETE FROM images WHERE id = imageId;
        END;
    ";

    try {
        $pdo->exec($createInsertUsers);
        $pdo->exec($createGetUsers);
        $pdo->exec($createDeleteImages);
        echo "Procedures created successfully.<br>";
    } catch (PDOException $e) {
        echo "Error creating procedures: " . $e->getMessage() . "<br>";
    }
}

//TRIGGERI
function createTriggers($pdo) {
    // Trigger before insert
    // Verifică dacă email-ul există deja înainte de a insera un nou user
    $createBeforeInsertTrigger = "
        DROP TRIGGER IF EXISTS before_insert_user;
        CREATE TRIGGER before_insert_user
        BEFORE INSERT ON users
        FOR EACH ROW
        BEGIN
            DECLARE email_count INT;
            SET email_count = (SELECT COUNT(*) FROM users WHERE email = NEW.email);
            IF email_count > 0 THEN
                SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Email already exists!';
            END IF;
        END;
    ";

    // Trigger after insert
    // Înregistrează într-un tabel de loguri faptul că un nou user a fost adăugat
    $createAfterInsertTrigger = "
        DROP TRIGGER IF EXISTS after_insert_user;
        CREATE TRIGGER after_insert_user
        AFTER INSERT ON users
        FOR EACH ROW
        BEGIN
            INSERT INTO user_logs(user_id, action, action_time)
            VALUES (NEW.id, 'INSERT', NOW());
        END;
    ";

    // Trigger after delete
    $createAfterDeleteTrigger = "
        DROP TRIGGER IF EXISTS after_delete_image;
        CREATE TRIGGER after_delete_image
        AFTER DELETE ON images
        FOR EACH ROW
        BEGIN
            INSERT INTO deleted_images(id, title, image, deleted_at)
            VALUES (OLD.id, OLD.title, OLD.image, NOW());
        END;
    ";

    try {
        // Crearea tabelei deleted_images
        $createTableSQL = "
            CREATE TABLE IF NOT EXISTS deleted_images (
                id INT,
                title VARCHAR(255),
                image VARCHAR(255),
                deleted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );
        ";
        $pdo->exec($createTableSQL);
        echo "Tabela și triggerul au fost create cu succes.";

         // Crearea tabelei user_logs
         $createUserLogsTableSQL = "
         CREATE TABLE IF NOT EXISTS user_logs (
             log_id INT AUTO_INCREMENT PRIMARY KEY,
             user_id INT,
             action VARCHAR(255),
             action_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
         );
     ";
     $pdo->exec($createUserLogsTableSQL);
     echo "Tabela user_logs a fost creată cu succes.<br>";
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
    
    

    try {
        $pdo->exec($createBeforeInsertTrigger);
        $pdo->exec($createAfterInsertTrigger);
        $pdo->exec($createAfterDeleteTrigger);
        echo "Triggers created successfully.<br>";
    } catch (PDOException $e) {
        echo "Error creating triggers: " . $e->getMessage() . "<br>";
    }
}


createProcedures($pdo);
createTriggers($pdo);

?>