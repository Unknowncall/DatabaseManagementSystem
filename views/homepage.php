<div class="container">
    <table class="table table-striped">
        <tr>
            <td>Name</td>
            <td>City</td>
            <td>Country</td>
            <td>Timezone</td>
        </tr>
        <?php
            echo "<tr>";
                    echo "<td> {$name} </td>";
                    echo "<td> {$city} </td>";
                    echo "<td> {$country} </td>";
                    echo "<td> GMT{$timezone} </td>";
            echo "</tr>";
        ?>
    </table>
</div>