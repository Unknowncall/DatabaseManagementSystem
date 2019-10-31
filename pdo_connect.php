<?php

    $user = 'harveyzt01';
    $pass = 'zh3844'; // first initial last initial last 4-digits of ID
    $db_info='mysql:host=washington.uww.edu;dbname=cs366-2197_harveyzt01';
    try {
        $db = new PDO($db_info, $user, $pass);

    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
?>