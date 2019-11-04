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
                    echo '<tr>';
                    echo "<td colspan='2'><a style='display:block;' href='index.php?viewer=airplane&name={$newName}'>{$modifiedname}</td>";
                    echo "</a></tr>";
                    $count--;
                }
        ?>
        <form action="index.php?mode=airplanesearch" method="post">
            <tr><td><button class='btn btn-success' type='submit'>Search</button></td>
        </form>
        <?php
                if($num_of_rows > 10 && $count != 0){
                    $show = $show + 10;
                    echo "<form action='index.php?mode=planeresults&show={$show}&name={$name}' method='post'>";
                    echo "<td><button class='btn btn-success' type='submit' style='float:right;'>Show More</button></td></tr>";
                    echo "</form>";
                }else{
                    echo "<td></td></tr>";
                }
            }
        ?>
    </table>

</div>