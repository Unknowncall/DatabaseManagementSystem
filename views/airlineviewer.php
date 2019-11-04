<div class="container">
    <form action="index.php?mode=airlinesearch" method="post">
    <table class="table table-striped">
        <tr>
            <th>Name</th>
            <th>Alias</th>
            <th>IATA</th>
            <th>ICAO</th>
        </tr>
        <?php
            $stringAlias = ($alias = 'N' ? 'N/A' : $alias);

            echo "<tr>";
                    echo "<td> {$name} </td>";
                    echo "<td> {$stringAlias} </td>";
                    echo "<td> {$iata} </td>";
                    echo "<td> {$icao} </td>";
            echo "</tr>";
        ?>
        <tr>
            <th>Callsign</th>
            <th>Country</th>
            <th colspan="2">Active</th>
        </tr>
        <?php
            $stringActive = ($active = 1 ? 'True' : 'False');

            echo "<tr>";
                    echo "<td> {$callsign} </td>";
                    echo "<td> {$country} </td>";
                    echo "<td colspan='2'> {$stringActive} </td>";
            echo "</tr>";
        ?>

        <tr><td colspan="4"><button class="btn btn-success" style="float:right" type="submit">Search Again</button></td></tr>
    </table>
    </form>
</div>