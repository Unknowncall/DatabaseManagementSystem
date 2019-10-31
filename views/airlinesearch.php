<div class="container">
    <h2 style="padding:15px; text-decoration:underline; text-align:center;">Airline Search</h2>
    <form action="index.php?mode=airsearch" method="post">
        <table class="table table-borderless table-hover">
            <tr scope="row">
                <td style="float:right;">Airline Name:</td>
                <td><input class="form-control" type="text" name="airline" placeholder="Ex. United Airlines"></td>
                <td style="float:right;">Callsign:</td>
                <td><input class="form-control"  type="text" name="callsign" placeholder="Ex. UNITED"></td>
                <td style="float:right;">Country:</td>
                <td><input class="form-control"  type="text" name="country" placeholder="Ex. United States"></td>
            </tr>
            <tr><td colspan="6"><button class="btn btn-success" style="float:right;" type="submit">Search</button></td></tr>
        </table>
    </form>
</div>