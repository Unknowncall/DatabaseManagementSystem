<div class="container">
   <center>
      <h2>You are about to leave a review about the airport:</h2>
      <?php

            $id = '';
            if(isset($_GET['id'])){$id = $_GET["id"];}
            $sql = "SELECT name FROM `airports` WHERE `airport_id` = {$id}";

            $data = getOneRecord($sql, $db, null);
            $name = $data['name'];
            $modify = str_replace('_', "'", $name);

            echo "<h3>{$modify}</h3>";

        ?>
   </center>
   <style>
      .rating {
      display: inline-block;
      position: relative;
      height: 50px;
      line-height: 50px;
      font-size: 50px;
      }
      .rating label {
      position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      cursor: pointer;
      }
      .rating label:last-child {
      position: static;
      }
      .rating label:nth-child(1) {
      z-index: 5;
      }
      .rating label:nth-child(2) {
      z-index: 4;
      }
      .rating label:nth-child(3) {
      z-index: 3;
      }
      .rating label:nth-child(4) {
      z-index: 2;
      }
      .rating label:nth-child(5) {
      z-index: 1;
      }
      .rating label input {
      position: absolute;
      top: 0;
      left: 0;
      opacity: 0;
      }
      .rating label .icon {
      float: left;
      color: transparent;
      padding: 20px;
      }
      .rating label:last-child .icon {
      color: #000;
      }
      .rating:not(:hover) label input:checked ~ .icon,
      .rating:hover label:hover input ~ .icon {
      color: red;
      }
      .rating label input:focus:not(:checked) ~ .icon:last-child {
      color: #000;
      text-shadow: 0 0 5px #09f;
      }
   </style>
   <center>
    <?php
        $sql = "SELECT name FROM `airports` WHERE `airport_id` = {$id}";

        $data = getOneRecord($sql, $db, null);
        $name = $data['name'];

        echo "<form action='index.php?viewer=airport&name={$name}' method='post'>";
    ?>

         <label>
            <input type="radio" name="rating" value="1" />
            <span class="icon">★</span>
        </label>
         <label>
            <input type="radio" name="rating" value="2" />
            <span class="icon">★</span>
            <span class="icon">★</span>
         </label>
         <label>
            <input type="radio" name="rating" value="3" />
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>   
         </label>
         <label>
            <input type="radio" name="rating" value="4" />
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
         </label>
         <label>
            <input type="radio" name="rating" value="5" />
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
         </label>

    <input class="btn btn-success" type="submit" name="submit" value="Get Selected Values" />
</form>
<?php
    if (isset($_POST['submit'])) {
        if(isset($_POST['rating'])){
            $rating = '';
            if(isset($_POST['rating'])){$rating = $_POST["rating"];}
            $id = '';
            if(isset($_GET['id'])){$id = $_GET["id"];}
            $id = '';
            if(isset($_GET['id'])){$id = $_GET["id"];}
            $sql = "SELECT name FROM `airports` WHERE `airport_id` = {$id}";

            $data = getOneRecord($sql, $db, null);
            $name = $data['name'];

            $sql = "INSERT INTO `airport_reviews` (`airport_id`, `rating`, `review_id`) VALUES ('{$id}', '{$rating}', NULL)";
            executeSQL($sql, $db, null);
        }
    }
?>
   </center>
</div>