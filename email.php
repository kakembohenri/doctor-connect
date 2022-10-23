<?php
$curl = curl_init();
curl_setopt_array($curl, [
	CURLOPT_URL => "https://rapidprod-sendgrid-v1.p.rapidapi.com/alerts/%7Balert_id%7D",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "PATCH",
	CURLOPT_POSTFIELDS => "{
    \"type\": \"stats_notification\",
    \"email_to\": \"nkanjijoel@gmail.com\",
    \"frequency\": \"daily\"
}",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: rapidprod-sendgrid-v1.p.rapidapi.com",
		"X-RapidAPI-Key: b5996fa9d5msh010aea49c240baep13f328jsn799d21afa79a",
		"content-type: application/json"
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