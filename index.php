<?php
session_start();

include('pdo_connect.php');
include('model/model.php');
include('assets/pageheader.php');

$review = '';
if (isset($_GET['review'])) {
    $review = $_GET['review'];
}

switch ($review) {
    case 'airport':
        include('views/airportreview.php');
        break;
    case 'insert_airport':
        $rating = $_POST["rating"];
        $airportid = '';
        if (isset($_GET['id'])) {$airportid = $_GET['id'];}
        $sql = "INSERT INTO `airport_reviews` (`airport_id`, `rating`, `review_id`) VALUES ('{$airportid}', '{$rating}', NULL)";
        executeSQL($sql, $db, null);
            
            
            $sql = "SELECT * FROM `airports` WHERE airport_id = {$airportid}";
            $dataList   = getOneRecord($sql, $db, null);
            
            $id = $dataList['airport_id'];
            $name      = $dataList['name'];
            $name      = str_replace("_", "'", $name);
            $city      = $dataList['city'];
            $country   = $dataList['country'];
            $iata      = $dataList['iata'];
            $icao      = $dataList['icao'];
            $lattitude = $dataList['lattitude'];
            $longitude = $dataList['longitude'];
            $altitude  = $dataList['altitude'];
            $timezone  = $dataList['timezone'];
            $region    = $dataList['region'];
            
            include("views/airportviewer.php");
    case 'airline':
        include('views/airlinereview.php');
        break;
    case 'insert_airline':
        $rating = $_POST["rating"];
        $airlineid = '';
        if (isset($_GET['id'])) {$airlineid = $_GET['id'];}
        $sql = "INSERT INTO `airline_reviews` (`airline_id`, `rating`, `review_id`) VALUES ('{$airlineid}', '{$rating}', NULL)";
        executeSQL($sql, $db, null);
            
            
            $sql        = "SELECT * FROM `airlines` WHERE `id` = {$airlineid}";
            $dataList   = getOneRecord($sql, $db, null);
            
            $id = $dataList['id'];
            $name     = $dataList['name'];
            $alias    = $dataList['alias'];
            $iata     = $dataList['iata'];
            $icao     = $dataList['icao'];
            $callsign = $dataList['callsign'];
            $country  = $dataList['country'];
            $active   = $dataList['active'];
            
            include("views/airlineviewer.php");
            
            break;
    case 'airplane':
        include('views/airplanereview.php');
        break;
    case 'insert_airplane':

        $rating = $_POST["rating"];
        $id = '';
        if (isset($_GET['id'])) {$id = $_GET['id'];}
        $sql = "INSERT INTO `plane_reviews` (`name`, `rating`, `review_id`) VALUES ('{$id}', '{$rating}', NULL)";
        executeSQL($sql, $db, null);

            $sql        = "SELECT * FROM `planes` WHERE name = {$id}";
            $dataList   = getOneRecord($sql, $db, null);
            
            $name = $dataList['name'];
            $iata = $dataList['iata'];
            $icao = $dataList['icao'];
            
            include("views/planeviewer.php");
            
            break;
    default:
        break;
}

$viewer = '';
if (isset($_GET['viewer'])) {
    $viewer = $_GET['viewer'];
}

