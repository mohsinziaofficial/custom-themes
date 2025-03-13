<?php

//$html = file_get_contents("https://jec-resource-centres.je-hosting.co.uk/resource-centre/source/tax-tables/key-dates.php");
//
//echo $html;

$c = curl_init('https://jec-resource-centres.je-hosting.co.uk/resource-centre/source/tax-tables/key-dates.php');
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
//curl_setopt(... other options you want...)

$html = curl_exec($c);

if (curl_error($c))
    die(curl_error($c));

// Get the status code
$status = curl_getinfo($c, CURLINFO_HTTP_CODE);

curl_close($c);

echo $html;

?>