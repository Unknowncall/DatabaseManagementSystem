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
        $name = '';
        if (isset($_GET['name'])) {$name = $_GET['name'];}
        
        $sql = "INSERT INTO `plane_reviews` (`name`, `rating`, `review_id`) VALUES ('{$name}', '{$rating}', NULL)";
        executeSQL($sql, $db, null);

            $sql        = "SELECT * FROM `planes` WHERE name = :name";
            $parameters = array(':name' => $name);
            $dataList   = getOneRecord($sql, $db, $parameters);
    
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

            $sqlcount = "CALL getAirportName('{$modifiedname}', '{$city}','{$country}',100000);";
            $result = $db->prepare($sqlcount);
            $result->execute();
            $num_of_rows = $result->rowCount();
            $count       = $num_of_rows;
            
            $sql = "CALL getAirportName('{$modifiedname}','{$city}','{$country}',{$show});";

            $result = mysqli_query($connection, $sql);
            
            $dataList = getAllRecords($sql, $db, null);
            
            include('views/apresults.php');
            
            break;
        case 'airlinesearch': # Show the search function for airlines.
            $sql = 'SELECT DISTINCT country FROM `airports` ORDER BY country';
            $dataList = getAllRecords($sql, $db, null);
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
            
            $sqlcount = "CALL getAirlineName('{$modifiedname}', '{$callsign}','{$country}',100000);";
            $result = $db->prepare($sqlcount);
            $result->execute();
            $num_of_rows = $result->rowCount();
            $count       = $num_of_rows;
            
            $sql = "CALL getAirlineName('{$modifiedname}','{$callsign}','{$country}',{$show});";

            $result = mysqli_query($connection, $sql);
            
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

            $sqlcount = "CALL getPlaneName('{$name}',100000);";
            $result = $db->prepare($sqlcount);
            $result->execute();
            $num_of_rows = $result->rowCount();
            $count       = $num_of_rows;
            
            $sql = "CALL getPlaneName('{$name}',{$show});";

            $result = mysqli_query($connection, $sql);
            
            $dataList = getAllRecords($sql, $db, null);
            
            include('views/planeresults.php');
            
            break;
        case 'login':
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $data = checkValidUser($db);
                
                if (isset($data) && isset($data['email'])) {
                    $_SESSION['user']  = $data['first_name']. ' ' .$data['last_name'];
                    $_SESSION['email'] = $data['email'];
                    $_SESSION['username'] = $_POST['username'];
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
            //setcookie(session_name(), '', time() - 1000, '/');
            $_SESSION = array();
?>
               <script type="text/javascript">
                    window.location.href = 'index.php';
                </script>
                <?php
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
            
        case 'signup':
            include("views/signup.html");
            break;
        
        case 'profilepage':
            $sql = 'SELECT * FROM `users` WHERE email = :email';
            $dataList = getOneRecord($sql, $db, array(':email' => $_SESSION['email']));
            
            include("views/profile.php");
            break;
            
        case 'newuser':
            $username = $password = $email = $fname = $lname = '';
            if(isset($_POST['username']) && isset($_POST['pass']) && isset($_POST['email']) && isset($_POST['fname']) && isset($_POST['lname'])){
                $username = $_POST['username'];
                $password = $_POST['pass'];
                $email = $_POST['email'];
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
            }
            
            $sql = 'INSERT INTO `users` (username, password, email, first_name, last_name) VALUES (:username, :pass, :email, :first, :last)';
            $parameters = array(':username' => $username, ':pass' => md5($password), ':email' => $email, ':first' => $fname, ':last' => $lname);
            
            $statement = $db->prepare($sql);
            $statement->execute($parameters);
            
            $sql2 = "select email, first_name, last_name from `users` where username = :username and password = :pass";
            $parameters2 = array(':username' => $username, ':pass' => md5($password));
            $data = getOneRecord($sql2, $db, $parameters2);
            
            if (isset($data) && isset($data['email'])) {
                $_SESSION['user']  = $data['first_name']. ' ' .$data['last_name'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['username'] = $_POST['username'];
            ?>

               <script type="text/javascript">
                    window.location.href = 'index.php?mode=profilepage';
                </script>
            <?php
            }
            
            break;
        case 'updatedinfo':
            $username = $fname = $lname = '';
            if(isset($_POST['username']) && isset($_POST['fname']) && isset($_POST['lname'])){
                $username = $_POST['username'];
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
            }
            
            if($username == '' || $fname == '' || $lname == ''){
                echo '<div class="container" style="margin-top:25px;"><div class="alert alert-danger" role="alert">
                      <h4 class="alert-heading">Error</h4>
                      <p>One or more fields were left empty.</p>
                      <hr>
                      <p class="mb-0">Please <strong><a href="index.php?mode=profilepage">go back</a></strong>.</p>
                    </div></div>';
            }else{
                $sql = "UPDATE `users` SET username = :user, first_name = :fname, last_name = :lname WHERE email = :email";
                $parameters = array(':user' => $username, ':fname' => $fname, ':lname' => $lname, ':email' => $_SESSION['email']);
                
                $statement = $db->prepare($sql);
                $statement->execute($parameters);
                
                $data = getOneRecord('SELECT email, username, first_name, last_name FROM `users` WHERE email = :email', $db, array(':email' => $_SESSION['email']));
            
                if (isset($data) && isset($data['email'])) {
                    $_SESSION['user']  = $data['first_name']. ' ' .$data['last_name'];
                    $_SESSION['username'] = $data['username'];
                }
                
                ?>
                <script type="text/javascript">
                    document.getElementById('signedin').innerHTML = "You are signed in as: <i><?php echo $_SESSION['user']; ?></i>";
                </script>
                <?php
                echo '<div class="container" style="margin-top:25px;"><div class="alert alert-success" role="alert">
                      <h4 class="alert-heading">Success</h4>
                      <p>Your profile has been successfully updated.</p>
                      <hr>
                      <p class="mb-0">Please <strong><a href="index.php">click here</a></strong> if you would like to return to the Home page.</p>
                    </div></div>';
            }
                
            break;
            
        case 'airportmodify':
            $sql = 'SELECT DISTINCT country FROM `airports` ORDER BY country';
            $dataList = getAllRecords($sql, $db, null);
            include('views/apmodify.php');
            break;
            
        case 'addap':
            
            break;
            
        case 'airlinemodify':
            $sql = 'SELECT DISTINCT country FROM `airports` ORDER BY country';
            $dataList = getAllRecords($sql, $db, null);
            include('views/airlinemodify.php');
            break;
            
        case 'addal':
            $airline = $country = '';
            $alias = $iata = $icao = $callsign = 'N';
            $active = 0;
            
            if(isset($_POST['al']) && isset($_POST['country'])){ $airline = $_POST['al']; $country = $_POST['country']; }
            if(isset($_POST['alias']) && $_POST['alias'] != ''){ $alias = $_POST['alias']; }
            if(isset($_POST['iata']) && $_POST['iata'] != ''){ $iata = $_POST['iata']; }
            if(isset($_POST['icao']) && $_POST['icao'] != ''){ $icao = $_POST['icao']; }
            if(isset($_POST['cs']) && $_POST['cs'] != ''){ $callsign = $_POST['cs']; }
            if(isset($_POST['active'])){ $active = $_POST['active']; }
            
            $sql = 'INSERT INTO `airlines` (name, alias, iata, icao, callsign, country, active) VALUES (:name, :alias, :iata, :icao, :callsign, :country, :active)';
            $parameters = array(':name' => $airline, ':alias' => $alias, ':iata' => $iata, ':icao' => $icao, ':callsign' => $callsign, ':country' => $country, ':active' => $active);
            
            $statement = $db->prepare($sql);
            $statement->execute($parameters);
            
            echo '<div class="container" style="margin-top:25px;"><div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Success</h4>
                    <p>You have successfully added <i>'.$airline.'</i> to the database.</p>
                    <hr>
                    <p class="mb-0"><strong><a href="index.php?viewer=airline&name='.$airline.'">Click here</a></strong> to see the search result of your Airline.</p>
                </div></div>';
            
            break;
            
        case 'planemodify':
            include('views/planemodify.html');
            break;
        
        case 'addplane':
            $plane = '';
            $iata = $icao = 'N';
            
            if(isset($_POST['plane'])){ $plane = $_POST['plane']; }
            if(isset($_POST['iata']) && $_POST['iata'] != ''){ $iata = $_POST['iata']; }
            if(isset($_POST['icao']) && $_POST['iata'] != ''){ $icao = $_POST['icao']; }
            
            $sql = 'INSERT INTO `planes` (name, iata, icao) VALUES (:plane, :iata, :icao)';
            $parameters = array(':plane' => $plane, ':iata' => $iata, ':icao' => $icao);
            
            $statement = $db->prepare($sql);
            $statement->execute($parameters);
            
            echo '<div class="container" style="margin-top:25px;"><div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Success</h4>
                    <p>You have successfully added <i>'.$plane.'</i> to the database.</p>
                    <hr>
                    <p class="mb-0"><strong><a href="index.php?viewer=airplane&name='.$plane.'">Click here</a></strong> to see the search result of your Airplane.</p>
                </div></div>';
            
            break;
        case 'apratesearch':
            $rating = 0;
            $show = 10;
            if(isset($_POST['rating'])){ $rating = $_POST['rating']; }
            
            if (isset($_GET['show'])) { $show = $_GET['show']; }
            
            $sql = 'SELECT a.name, AVG(r.rating) FROM `airports` a, `airport_reviews` r INNER JOIN `airport_reviews` r2 WHERE r.airport_id = r2.airport_id AND r2.airport_id = a.airport_id GROUP BY a.name HAVING AVG(r.rating) >= :rating and AVG(r.rating) < :rating + 1 ORDER BY a.name';
            $parameters = array(':rating' => $rating);
            $dataList = getAllRecords($sql, $db, $parameters);
            
            $result = $db->prepare($sql);
            $result->execute($parameters);
            $num_of_rows = $result->rowCount();
            $count = $num_of_rows;
            
            include('views/apresults.php');
            
            break;
            
        case 'alratesearch':
            $rating = 0;
            $show = 10;
            if(isset($_POST['rating'])){ $rating = $_POST['rating']; }
            
            if (isset($_GET['show'])) { $show = $_GET['show']; }
            
            $sql = 'SELECT a.name, AVG(r.rating) FROM `airlines` a, `airline_reviews` r INNER JOIN `airline_reviews` r2 WHERE r.airline_id = r2.airline_id AND r2.airline_id = a.id GROUP BY a.name HAVING AVG(r.rating) >= :rating and AVG(r.rating) < :rating + 1 ORDER BY a.name';
            $parameters = array(':rating' => $rating);
            $dataList = getAllRecords($sql, $db, $parameters);
            
            $result = $db->prepare($sql);
            $result->execute($parameters);
            $num_of_rows = $result->rowCount();
            $count = $num_of_rows;
            
            include('views/airsearch.php');
            
            break;
        
        case 'planeratesearch':
            $rating = 0;
            $show = 10;
            if(isset($_POST['rating'])){ $rating = $_POST['rating']; }
            
            if (isset($_GET['show'])) { $show = $_GET['show']; }
            
            $sql = 'SELECT p.name, AVG(r.rating) FROM `planes` p, `plane_reviews` r INNER JOIN `plane_reviews` r2 WHERE r.name = r2.name AND r2.name = p.name GROUP BY p.name HAVING AVG(r.rating) >= :rating and AVG(r.rating) < :rating + 1 ORDER BY p.name';
            $parameters = array(':rating' => $rating);
            $dataList = getAllRecords($sql, $db, $parameters);
            
            $result = $db->prepare($sql);
            $result->execute($parameters);
            $num_of_rows = $result->rowCount();
            $count = $num_of_rows;
            
            include('views/planeresults.php');
            
            break;
            
        default:
            include("views/homepage.php");
            break;
    }
}

include('assets/pagefooter.php');
?>