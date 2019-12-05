<?php
    $user = 'harveyzt01';
    $pass = 'zh3844';
    $db_info='mysql:host=washington.uww.edu;dbname=cs366-2197_harveyzt01';
    $connection = mysqli_connect("washington.uww.edu", "harveyzt01", "zh3844", "cs366-2197_harveyzt01", "3306");
    try {
        $db = new PDO($db_info, $user, $pass);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
?>