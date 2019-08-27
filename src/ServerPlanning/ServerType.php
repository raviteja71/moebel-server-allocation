<?php

namespace Moebel\ServerPlanning;

class ServerType
{
    /**
     * @var
     * 
     */ 
    private $num_of_cpus;
    private $ram_size;
    private $hdd_size;
    
    function __construct($serverCollection) {
        $serverCollection = json_decode('{"CPU": 2,	"RAM": 32, "HDD": 100 }');
        $this->num_of_cpus = $serverCollection->CPU;
        $this->ram_size    = $serverCollection->RAM;
        $this->hdd_size    = $serverCollection->HDD;
    }
    
    public function getCpuCapacity() {
        return $this->num_of_cpus;;
    }

    public function getRam() {
        return $this->ram_size;;
    }

    public function getHdd() {
        return $this->hdd_size;;
    }

}
