<?php
    session_start();
    
    include('pdo_connect.php');
    include('model/model.php');
    include('assets/pageheader.php');
    
    $viewer = '';
    if (isset($_GET['viewer'])) {
        $viewer = $_GET['viewer'];
    }

    switch($viewer) {
        case 'airplane':

            $plane = '';
            if(isset($_GET['name'])){
                $plane = $_GET['name'];
            }

            $sql = "SELECT * FROM `planes` WHERE name = '{$plane}'";

            $dataList = getOneRecord($sql, $db, null);

            $name = $dataList['name'];
            $iata = $dataList['iata'];
            $icao = $dataList['icao'];

            include("views/planeviewer.php");

            break;
        case 'airport':

            $airport = '';
            if(isset($_GET['name'])){
                $airport = $_GET['name'];
            }


            $sql = "SELECT * FROM `airports` WHERE name = '{$airport}'";
            $dataList = getOneRecord($sql, $db, null);

            $name = $dataList['name'];
            $name = str_replace("_", "'", $name);
            $city = $dataList['city'];
            $country = $dataList['country'];
            $iata = $dataList['iata'];
            $icao = $dataList['icao'];
            $lattitude = $dataList['lattitude'];
            $longitude = $dataList['longitude'];
            $altitude = $dataList['altitude'];
            $timezone = $dataList['timezone'];
            $region = $dataList['region'];

            include("views/airportviewer.php");

            break;
        case 'route':

            $routeId = '';
            if(isset($_GET['id'])){
                $routeId = $_GET['id'];
            }

            $sql = "SELECT * FROM `routes` WHERE `id` = {$routeId}";
            $dataList = getOneRecord($sql, $db, null);

            $airline_id = $dataList['airline_id'];
            $source_airport_id= $dataList['source_airport_id'];
            $destination_airport_id= $dataList['destination_airport_id'];
            $codeshare= $dataList['codeshare'];
            $stops= $dataList['stops'];
            $equipment= $dataList['equipment'];

            include("views/routeviewer.php");

            break;
        case 'airline':

            $airline = '';
            if(isset($_GET['name'])){
                $airline = $_GET['name'];
            }

            $sql = "SELECT * FROM `airlines` WHERE name = '{$airline}'";

            $dataList = getOneRecord($sql, $db, null);

            $name = $dataList['name'];
            $alias = $dataList['alias'];
            $iata = $dataList['iata'];
            $icao = $dataList['icao'];
            $callsign = $dataList['callsign'];
            $country = $dataList['country'];
            $active = $dataList['active'];

            include("views/airlineviewer.php");

            break;
        default:
            break;
    }

    if ($viewer == '') {
    $mode = '';
    if(isset($_GET['mode'])){
        $mode = $_GET['mode'];
    }

    switch($mode) {
        case 'airportsearch': # Show the search function for airports.
            $sql = 'SELECT DISTINCT country FROM airports ORDER BY country';
            $dataList = getAllRecords($sql, $db, null);
            include('views/airportsearch.php');
            break;
            
        case 'searchap': # Execute the search function for airports.
            $name = '';
            $city = '';
            $country = '';
            $show = '';
            
            if(isset($_POST['airport'])){$name = $_POST['airport'];}
            if(isset($_GET['airport'])) {$name = $_GET['airport'];}

            if(isset($_POST['city'])){$city = $_POST['city'];}
            if(isset($_GET['city'])) {$city = $_GET['city'];}

            if(isset($_POST['country'])){$country = $_POST['country'];}
            if(isset($_GET['country'])) {$country = $_GET['country'];}

            if(isset($_GET['show'])){$show = $_GET['show'];} else { $show = 10;}

            $modifiedname = str_replace('\'','_',$name);
            $sql = "SELECT name FROM `airports` WHERE name LIKE '%{$modifiedname}%' AND city LIKE '%{$city}%' AND country LIKE '%{$country}%' LIMIT {$show}"; 
            $dataList = getAllRecords($sql, $db, null);

            include('views/apresults.php');
            
            break;
        case 'airlinesearch': # Show the search function for airlines.
        	include('views/airlinesearch.php');
        	break;
        case 'airsearch': # Execute the search function for airlines.

        	$name = '';
            $callsign = '';
            $country = '';
            $show = '';

        	if (isset($_POST['airline'])) {$name = $_POST['airline'];}
            if (isset($_GET['airline'])) {$name = $_GET['airline'];}
            if (isset($_POST['callsign'])) {$callsign = $_POST['callsign'];}
            if (isset($_GET['callsign'])) {$callsign = $_GET['callsign'];}
            if (isset($_POST['country'])) {$country = $_POST['country'];}
            if (isset($_GET['country'])) {$country = $_GET['country'];}
            if(isset($_GET['show'])){$show = $_GET['show'];} else { $show = 10;}
            
            $modifiedname = str_replace('\'','_',$name);
            $sql = "SELECT name FROM `airlines` WHERE name LIKE '%{$modifiedname}%' AND callsign LIKE '%{$callsign}%' AND country LIKE '%{$country}%' LIMIT {$show}";

            $dataList = getAllRecords($sql, $db, null);

            include('views/airsearch.php');
            
            break;
        case 'airplanesearch':
            include('views/airplanesearch.php');
            break;
        case 'planeresults':

            $name = '';
            $show = '';

            if (isset($_POST['planename'])) {$name = $_POST['planename'];}
            if(isset($_GET['name'])){$name = $_GET['name'];}

            if(isset($_GET['show'])){$show = $_GET['show'];} else { $show = 10;}

            $sql = "SELECT name FROM `planes` WHERE name LIKE '%{$name}%' LIMIT {$show}";

            $dataList = getAllRecords($sql, $db, null);

            include('views/planeresults.php');

            break;
        case 'login':
            if(isset($_POST['username']) && isset($_POST['password'])){
                $data = checkValidUser($db);
                
                if (isset($data) && isset($data['email'])){
                    $_SESSION['user'] = $data['last_name'].', '.$data['first_name'];
                    $_SESSION['email'] = $data['email'];
                    ?>
                <script type="text/javascript">
                        window.location.href = 'index.php';
                </script>
                <?php
                }else{
                ?>
                    <script type="text/javascript">
                            window.location.href = 'index.php';
                    </script>
                <?php
                }
            }else{
                ?>
                <script type="text/javascript">
                        window.location.href = 'index.php';
                </script>
                <?php
            }

            break;
            
        case 'logout' :
                session_destroy();
                setcookie(session_name(), '', time()-1000, '/');
                $_SESSION = array();
                ?>
                <script type="text/javascript">
                    window.location.href = 'index.php';
                </script>
                <?php
                break;
            
        case 'profilepage':

            break;
        case 'routesearch':
            include('views/routesearch.php');
            break;
        case 'rtsearch':

            $depart = '';
            $arrive = '';
            $show = '';

            if (isset($_POST['depart'])) {$depart = $_POST['depart'];}
            if (isset($_GET['depart'])) {$depart = $_GET['depart'];}

            if (isset($_POST['arriving'])) {$arrive = $_POST['arriving'];}
            if (isset($_GET['arriving'])) {$arrive = $_GET['arriving'];}

            if(isset($_GET['show'])){$show = $_GET['show'];} else { $show = 10;}

            $sql = "SELECT a.name, r.source_airport, r.destination_airport, r.id FROM routes r, airlines a WHERE r.source_airport LIKE '{$depart}' AND r.destination_airport LIKE '{$arrive}' AND r.airline_id = a.id LIMIT {$show}";

            $dataList = getAllRecords($sql, $db, null);
 
            include('views/rtsearch.php');
            break;
        default:
            include("views/homepage.php");
            break;
    }
}
    
    include('assets/pagefooter.php');
?>