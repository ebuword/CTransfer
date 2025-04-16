<?php
function getLocalIP() {
    $output = shell_exec('ipconfig');
    preg_match('/IPv4 Address.*?: ([\d\.]+)/', $output, $matches);
    return $matches[1] ?? '127.0.0.1';
}
$ip = getLocalIP();
file_put_contents("ip.txt", $ip);
echo "Sunucu IP: http://$ip:8000\n";
