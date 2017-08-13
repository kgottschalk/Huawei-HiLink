#!/usr/bin/env php-cli
<?php

date_default_timezone_set('UTC');

require_once __DIR__.'/hilink.class.php';

$hilink = AMWD\HiLink::create();

echo "Host: ".$hilink->getHost().PHP_EOL;
echo "Online: ".$hilink->online().PHP_EOL;
if (!$hilink->online()) {
	echo "Abort: not online".PHP_EOL;
	exit;
}

echo PHP_EOL;

echo "External IP: ".$hilink->getExternalIp().PHP_EOL;
$hilink->printTraffic().PHP_EOL;
echo PHP_EOL;
$hilink->printStatus().PHP_EOL;

if ($hilink->getServiceStatus() == 'enter PIN') {
	echo "Enter PIN: ".$hilink->pinEnter(1234).PHP_EOL;
	sleep(2);
	$hilink->printStatus().PHP_EOL;
}

echo PHP_EOL;

$hilink->printPinStatus();

echo PHP_EOL;

$hilink->printDeviceInfo();

echo PHP_EOL;

echo $hilink->getConnection();

echo PHP_EOL;

$hilink->printSmsBox();

?>
