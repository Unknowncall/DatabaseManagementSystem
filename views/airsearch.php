<div class="container">
    <table class="table table-hover table-striped">
        <tr>
            <th style="text-decoration:underline;">Airline Name</th>
            <td></td>
        </tr>
        <?php
            if(isset($dataList)){
                foreach($dataList as $ap){
                    $newName = $ap['name'];
                    $modifiedname = str_replace("_", '\'', $ap['name']);
                    echo '<tr>';
                    echo "<td colspan='2'><a style='display:block;' href='index.php?viewer=airline&name={$newName}'> {$modifiedname} </a></td>";
                    echo "</tr>";
                    $count--;
                }
        ?>
        <form action="index.php?mode=airlinesearch" method="post">
            <tr><td><button class='btn btn-success' type='submit'>Search</button></td>
        </form>
        <?php
                if($num_of_rows > 10 && $count != 0){
                    $show = $show + 10;
                    echo "<form action='index.php?mode=airsearch&show={$show}&airline={$name}&callsign={$callsign}&country={$country}' method='post'>";
                    echo "<td><button class='btn btn-success' type='submit' style='float:right'>Show More</button></td></tr>";
                    echo "</form>";
                }else{
                    echo "<td></td></tr>";
                }
            }
        ?>

    </table>

</div>