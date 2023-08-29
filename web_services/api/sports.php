<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://livescore6.p.rapidapi.com/matches/v2/list-live?Category=soccer&Timezone=-7",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: livescore6.p.rapidapi.com",
		"X-RapidAPI-Key: 9223b73365mshf3d862aec9371dcp1dbff2jsn56b468534bfa"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}