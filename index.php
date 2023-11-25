<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Weather Today</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

		<link href="https://fonts.googleapis.com/css?family=Six+Caps&display=swap" rel="stylesheet"> 
	</head>


	<body>
		<?php
			$filename = 'prediction/forecast.csv';
			$the_big_array = []; 
			if (($h = fopen("{$filename}", "r")) !== FALSE) 
			{
  				while (($data = fgetcsv($h, 1000, ",")) !== FALSE) 
  				{
    				$the_big_array[] = $data;		
  				}
  				fclose($h);
			}

			$dir = "images/icons/logo";
			$icon_name = scandir($dir);

			$icon_assigned = array();
			for($i = 1; $i <= 7; $i++) {
				if($the_big_array[$i][1] >= 35) {
					array_push($icon_assigned, $icon_name[3]);
				}
				elseif ($the_big_array[$i][1] >= 27 && $the_big_array[$i][1] < 35) {
					array_push($icon_assigned, $icon_name[4]);
				}
				elseif ($the_big_array[$i][1] > 23 && $the_big_array[$i][1] < 27) {
					array_push($icon_assigned, $icon_name[2]);
				}
				elseif($the_big_array[$i][5] > 4) {
					array_push($icon_assigned, $icon_name[11]);
				}
				elseif ($the_big_array[$i][5] >= 2 && $the_big_array[$i][5] < 4) {
					array_push($icon_assigned, $icon_name[10]);
				}
				elseif ($the_big_array[$i][5] >= 1 && $the_big_array[$i][5] < 2) {
					array_push($icon_assigned, $icon_name[5]);
				}
				elseif ($the_big_array[$i][5] >= 0.5 && $the_big_array[$i][5] < 1) {
					array_push($icon_assigned, $icon_name[7]);
				}
				elseif ($the_big_array[$i][1] > 0 && $the_big_array[$i][1] <= 4) {
					array_push($icon_assigned, $icon_name[14]);
				}
				elseif ($the_big_array[$i][1] <= 0) {
					array_push($icon_assigned, $icon_name[15]);
				}
				else {
					array_push($icon_assigned, $icon_name[6]);
				}
			}

			$it = 1;
			while($icon_assigned[0] != $icon_name[$it]) {
				$it++;
			}

			$weather_condition;
			switch ($it) {
				case 3:
					$weather_condition = "Sunny"; 
					break;
				case 4: 
					$weather_condition = "Partly Sunny";
					break;
				case 2:
					$weather_condition = "Mostly Sunny";
					break;
				case 11: 
					$weather_condition = "Heavy Rainy";
					break;
				case 10: 
					$weather_condition = "Rainy";
					break;
				case 5:
					$weather_condition = "Sun & Rain";
					break;
				case 7:
					$weather_condition = "Cloudy";
					break;
				case 14:
					$weather_condition = "Snow";
					break;
				case 15: 
					$weather_condition = "Heavy Snow";
					break;
				case 6:
					$weather_condition = "Partly Cloudy";
					break;
				default:
					$weather_condition = "";
					break;
			}

		?>
		<div class="site-content">
			<div class="site-header">
				<div class="container">
					<a href="index.html" class="branding">
						<img src="images/cloudy.png" alt="" class="logo">
						<div class="logo-type">
							<h1 class="site-title">WEATHER TODAY</h1>
							<h1 class="site-title"></h1> 
						</div>
					</a>

					<!-- Default snippet for navigation -->

					<div class="mobile-navigation"></div>

				</div>
			</div> <!-- .site-header -->

			
			<div class="forecast-table">
				<div class="container">
					<div class="forecast-container">
						<div class="today forecast">
							<div class="forecast-header">
								<div class="day" id="today"></div>
								<div class="date" id="date"></div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="location" id="location">Current Location</div>
								<div class="degree">
									<div class="num"><?= round($the_big_array[1][1], 0)?><sup>o</sup>C</div>
									<div class="forecast-icon">
										<img src="images/icons/logo/<?= $icon_assigned[0]?>" alt="" width=90>
									</div>	
								</div>
								<p><img src="images/icons/dew_point.png" align="top">&ensp;Dew Point: <?= round($the_big_array[1][2], 0)?> <sup>o</sup>C</p>
								<p><img src="images/icons/humidity.png" align="top">&ensp;Humidity: <?= round($the_big_array[1][3], 0)?> %</p>
								<p><img src="images/icons/pressure.png" align="top">&ensp;Pressure: <?= round($the_big_array[1][4], 2)?> inHg</p>
								<p><img src="images/icons/rain.png" align="top">&ensp;Rain: <?= round($the_big_array[1][5], 3)?> in</p>
							</div>
							<div class="forecast-footer">
								<div class="weather-type" id="type"><?= $weather_condition?></div>
							</div>
						</div>
						<div class="forecast">
							<div class="forecast-header">
								<div class="day" id="tomorrow"></div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="forecast-icon">
									<img src="images/icons/logo/<?= $icon_assigned[1]?>" alt="" width=48>
								</div>
								<div class="degree"><?= round($the_big_array[2][1], 0)?><sup>o</sup>C</div></br>
								<p>Dew Point</br><?= round($the_big_array[2][2], 0)?> <sup>o</sup>C</p>
								<p>Humidity</br><?= round($the_big_array[2][3], 0)?> %</p>
								<p>Pressure</br><?= round($the_big_array[2][4], 2)?> inHg</p>
								<p>Rain</br><?= round($the_big_array[2][5], 3)?> in</p>
							</div>
						</div>
						<div class="forecast">
							<div class="forecast-header">
								<div class="day" id="day3"></div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="forecast-icon">
									<img src="images/icons/logo/<?= $icon_assigned[2]?>" alt="" width=48>
								</div>
								<div class="degree"><?= round($the_big_array[3][1], 0)?><sup>o</sup>C</div></br>
								<p>Dew Point</br><?= round($the_big_array[3][2], 0)?> <sup>o</sup>C</p>
								<p>Humidity</br><?= round($the_big_array[3][3], 0)?> %</p>
								<p>Pressure</br><?= round($the_big_array[3][4], 2)?> inHg</p>
								<p>Rain</br><?= round($the_big_array[3][5], 3)?> in</p>
							</div>
						</div>
						<div class="forecast">
							<div class="forecast-header">
								<div class="day" id="day4"></div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="forecast-icon">
									<img src="images/icons/logo/<?= $icon_assigned[3]?>" alt="" width=48>
								</div>
								<div class="degree"><?= round($the_big_array[4][1], 0)?><sup>o</sup>C</div></br>
								<p>Dew Point</br><?= round($the_big_array[4][2], 0)?> <sup>o</sup>C</p>
								<p>Humidity</br><?= round($the_big_array[4][3], 0)?> %</p>
								<p>Pressure</br><?= round($the_big_array[4][4], 2)?> inHg</p>
								<p>Rain</br><?= round($the_big_array[4][5], 3)?> in</p>
							</div>
						</div>
						<div class="forecast">
							<div class="forecast-header">
								<div class="day" id="day5"></div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="forecast-icon">
									<img src="images/icons/logo/<?= $icon_assigned[4]?>" alt="" width=48>
								</div>
								<div class="degree"><?= round($the_big_array[5][1], 0)?><sup>o</sup>C</div></br>
								<p>Dew Point</br><?= round($the_big_array[5][2], 0)?> <sup>o</sup>C</p>
								<p>Humidity</br><?= round($the_big_array[5][3], 0)?> %</p>
								<p>Pressure</br><?= round($the_big_array[5][4], 2)?> inHg</p>
								<p>Rain</br><?= round($the_big_array[5][5], 3)?> in</p>
							</div>
						</div>
						<div class="forecast">
							<div class="forecast-header">
								<div class="day" id="day6"></div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="forecast-icon">
									<img src="images/icons/logo/<?= $icon_assigned[5]?>" alt="" width=48>
								</div>
								<div class="degree"><?= round($the_big_array[6][1], 0)?><sup>o</sup>C</div></br>
								<p>Dew Point</br><?= round($the_big_array[6][2], 0)?> <sup>o</sup>C</p>
								<p>Humidity</br><?= round($the_big_array[6][3], 0)?> %</p>
								<p>Pressure</br><?= round($the_big_array[6][4], 2)?> inHg</p>
								<p>Rain</br><?= round($the_big_array[6][5], 3)?> in</p>
							</div>
						</div>
						<div class="forecast">
							<div class="forecast-header">
								<div class="day" id="day7"></div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="forecast-icon">
									<img src="images/icons/logo/<?= $icon_assigned[6]?>" alt="" width=48>
								</div>
								<div class="degree"><?= round($the_big_array[7][1], 0)?><sup>o</sup>C</div></br>
								<p>Dew Point</br><?= round($the_big_array[7][2], 0)?> <sup>o</sup>C</p>
								<p>Humidity</br><?= round($the_big_array[7][3], 0)?> %</p>
								<p>Pressure</br><?= round($the_big_array[7][4], 2)?> inHg</p>
								<p>Rain</br><?= round($the_big_array[7][5], 3)?> in</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		<script src="js/dynamicDate.js"></script>
		<script src="js/geolocation.js"></script>
	</body>

</html>