<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
use Moebel\ServerPlanning\ServerAllocation;
use Moebel\ServerPlanning\ServerType;

$serverType = new ServerType(json_encode('{"CPU": 2, "RAM": 32, "HDD": 100}'));
$virtualMachines = '[
{"CPU": 1, "RAM": 16, "HDD": 10},
{"CPU": 1, "RAM": 16, "HDD": 70}, 
{"CPU": 1, "RAM": 16, "HDD": 10}, 
{"CPU": 1, "RAM": 16, "HDD": 30}
]';

$sObject = new ServerAllocation($serverType, $virtualMachines);
echo $sObject->calculate();
echo "\n";
