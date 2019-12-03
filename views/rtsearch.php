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

                    echo "<tr>";
                    echo "<td colspan='2'><a style='display:block;' href='index.php?viewer=route&id={$id}'> {$airline} - {$departoff} -> {$arriveoff} </a></td>";
                    echo "</tr>";
                    $count--;
                }
        ?>
        <form action="index.php?mode=routesearch" method="post">
            <tr><td><button class='btn btn-success' type='submit'>Search</button></td>
        </form>
        
        <?php
                if($num_of_rows > 10 && $count != 0){
                    $show = $show + 10;
                    echo "<form action='index.php?mode=rtsearch&show={$show}&depart={$depart}&arriving={$arrive}' method='post'>";
                    echo "<td><button class='btn btn-success' type='submit' style='float:right'>Show More</button></td></tr>";
                    echo "</form>";
                }else{
                    echo "<td></td></tr>";
                }
            }
        ?>
    </table>
</div>