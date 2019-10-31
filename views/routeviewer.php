<div class="container">
    <table class="table table-striped">
        <tr>
            <td>Source Airport</td>
            <td>Destination Airport</td>
            <td>Airline</td>
        </tr>
        <?php
            $dataList = getOneRecord("SELECT `name` FROM `airlines` WHERE id = {$airline_id}", $db, null);
            $airline_name = $dataList['name'];

            $sourceData = getOneRecord("SELECT `name` FROM `airports` WHERE airport_id = {$source_airport_id}", $db, null);
            $source_airport_name = $sourceData['name'];
            $source_fixed = str_replace("_", "'", $sourceData['name']);

            $destData = getOneRecord("SELECT `name` FROM `airports` WHERE airport_id = {$destination_airport_id}", $db, null);
            $destination_airport_name = $destData['name'];
            $dest_fixed = str_replace("_", "'", $destData['name']);

            echo "<tr>";
                    echo "<td> {$source_fixed} <form action='index.php?viewer=airport&name={$source_airport_name}&fromroute=true' method='post'> <button class='btn btn-success' style='float:right' type='submit'>View</button> </form> </td>";
                    echo "<td> {$dest_fixed} <form action='index.php?viewer=airport&name={$destination_airport_name}&fromroute=true' method='post'> <button class='btn btn-success' style='float:right' type='submit'>View</button> </form> </td>";
                    echo "<td> {$airline_name} </td>";
            echo "</tr>";
        ?>
    </table>

    <table class="table table-striped">
        <tr>
            <td>Codeshare</td>
            <td>Stops</td>
            <td>Equipment</td>
        </tr>
        <?php
            echo "<tr>";
                    echo "<td> {$codeshare} </td>";
                    echo "<td> {$stops} </td>";
                    echo "<td> {$equipment} </td>";
            echo "</tr>";
        ?>
        <form action="index.php?mode=routesearch" method="post">
            <tr><td colspan="4"><button class="btn btn-success" style="float:right" type="submit">Search Again</button></td></tr>
        </form>

    </table>
    </form>
</div>