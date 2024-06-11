<?php
$user = '';
$pass = '';
$host = '';

$r_value = file_get_contents('http://checkip.dyndns.com/');
preg_match('/Current IP Address: ([.0-9]+)/', $r_value, $ips);
$ip = $ips[1];

$payload = 'username='.urlencode($user).'&pass='.urlencode($pass).'&h[]='.$host.'&ip='.$ip;
$payload = base64_encode($payload);

file_get_contents('https://dynupdate.no-ip.com/ducupdate.php?requestL='.$payload);
?>
