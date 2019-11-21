<div class="container">
	<div class="row">
		<div class="column paragraph" style="float:left">
			<center><h1>Airport Database</h1></center>
			<p>Welcome to our Database Managment Systems project. This was developed by 3 students at Whitewater Wisconsin, Zach Harvey, Ryan Beatty, and Jake Fuller. This project was made strictly for education purposes. Our data was collected from <a href="http://www.openflights.org/" target="_blank">openflights.org</a>.</p>
		</div>
		<div class="column random_airport">
			<center>
			<h3>Want to learn about a random airport?</h3>
				<?php
					$sql = "SELECT COUNT(*) FROM `airports`";
					$data = getOneRecord($sql, $db, null);
					foreach ($data as $x){
						$airportSelection = rand(0, $x);
						$sql2 = "SELECT name, city, country FROM `airports` WHERE airport_id = {$airportSelection}";
						
						$data2 = getOneRecord($sql2, $db, null);
						$name = $data2['name'];
						$modifiedname = str_replace("_", '\'', $data2['name']);
						$city = $data2['city'];
						$country = $data2['country'];
						while ($name == "") {
							$airportSelection = rand(0, $x);
							$sql2 = "SELECT name, city FROM `airports` WHERE airport_id = {$airportSelection}";
							$data2 = getOneRecord($sql2, $db, null);
							$name = $data2['name'];
							$modifiedname = str_replace("_", '\'', $data2['name']);
							$city = $data2['city'];
						}


				echo "<table>";
				echo "<tr><td><a href='index.php?viewer=airport&name={$name}'/>{$modifiedname}, {$city}</a></td>";
				echo "</tr>";
				echo "</table>";
				
				}
				?>
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
							$routeSelection = rand(0, $totalRoutes);
							$randomRoute = "SELECT DISTINCT airline.name AS airline_name, airport1.name AS source_airport, airport2.name AS destination_airport FROM airlines airline, airports airport1, airports airport2, routes r WHERE r.id = 5714 AND r.source_airport_id = airport1.airport_id AND r.destination_airport_id = airport2.airport_id AND r.airline_id = airline.id;";
							$data = getOneRecord($randomRoute, $db, null);
							echo "<tr><td> {$i}: {$data['airline_name']}: {$data['source_airport']} -> {$data['destination_airport']}</td></tr>";
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