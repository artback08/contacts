<?php
    try {
    $pdo = new PDO('mysql:dbname=contacts; host=localhost', 'root', '');
    } catch (PDOException $e) {
        die($e->getMessage());
    }