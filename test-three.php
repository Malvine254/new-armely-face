<?php
$apiUrl = 'https://restcountries.com/v3.1/all';
$response = file_get_contents($apiUrl);
$countries = json_decode($response, true);

foreach ($countries as $country) {
    echo $country['name']['common'] . "<br>";
}
