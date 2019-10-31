<div class="container">
    <table class="table table-hover table-striped">
        <tr>
            <th style="text-decoration:underline;">Plane Name</th>
            <td></td>
        </tr>
        <?php
            if(isset($dataList)){
                foreach($dataList as $ap){
                    $newName = $ap['name'];
                    $modifiedname = str_replace("_", '\'', $ap['name']);
                    echo "<form action='index.php?viewer=airplane&name={$newName}' method='post'>";
                    echo '<tr>';
                    echo "<td> {$modifiedname} </td>";
                    echo "<td><button class='btn btn-success' type='submit'>View</button></td></tr></form>";
                }
            }

            $show = $show + 10;
            echo "<form action='index.php?mode=planeresults&show={$show}&name={$name}' method='post'>";
            echo "<tr><td colspan='4'><button class='btn btn-success' type='submit' style='float:right'>Show More</button></td></tr>";
            echo "</form>";
        ?>

        <form action="index.php?mode=airplanesearch" method="post">
            <tr><td colspan="4"><button class='btn btn-success' type='submit' style="float:right">Search</button></td></tr>
        </form>
    </table>

</div>