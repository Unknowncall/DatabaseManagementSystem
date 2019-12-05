<div class="container">
    <h1 style="padding:15px; text-decoration:underline; text-align:center;">Airline Search</h1>
    <form class="border-bottom" action="index.php?mode=airsearch" method="post">
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
        <div style="padding-bottom:30px;"><button class="btn btn-success" type="submit">Search</button></div>
    </form>
    
    <form style="padding-top:30px;" action="index.php?mode=alratesearch" method="post">
        <h5 style="text-decoration:underline; text-align:center;">Search for an Airline based on the average rating</h5>
        <div class="form-row">
            <div class="col-md-6 offset-md-3 mb-3">
                <label>Average Airline Rating</label>
                <select class="custom-select" name="rating" onchange="this.form.submit();">
                    <option selected disabled value="0">Select One</option>
                    <option value="5">5 ★</option>
                    <option value="4">4 ★</option>
                    <option value="3">3 ★</option>
                    <option value="2">2 ★</option>
                    <option value="1">1 ★</option>
                </select>
            </div>
        </div>
    </form>
</div>