<div class="container">
    <h1 style="padding:15px; text-decoration:underline; text-align:center;">Airport Search</h1>
    <form action="index.php?mode=searchap" method="post">
        <table class="table table-borderless table-hover">
            <tr scope="row">
                <td style="float:right;">Airport Name:</td>
                <td><input class="form-control" type="text" name="airport" placeholder="Ex. O'hare"></td>
                <td style="float:right;">City:</td>
                <td><input class="form-control"  type="text" name="city" placeholder="Ex. Chicago"></td>
            </tr>

            <tr scope="row">
                <td style="float:right;">Country:</td>
                <td>
                    <select class="custom-select" name="country">
                        <option selected value="">All</option>
                        <?php
                            if(isset($dataList)){
                                foreach($dataList as $country){
                                     echo "<option value='{$country["country"]}'>{$country["country"]}</option>";
                                }
                            }
                        ?>
                    </select>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr><td colspan="4"><button class="btn btn-success" style="float:right;" type="submit">Search</button></td></tr>
        </table>
    </form>
</div>