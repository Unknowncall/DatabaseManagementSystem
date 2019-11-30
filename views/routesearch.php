<div class="container">
    <h1 style="padding:15px; text-decoration:underline; text-align:center;">Route Search</h1>
    <form action="index.php?mode=rtsearch" method="post">
        <table class="table table-borderless table-hover">
            <tr scope="row">
                <td style="float:right;">Departing Airport:</td>
                <td><input class="form-control" type="text" name="depart" placeholder="Ex. ORD"></td>
            </tr>
            <tr scope="row">
                <td style="float:right;">Arriving Airport:</td>
                <td><input class="form-control" type="text" name="arriving" placeholder="Ex. MCO"></td>
            </tr>
            <tr><td colspan="4"><button class="btn btn-success" style="float:right;" type="submit">Search</button></td></tr>
        </table>
    </form>
</div>