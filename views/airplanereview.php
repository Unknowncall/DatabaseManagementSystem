<div class="container">
   <center>
      <h2>You are about to leave a review about the airplane:</h2>
      <?php

            $n = '';
            if(isset($_GET['name'])){$n = $_GET['name'];}
            $sql = "SELECT name FROM `planes` WHERE name = :name";

            $data = getOneRecord($sql, $db, array(':name' => $n));
            $name = $data['name'];
            $modify = str_replace('_', "'", $name);

            echo "<h3 style='text-decoration: underline;'>{$modify}</h3>";

        ?>
   </center>
   <center>
   <?php
      echo "<form action='index.php?review=insert_airplane&name={$n}' method='post'>";
   ?>
    
    <div class="stars">
        <input id="star-5" type="radio" name="rating" value="5" onchange="this.form.submit();"/>
        <label for="star-5"></label>
        <input id="star-4" type="radio" name="rating" value="4" onchange="this.form.submit();"/>
        <label for="star-4"></label>
        <input id="star-3" type="radio" name="rating" value="3" onchange="this.form.submit();"/>
        <label for="star-3"></label>
        <input id="star-2" type="radio" name="rating" value="2" onchange="this.form.submit();"/>
        <label for="star-2"></label>
        <input id="star-1" type="radio" name="rating" value="1" onchange="this.form.submit();"/>
        <label for="star-1"></label>
    </div>
    </form>
   </center>
</div>