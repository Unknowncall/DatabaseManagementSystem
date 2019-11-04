<div class="container">
    <table class="table table-striped">
        <tr>
            <td>Name - Name</td>
            <td>City</td>
            <td>Country</td>
            <td>Timezone</td>
        </tr>
        <?php
            echo "<tr>";
                    echo "<td> {$name} </td>";
                    echo "<td> {$city} </td>";
                    echo "<td> {$country} </td>";
                    echo "<td> GMT{$timezone} </td>";
            echo "</tr>";
        ?>
    </table>

    <table class="table table-striped">
        <tr>
            <td>IATA</td>
            <td>ICAO</td>
            <td>Lattitude</td>
            <td>Longitude</td>
        </tr>
        <?php
            echo "<tr>";
                    echo "<td> {$iata} </td>";
                    echo "<td> {$icao} </td>";
                    echo "<td> {$lattitude} </td>";
                    echo "<td> {$longitude} </td>";
            echo "</tr>";
        ?>
    </table>

    <table class="table table-striped">
        <tr>
            <td>Altitude</td>
            <td>Region</td>
        </tr>
        <?php
            echo "<tr>";
                    echo "<td> {$altitude} ft. </td>";
                    echo "<td> {$region} </td>";
            echo "</tr>";

            if (isset($_GET['fromroute'])) {
                echo "<form action='index.php?mode=routesearch' method='post'>";
            } else {
                echo "<form action='index.php?mode=airportsearch' method='post'>";
            }
            echo "<tr><td colspan='4'><button class='btn btn-success' style='float:right' type='submit'>Search Again</button></td></tr></form>";

        ?>

    </table>

</div>
