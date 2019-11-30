<div class="container">
    <table class="table table-striped">
        <caption>Information on Airline</caption>
        <tr>
            <th>Name</th>
            <th>Alias</th>
            <th>IATA</th>
            <th>ICAO</th>
        </tr>
        <?php
            if($alias == 'N'){ $alias = 'N/A'; }
            if($iata == 'N'){ $iata = 'N/A'; }
            if($icao == 'N'){ $icao = 'N/A'; }
            if($callsign == 'N'){ $callsign = 'N/A'; }
        
            echo "<tr>";
                    echo "<td> {$name} </td>";
                    echo "<td> {$alias} </td>";
                    echo "<td> {$iata} </td>";
                    echo "<td> {$icao} </td>";
            echo "</tr>";
        ?>
        <tr>
            <th>Callsign</th>
            <th>Country</th>
            <th>Active</th>
            <th>Average Rating</th>
        </tr>
        <?php
            if($active == 1){
                $stringActive = 'True';
            }else{
                $stringActive = 'False';
            }

            echo "<tr>";
                    echo "<td> {$callsign} </td>";
                    echo "<td> {$country} </td>";
                    echo "<td> {$stringActive} </td>";

                   $ratingSQL = "SELECT AVG(rating) FROM `airline_reviews` WHERE airline_id = {$id}";
                    $avg = getOneRecord($ratingSQL, $db, null);

                    foreach($avg as $rating) {echo "<td> {$rating} ⭐</td>";}

            echo "</tr>";

            echo "<tr>";
            echo "<form action='index.php?review=airline&id={$id}' method='post'>";
            echo "<td colspan='1'><button class='btn btn-success' style='float:left' type='submit'>Leave Review</button></form>";

            echo "<form action='index.php?mode=airlinesearch' method='post'>";
            echo "<td colspan='4'><button class='btn btn-success' style='float:right' type='submit'>Search Again</button></td></tr></form>";
        ?>
    </table>
</div>