if ($review == '') {
    switch ($viewer) {
        case 'airplane':
            
            $plane = '';
            if (isset($_GET['name'])) {
                $plane = $_GET['name'];
            }
            
            $sql        = "SELECT * FROM `planes` WHERE name = :plane";
            $parameters = array(
                ':plane' => $plane
            );
            $dataList   = getOneRecord($sql, $db, $parameters);
            
            $name = $dataList['name'];
            $iata = $dataList['iata'];
            $icao = $dataList['icao'];
            
            include("views/planeviewer.php");
            
            break;
        case 'airport':
            
            $airport = '';
            if (isset($_GET['name'])) {
                $airport = $_GET['name'];
            }
            
            
            $sql = "SELECT * FROM `airports` WHERE name = :airport";
            $parameters = array(
                ':airport' => $airport
            );
            $dataList   = getOneRecord($sql, $db, $parameters);
            
            $id = $dataList['airport_id'];
            $name      = $dataList['name'];
            $name      = str_replace("_", "'", $name);
            $city      = $dataList['city'];
            $country   = $dataList['country'];
            $iata      = $dataList['iata'];
            $icao      = $dataList['icao'];
            $lattitude = $dataList['lattitude'];
            $longitude = $dataList['longitude'];
            $altitude  = $dataList['altitude'];
            $timezone  = $dataList['timezone'];
            $region    = $dataList['region'];
            
            include("views/airportviewer.php");
            
            break;
        case 'route':
            
            $routeId = '';
            if (isset($_GET['id'])) {
                $routeId = $_GET['id'];
            }
            
            $sql        = "SELECT * FROM `routes` WHERE `id` = :id";
            $parameters = array(
                ':id' => $routeId
            );
            $dataList   = getOneRecord($sql, $db, $parameters);
            
            $airline_id             = $dataList['airline_id'];
            $source_airport_id      = $dataList['source_airport_id'];
            $destination_airport_id = $dataList['destination_airport_id'];
            $codeshare              = $dataList['codeshare'];
            $stops                  = $dataList['stops'];
            $equipment              = $dataList['equipment'];
            
            include("views/routeviewer.php");
            
            break;
        case 'airline':
            
            $airline = '';
            if (isset($_GET['name'])) {
                $airline = $_GET['name'];
            }
            
            $sql        = "SELECT * FROM `airlines` WHERE name = :airline";
            $parameters = array(
                ':airline' => $airline
            );
            $dataList   = getOneRecord($sql, $db, $parameters);
            
            $id = $dataList['id'];
            $name     = $dataList['name'];
            $alias    = $dataList['alias'];
            $iata     = $dataList['iata'];
            $icao     = $dataList['icao'];
            $callsign = $dataList['callsign'];
            $country  = $dataList['country'];
            $active   = $dataList['active'];
            
            include("views/airlineviewer.php");
            
            break;
        default:
            break;
    }
}

