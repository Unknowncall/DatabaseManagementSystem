<div class="container">
    <table class="table table-striped">
        <caption>Information on Airplane</caption>
        <tr>
            <th>Name</th>
            <th>IATA</th>
            <th>ICAO</th>
            <th>Average Rating</th>
        </tr>
        <?php
            echo "<tr>";
                    if($iata == 'N'){ $iata = 'N/A'; }
                    if($icao == 'N'){ $icao= 'N/A'; }
                    echo "<td> {$name} </td>";
                    echo "<td> {$iata} </td>";
                    echo "<td> {$icao} </td>";
                    
                    $ratingSQL = "SELECT round(AVG(rating),2) FROM `plane_reviews` WHERE name = :name";
                    $avg = getOneRecord($ratingSQL, $db, array(':name' => $name));
        
                    if($avg['round(AVG(rating),2)'] == null){
                        echo "<td>No Reviews</td>";
                    }else{
                        foreach($avg as $rating) {echo "<td> {$rating} ⭐</td>";}
                    }
            echo "</tr>";

            echo "<tr>";
            echo "<form action='index.php?review=airplane&name={$name}' method='post'>";
            echo "<td colspan='1'><button class='btn btn-success' style='float:left' type='submit'>Leave Review</button></form>";

            echo "<form action='index.php?mode=airplanesearch' method='post'>";
            echo "<td colspan='4'><button class='btn btn-success' style='float:right' type='submit'>Search Again</button></td></tr></form>";
        ?>
    </table>
</div>