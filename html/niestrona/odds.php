<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://api-football-v1.p.rapidapi.com/v3/odds?league=1&season=2022",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: api-football-v1.p.rapidapi.com",
		"X-RapidAPI-Key: b031db6fc6mshf80c4815b722109p10e5d9jsnbc1c6a0e84c8"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	$tab = json_decode($response,true);
	var_dump($tab); 
	
	$a=$tab["results"];
	for ($i=0; $i<$a; $i++)
	{
		$date=$tab["response"][$i]["fixture"]["date"];
		echo $date;
	}
	
}
