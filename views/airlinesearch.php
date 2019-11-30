<div class="container">
    <h1 style="padding:15px; text-decoration:underline; text-align:center;">Airline Search</h1>
    <form action="index.php?mode=airsearch" method="post">
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label>Airline Name</label>
                <input class="form-control" type="text" name="airline" placeholder="Ex. United Airlines">
            </div> 
            <div class="col-md-4 mb-3">
                <label>Callsign</label>
                <input class="form-control" type="text" name="callsign" placeholder="Ex. United Airlines">
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