if ($viewer == '' && $review == '') {
    $mode = '';
    if (isset($_GET['mode'])) {
        $mode = $_GET['mode'];
    }
    
    switch ($mode) {
        case 'airportsearch': # Show the search function for airports.
            $sql      = 'SELECT DISTINCT country FROM airports ORDER BY country';
            $dataList = getAllRecords($sql, $db, null);
            include('views/airportsearch.php');
            break;
        
        case 'searchap': # Execute the search function for airports.
            $name    = '';
            $city    = '';
            $country = '';
            $show    = 0;
            
            if (isset($_POST['airport'])) {
                $name = $_POST['airport'];
            }
            if (isset($_GET['airport'])) {
                $name = $_GET['airport'];
            }
            
            if (isset($_POST['city'])) {
                $city = $_POST['city'];
            }
            if (isset($_GET['city'])) {
                $city = $_GET['city'];
            }
            
            if (isset($_POST['country'])) {
                $country = $_POST['country'];
            }
            if (isset($_GET['country'])) {
                $country = $_GET['country'];
            }
            
            if (isset($_GET['show'])) {
                $show = $_GET['show'];
            } else {
                $show = 10;
            }
            
            $modifiedname = str_replace('\'', '_', $name);
            
            // Total number of rows, used for whether or not "show more" button appears
            $result = $db->prepare("SELECT name FROM `airports` WHERE name LIKE '%{$modifiedname}%' AND city LIKE '%{$city}%' AND country LIKE '%{$country}%'");
            $result->execute();
            $num_of_rows = $result->rowCount();
            $count       = $num_of_rows;
            
            $sql      = "SELECT name FROM `airports` WHERE name LIKE '%{$modifiedname}%' AND city LIKE '%{$city}%' AND country LIKE '%{$country}%' LIMIT {$show}";
            $dataList = getAllRecords($sql, $db, null);
            
            include('views/apresults.php');
            
            break;
        case 'airlinesearch': # Show the search function for airlines.
            include('views/airlinesearch.php');
            break;
        case 'airsearch': # Execute the search function for airlines.
            
            $name     = '';
            $callsign = '';
            $country  = '';
            $show     = '';
            
            if (isset($_POST['airline'])) {
                $name = $_POST['airline'];
            }
            if (isset($_GET['airline'])) {
                $name = $_GET['airline'];
            }
            if (isset($_POST['callsign'])) {
                $callsign = $_POST['callsign'];
            }
            if (isset($_GET['callsign'])) {
                $callsign = $_GET['callsign'];
            }
            if (isset($_POST['country'])) {
                $country = $_POST['country'];
            }
            if (isset($_GET['country'])) {
                $country = $_GET['country'];
            }
            if (isset($_GET['show'])) {
                $show = $_GET['show'];
            } else {
                $show = 10;
            }
            
            $modifiedname = str_replace('\'', '_', $name);
            
            $result = $db->prepare("CALL getAirlineName('{$modifiedname}', '{$callsign}','{$country}',100000);");
            $result->execute();
            $num_of_rows = $result->rowCount();
            $count       = $num_of_rows;
            
            $sql = "CALL getAirlineName('{$modifiedname}','{$callsign}','{$country}',{$show});";
            echo $sql;
            
            $dataList = getAllRecords($sql, $db, null);
            
            include('views/airsearch.php');
            
            break;
        case 'airplanesearch':
            include('views/airplanesearch.php');
            break;
        case 'planeresults':
            
            $name = '';
            $show = 0;
            
            if (isset($_POST['planename'])) {
                $name = $_POST['planename'];
            }
            if (isset($_GET['name'])) {
                $name = $_GET['name'];
            }
            
            if (isset($_GET['show'])) {
                $show = $_GET['show'];
            } else {
                $show = 10;
            }
            
            $result = $db->prepare("SELECT name FROM `planes` WHERE name LIKE '%{$name}%'");
            $result->execute();
            $num_of_rows = $result->rowCount();
            $count       = $num_of_rows;
            
            $sql = "SELECT name FROM `planes` WHERE name LIKE '%{$name}%' LIMIT {$show}";
            
            $dataList = getAllRecords($sql, $db, null);
            
            include('views/planeresults.php');
            
            break;
        case 'login':
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $data = checkValidUser($db);
                
                if (isset($data) && isset($data['email'])) {
                    $_SESSION['user']  = $data['last_name'] . ', ' . $data['first_name'];
                    $_SESSION['email'] = $data['email'];
?>
               <script type="text/javascript">
                    window.location.href = 'index.php?mode=profilepage';
                </script>

                <?php
                } else {
?>
                   <script type="text/javascript">
                        window.location.href = 'index.php';
                    </script>
                <?php
                }
            } else {
?>
               <script type="text/javascript">
                    window.location.href = 'index.php';
                </script>
                <?php
            }
            
            break;
        
        case 'logout':
            session_destroy();
            setcookie(session_name(), '', time() - 1000, '/');
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
            $show   = 0;
            
            if (isset($_POST['depart'])) {
                $depart = $_POST['depart'];
            }
            if (isset($_GET['depart'])) {
                $depart = $_GET['depart'];
            }
            
            if (isset($_POST['arriving'])) {
                $arrive = $_POST['arriving'];
            }
            if (isset($_GET['arriving'])) {
                $arrive = $_GET['arriving'];
            }
            
            if (isset($_GET['show'])) {
                $show = $_GET['show'];
            } else {
                $show = 10;
            }
            
            echo "<center>You must specify a departing and arriving airport.</center>";
            if ($depart == "" || $arrive == "") {
                include('views/routesearch.php');
                break;
            } else {
                
                $result = $db->prepare("SELECT a.name, r.source_airport, r.destination_airport, r.id FROM routes r, airlines a WHERE r.source_airport LIKE '{$depart}' AND r.destination_airport LIKE '{$arrive}' AND r.airline_id = a.id");
                
                $result->execute();
                $num_of_rows = $result->rowCount();
                $count       = $num_of_rows;
                
                $sql = "SELECT a.name, r.source_airport, r.destination_airport, r.id FROM routes r, airlines a WHERE r.source_airport LIKE '{$depart}' AND r.destination_airport LIKE '{$arrive}' AND r.airline_id = a.id LIMIT {$show}";
                
                $dataList = getAllRecords($sql, $db, null);
                
                include('views/rtsearch.php');
                break;
            }
        default:
            include("views/homepage.php");
            break;
    }
}

include('assets/pagefooter.php');
?>