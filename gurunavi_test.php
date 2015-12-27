<?php
require("../php1011/config.php");
$url  = "http://api.gnavi.co.jp/RestSearchAPI/20150630/?keyid=" . $key_id . "&latitude=&longitude=&range=3&coordinates_mode=1";
$json_data = file_get_contents($url, true);
$data = json_decode($json_data);
// var_dump($data);
var_dump($data->rest[0]);
echo "<hr>";
echo $data->rest[0]->name . "<br>";
?>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
<span><a href="../php1011/index.php">index.php</a></span>
</body>