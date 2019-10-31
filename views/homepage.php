<div class="container">
	<div class="row">
		<div class="column">
			<table class="table table-striped">
				<tr>
					<td>Name</td>
					<td>City, Country</td>
				</tr>
				<?php
					foreach ($dataList as $x) {
						$name = $x['name'];
						$city = $x['city'];
						$country = $x['country'];
						echo "<tr>";
					echo "<td> {$name} </td>";
					echo "<td> {$city}, {$country} </td>";
					echo "</tr>";
					}
				?>
			</table>
		</div>
		<div class="column">
			<center><h1>Airport Database</h1></center>
			<!--<p>Welcome to our Database Managment Systems project. This was developed by 3 students at Whitewater Wisconsin, Zach Harvey, Ryan {LASTNAME}, and Jake {LASTNAME}. This project was made strictly for education purposes. Our data was collected from <a href="http://www.openflights.org/" target="_blank">openflights.org</a>.</p>-->
		</div>
	</div>
</div>