<div class="container">
    <table class="table table-hover table-striped">
        <tr>
            <th style="text-decoration:underline;">Routes Name</th>
            <td></td>
        </tr>
        <?php
            if(isset($dataList)){

                foreach ($dataList as $i) {

                    $airline = $i['name'];
                    $departoff = $i['source_airport'];
                    $arriveoff = $i['destination_airport'];
                    $id = $i['id'];

                    echo "<tr><form action='index.php?viewer=route&id={$id}' method='post'>";
                    echo "<td> {$airline} - {$departoff} -> {$arriveoff} </td>";
                    echo "<td><button class='btn btn-success' type='submit'>View</button></td></tr></form>";
                }

            $show = $show + 10;
            echo "<form action='index.php?mode=rtsearch&show={$show}&depart={$depart}&arriving={$arrive}' method='post'>";
            echo "<tr><td colspan='4'><button class='btn btn-success' type='submit' style='float:right'>Show More</button></td></tr>";
            echo "</form>";
            }
        ?>
        <form action="index.php?mode=routesearch" method="post">
            <tr><td colspan="4"><button class='btn btn-success' type='submit' style="float:right">Search</button></td></tr>
        </form>
    </table>

</div>