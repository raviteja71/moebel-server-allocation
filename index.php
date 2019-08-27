<?php
require_once 'vendor/autoload.php'; // Autoload files using Composer autoload
use Moebel\ServerPlanning\ServerAllocation;

//$obj = new ServerAllocation();
echo ServerAllocation::calculate();
