<div class="container">
	<div class="row">
		<div class="column paragraph" style="float:left">
			<center><h1>Airport Database</h1></center>
			<p>Welcome to our Database Managment Systems project. This was developed by 3 students at Whitewater Wisconsin, Zach Harvey, Ryan {LASTNAME}, and Jake {LASTNAME}. This project was made strictly for education purposes. Our data was collected from <a href="http://www.openflights.org/" target="_blank">openflights.org</a>.</p>
		</div>
		<div class="column top_airports">
			<h1>Want to learn about a random airport?</h1>
			<?php

				$sql = "SELECT COUNT(*) FROM `airports`";

				$data = getOneRecord($sql, $db, null);

				foreach ($data as $x){
					$airportSelection = rand(0, $x);

					$sql2 = "SELECT * FROM `airports` WHERE airport_id = {$airportSelection}";
					
					$data2 = getOneRecord($sql2, $db, null);
					
				}

			?>
		</div>
	</div>
</div>
<style>
.top_airports{
width:40%;
margin-right:2%;
float: left;
}

.paragraph {
width:60%;
float: left;
}
</style>