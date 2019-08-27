<?php

namespace Moebel\ServerPlanning;

class VirtualMachines
{
    /**
     * @var
     * 
     */ 
    private $num_of_cpus;
    private $ram_size;
    private $hdd_size;
    
    function __construct($serverCollection) {
        $this->num_of_cpus = $serverCollection[0];
        $this->ram_size    = $serverCollection[1];
        $this->hdd_size    = $serverCollection[2];
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
