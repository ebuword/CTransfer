@echo off
php start-server.php
set /p IP=<ip.txt
start http://%IP%:8000
php -S %IP%:8000
