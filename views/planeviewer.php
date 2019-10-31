<div class="container">
    <form action="index.php?mode=airplanesearch" method="post">
    <table class="table table-striped">
        <tr>
            <td>Name</td>
            <td>IATA</td>
            <td>ICAO</td>
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