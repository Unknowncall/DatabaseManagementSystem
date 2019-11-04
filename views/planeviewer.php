<div class="container">
    <form action="index.php?mode=airplanesearch" method="post">
    <table class="table table-striped">
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
        ?>

        <tr><td colspan="4"><button class="btn btn-success" style="float:right" type="submit">Search Again</button></td></tr>

    </table>
    </form>
</div>