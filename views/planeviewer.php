<div class="container">
    <table class="table table-striped">
        <caption>Information on Airplane</caption>
        <tr>
            <th>Name</th>
            <th>IATA</th>
            <th>ICAO</th>
        </tr>
        <?php
            echo "<tr>";
                    echo "<td> {$name} </td>";
                    echo "<td> {$iata} </td>";
                    echo "<td> {$icao} </td>";
            echo "</tr>";

            echo "<tr>";
            echo "<form action='index.php?review=airplane' method='post'>";
            echo "<td colspan='1'><button class='btn btn-success' style='float:left' type='submit'>Leave Review</button></form>";

            echo "<form action='index.php?mode=airplanesearch' method='post'>";
            echo "<td colspan='4'><button class='btn btn-success' style='float:right' type='submit'>Search Again</button></td></tr></form>";
        ?>
    </table>
</div>