<?php

    $user = 'root';
    $pass = '7GwgmZwwW9oC';
    $db_info='mysql:host=localhost;dbname=cs366-2197_harveyzt01';

    $connection = mysqli_connect("localhost", "root", "7GwgmZwwW9oC", "cs366-2197_harveyzt01", "3306");

    try {
        $db = new PDO($db_info, $user, $pass);

    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
?>
