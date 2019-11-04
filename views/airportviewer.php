<div class="container">
    <table class="table table-striped">
        <caption>Information on Airport</caption>
        <tr>
            <th>Name</th>
            <th>City</th>
            <th>Country</th>
            <th>Timezone</th>
        </tr>
        <?php
            echo "<tr>";
                    echo "<td> {$name} </td>";
                    echo "<td> {$city} </td>";
                    echo "<td> {$country} </td>";
                    echo "<td> GMT{$timezone} </td>";
            echo "</tr>";
        ?>
        <tr>
            <th>IATA</th>
            <th>ICAO</th>
            <th>Lattitude</th>
            <th>Longitude</th>
        </tr>
        <?php
            echo "<tr>";
                    echo "<td> {$iata} </td>";
                    echo "<td> {$icao} </td>";
                    echo "<td> {$lattitude} </td>";
                    echo "<td> {$longitude} </td>";
            echo "</tr>";
        ?>
    
        <tr>
            <th>Altitude</th>
            <th colspan="4">Region</th>
        </tr>
        <?php
            echo "<tr>";
                    echo "<td> {$altitude} ft. </td>";
                    echo "<td colspan='4'> {$region} </td>";
            echo "</tr>";

            if (isset($_GET['fromroute'])) {
                echo "<form action='index.php?mode=routesearch' method='post'>";
            } else {
                echo "<form action='index.php?mode=airportsearch' method='post'>";
            }
            echo "<tr><td colspan='4'><button class='btn btn-success' style='float:right' type='submit'>Search Again</button></td></tr></form>";

        ?>
    </table>
    <div id="map"></div>
    <div class="directionsContainer">
        <div id="directionsPanel" ></div>
        <div id="directions"></div>
    </div>
    
    
</div>
<script type="text/javascript">
    function loadMap() {
        var latt = <?php echo $lattitude ?>;
        var long = <?php echo $longitude ?>;
        var name = "<?php echo $name ?>";
    
        var map = new Microsoft.Maps.Map(document.getElementById('map'), { center: new Microsoft.Maps.Location(latt, long), zoom: 12 });
    
        Microsoft.Maps.loadModule('Microsoft.Maps.Directions', function () {
            var directionsManager = new Microsoft.Maps.Directions.DirectionsManager(map);
            var waypoint = new Microsoft.Maps.Directions.Waypoint({ address: name, location: new Microsoft.Maps.Location(latt, long) });
            
            directionsManager.addWaypoint(waypoint);
            directionsManager.setRenderOptions({ itineraryContainer: '#directions' });
            directionsManager.showInputPanel('directionsPanel');
        }); 
    }
    
</script>
<script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?key=Ar8qUOXuYqk7Y-Xw7pcQYUNr8clN1Z7Q-KBZcnFsgQSi0-hzXAhnVMkg2LL64313&callback=loadMap' async defer></script>