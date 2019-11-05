<?php

include('pdo_connect.php');
include('model/model.php');
include('assets/pageheader.php');

    $rating = $_POST["rating"];

    $sql = "INSERT INTO `airport_reviews` (`airport_id`, `rating`, `review_id`) VALUES ('{$id}', '{$rating}', NULL)";
    executeSQL($sql, $db, null);
    echo $sql;
?>