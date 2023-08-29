<?php

$curl = curl_init();
// Get the API key and host from environment variables
$apiKey = $_ENV['RAPIDAPI_KEY'];
$apiHost = $_ENV['RAPIDAPI_HOST'];

curl_setopt_array($curl, [
	CURLOPT_URL => "https://weatherapi-com.p.rapidapi.com/current.json?q=Malawi",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: weatherapi-com.p.rapidapi.com",
		"X-RapidAPI-Key: ee726b0018msh47bc7d91f1d1788p1d5976jsnd6e6a5ded138"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	$doc = json_decode($response, true);

	var_dump($doc);


}
