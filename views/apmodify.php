<div style="padding-top: 10px;">
<div class="container">
    <h1 style="text-align:center; text-decoration:underline; padding-bottom:5px;">Add New Airport</h1>
    <form class="needs-validation" novalidate action="index.php?mode=addap" method="post">
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label>Airport Name<sup>*</sup></label>
                <input type="text" class="form-control" placeholder="Name" name="ap" required>
            </div>
            <div class="col-md-4 mb-3">
                <label>City<sup>*</sup></label>
                <input type="text" class="form-control" placeholder="City" name="city" required>
            </div>
            <div class="col-md-4 mb-3">
                <label>Country<sup>*</sup></label>
                <select class="custom-select" name="country" required>
                    <option selected disabled value="">Select One</option>
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
        <div class="form-row">
            <div class="col-md-1 mb-3">
                <label>IATA</label>
                <input type="text" class="form-control" placeholder="IATA" name="iata" maxlength="3">
            </div>
            <div class="col-md-1 mb-3">
                <label>ICAO</label>
                <input type="text" class="form-control" placeholder="ICAO" name="icao" maxlength="4">
            </div>
            <div class="col-md-3 mb-3">
                <label>Latitude<sup>*</sup></label>
                <input type="text" class="form-control" placeholder="Latitude" name="lat" required>
            </div>
            <div class="col-md-3 mb-3">
                <label>Longitude<sup>*</sup></label>
                <input type="text" class="form-control" placeholder="Longitude" name="long" required>
            </div>
            <div class="col-md-3 mb-3">
                <label>Altitude (ft)</label>
                <input type="number" class="form-control" placeholder="Altitude" name="alt">
            </div>
            </div>
        <div class="form-row">
            <div class="col-md-1 mb-3">
                <label>UTC</label>
                <input type="number" class="form-control" placeholder="UTC" name="utc">
            </div>
            <div class="col-md-2 mb-3">
                <label>DST</label>
                <select class="custom-select" name="dst">
                    <option value="U">Unknown</option>
                    <option value="E">European</option>
                    <option value="A">US/Canada</option>
                    <option value="S">S. America</option>
                    <option value="O">Australia</option>
                    <option value="Z">New Zealand</option>
                    <option value="N">None</option>
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <label>Region</label>
                <select class="custom-select" name="region">
                    <option value="N">Unknown</option>
                    <?php
                    if(isset($dataList2)){
                        foreach($dataList2 as $region){
                            $newregion = str_replace("_", ' ', $region['region']);
                            echo "<option value='{$region['region']}'>{$newregion}</option>";    
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <p>* means a required field</p>
        <button class="btn btn-success" type="submit">Submit</button>
        <button class="btn btn-secondary" type="reset">Clear</button>
    </form>
</div>
</div>
<script type="text/javascript">
(function() {
    'use strict';
    window.addEventListener('load', function(){
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form){
            form.addEventListener('submit', function(event){
                if(form.checkValidity() === false){
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
</script>