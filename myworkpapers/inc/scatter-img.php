<?php
$bg = array(
	'/wp-content/uploads/2023/10/MWP-Scatter-Icons.png',
	'/wp-content/uploads/2023/10/MWP-Scatter-Icons-2.png',
	'/wp-content/uploads/2023/10/MWP-Scatter-Icons-3.png',
	'/wp-content/uploads/2023/10/MWP-Scatter-Icons-4.png',
	'/wp-content/uploads/2023/10/MWP-Scatter-Icons-5.png',
);

$i = rand(0, count($bg)-1); // generate random number size of the array
$selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
?>