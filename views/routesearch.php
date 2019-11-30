<div class="container">
    <h1 style="padding:15px; text-decoration:underline; text-align:center;">Route Search</h1>
    <form action="index.php?mode=rtsearch" method="post">
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label>Departing Airport</label>
                <input class="form-control" type="text" name="depart" placeholder="Ex. ORD">
            </div>
            <div class="col-md-6 mb-3">
                <label>Arriving Airport</label>
                <input class="form-control" type="text" name="arriving" placeholder="Ex. MCO">
            </div>
        </div>
        <button class="btn btn-success" type="submit">Search</button>
    </form>
</div>