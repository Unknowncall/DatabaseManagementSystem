<div class="container">
    <form action="index.php?mode=airlinesearch" method="post">
    <table class="table table-striped">
        <tr>
            <td>Name</td>
            <td>Alias</td>
            <td>IATA</td>
            <td>ICAO</td>
        </tr>
        <?php
            $stringAlias = ($alias = 'N' ? 'N/a' : $alias);

            echo "<tr>";
                    echo "<td> {$name} </td>";
                    echo "<td> {$stringAlias} </td>";
                    echo "<td> {$iata} </td>";
                    echo "<td> {$icao} </td>";
            echo "</tr>";
        ?>
    </table>

    <table class="table table-striped">
        <tr>
            <td>Callsign</td>
            <td>Country</td>
            <td>Active</td>
        </tr>
        <?php
            $stringActive = ($active = 1 ? 'True' : 'False');

            echo "<tr>";
                    echo "<td> {$callsign} </td>";
                    echo "<td> {$country} </td>";
                    echo "<td> {$stringActive} </td>";
            echo "</tr>";
        ?>

        <tr><td colspan="4"><button class="btn btn-success" style="float:right" type="submit">Search Again</button></td></tr>
    </table>
    </form>
</div>