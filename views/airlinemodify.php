<div style="padding-top: 10px;">
<div class="container">
    <h1 style="text-align:center; text-decoration:underline; padding-bottom:5px;">Add New Airline</h1>
    <form class="needs-validation" novalidate action="index.php?mode=addal" method="post">
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label>Airline Name<sup>*</sup></label>
                <input type="text" class="form-control" placeholder="Name" name="al" required>
            </div>
            <div class="col-md-4 mb-3">
                <label>Alias</label>
                <input type="text" class="form-control" placeholder="Alias" name="alias">
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
                <input type="text" class="form-control" placeholder="IATA" name="iata" maxlength="2">
            </div>
            <div class="col-md-1 mb-3">
                <label>ICAO</label>
                <input type="text" class="form-control" placeholder="ICAO" name="icao" maxlength="3">
            </div>
            <div class="col-md-3 mb-3">
                <label>Callsign</label>
                <input type="text" class="form-control" placeholder="Callsign" name="cs">
            </div>
            <div class="col-md-2 mb-3">
                <label>Active</label>
                <select class="custom-select" name="active">
                    <option value="0" selected>Unknown</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
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