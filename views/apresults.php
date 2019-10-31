<div class="container">
    <table class="table table-hover table-striped">
        <tr>
            <th style="text-decoration:underline;">Airport Name</th>
            <td></td>
        </tr>
        <?php
            if(isset($dataList)){
                foreach($dataList as $ap){
                    $newName = $ap['name'];
                    $modifiedname = str_replace("_", '\'', $ap['name']);
                    echo "<form action='index.php?viewer=airport&name={$newName}' method='post'>";
                    echo "<tr>";
                    echo "<td> {$modifiedname} </td>";
                    echo "<td colspan='4'><button class='btn btn-success' type='submit' style:'float:right'>View</button></td></tr></form>";
                }
            }
            $show = $show + 10;
            echo "<form action='index.php?mode=searchap&show={$show}&airport={$name}&city={$city}&country={$country}' method='post'>";
            echo "<tr><td colspan='4'><button class='btn btn-success' type='submit' style='float:right'>Show More</button></td></tr>";
            echo "</form>";

            echo "<form action='index.php?mode=airportsearch' method='post'>";
            echo "<tr><td colspan='4'><button class='btn btn-success' type='submit' style='float:right'>Search</button></td></tr> </form>";
        ?>
    </table>

</div>