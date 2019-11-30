<div class="container">
    <h1 style="padding:15px; text-decoration:underline; text-align:center;">Airport Search</h1>
    <form action="index.php?mode=searchap" method="post">
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label>Airport Name</label>
                <input class="form-control" type="text" name="airport" placeholder="Ex. O'hare">
            </div>
            <div class="col-md-4 mb-3">
                <label>City</label>
                <input class="form-control"  type="text" name="city" placeholder="Ex. Chicago">
            </div>
            <div class="col-md-4 mb-3">
                <label>Country</label>
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
            </div>
        </div>
        <button class="btn btn-success" type="submit">Search</button>
    </form>
</div>