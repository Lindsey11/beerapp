<?php
$data = file_get_contents("http://beerapp/api/beer");

$data = json_decode($data, true);

print_r($data);