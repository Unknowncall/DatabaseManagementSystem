<div class="container">
    <h1 style="padding:15px; text-decoration:underline; text-align:center;">Plane Search</h1>
    <form class="border-bottom" action="index.php?mode=planeresults" method="post">
        <div class="form-row">
            <div class= "col-md-6 offset-md-3 mb-3">
                <label>Airplane Name</label>
                <input class="form-control" type="text" name="planename" placeholder="Ex. Boeing">
            </div>
        </div>
        <div style="padding-bottom:30px;"><button class="btn btn-success offset-md-3" type="submit">Search</button></div>
    </form>
   
    <form style="padding-top:30px;" action="index.php?mode=planeratesearch" method="post">
        <h5 style="text-decoration:underline; text-align:center;">Search for an Airplane based on the average rating</h5>
        <div class="form-row">
            <div class="col-md-6 offset-md-3 mb-3">
                <label>Average Airplane Rating</label>
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