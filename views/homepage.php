<div class="container">
	<div class="row">
		<div class="column paragraph" style="float:left">
			<center><h1>Airport Database</h1></center>
			<p>Welcome to our Database Managment Systems project. This was developed by 3 students at Whitewater Wisconsin, Zach Harvey, Ryan Beatty, and Jake Fuller. This project was made strictly for education purposes. Our data was collected from <a href="http://www.openflights.org/" target="_blank">openflights.org</a>.</p>
		</div>
		<div class="column random_airport">
			<center>
			<h3>Want to learn about a random airport?</h3>
				<table>
					<?php
						$totalAirports = 0;
						foreach (getOneRecord("SELECT COUNT(*) FROM airports;",$db,null) as $j) {
							$totalAirports = $j;
						}

						for ($i = 0; $i < 4; $i++) {

							$airportSelection = rand(0, $totalAirports);
							$sql2 = "SELECT name, city, country FROM `airports` WHERE airport_id = {$airportSelection}";
								
							$data2 = getOneRecord($sql2, $db, null);
							$name = $data2['name'];
							$modifiedname = str_replace("_", '\'', $data2['name']);
							$city = $data2['city'];
							$country = $data2['country'];

							while ($name == "") {
								$airportSelection = rand(0, $totalAirports);
								$sql2 = "SELECT name, city FROM `airports` WHERE airport_id = {$airportSelection}";
								$data2 = getOneRecord($sql2, $db, null);
								$name = $data2['name'];
								$modifiedname = str_replace("_", '\'', $data2['name']);
								$city = $data2['city'];
							}

							echo "<tr><td><a href='index.php?viewer=airport&name={$name}'/>{$modifiedname}, {$city}</a></td></tr>";
						}
						
					?>
				</table>
			</center>
		</div>
	</div>
	<div class="row">
		<div class="column random_routes">
			<center>
				<h3> Here are some random routes you can learn about </h3>
				<table>
					<?php
						$totalRoutes = 0;
						foreach (getOneRecord("SELECT COUNT(*) FROM routes;",$db,null) as $j) {
							$totalRoutes = $j;
						}
						for ($i = 1; $i <= 10; $i++) {

							$foundGoodRoute = false;

							while ($foundGoodRoute == false) {

								$routeSelection = rand(0, $totalRoutes);

								$randomRoute = "SELECT airline.name AS airline_name, airport1.name AS source_airport, airport2.name AS destination_airport FROM airports airport1, airports airport2, airlines airline WHERE airport1.airport_id = (SELECT source_airport_id FROM routes WHERE id = {$routeSelection}) AND airport2.airport_id = (SELECT destination_airport_id FROM routes WHERE id = {$routeSelection}) AND airline.id = (SELECT airline_id FROM routes WHERE id = {$routeSelection})";

								$data = getOneRecord($randomRoute, $db, null);

								$airlineName = $data['airline_name'];
								$sourceAirport = str_replace("_", "'", $data['source_airport']);
								$destinationAirport = str_replace("_", "'", $data['destination_airport']);

								if (!($airlineName == '' || $sourceAirport == '' || $destinationAirport == '')) {
									$foundGoodRoute = true;
									echo "<tr><td> <a href='index.php?viewer=route&id={$routeSelection}'>{$airlineName}: {$sourceAirport} -> {$destinationAirport} </a></td></tr>";
								}
							} 
						}	
					?>
				</table>
			</center>
		</div>
	</div>
</div>
<style>
.random_routes {
	width:100%;
	margin-right:2%;
	float: center;
}
.random_airport{
width:55%;
margin-right:2%;
float: left;
}
.paragraph {
width:43%;
float: left;
}
</style>