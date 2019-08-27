<?php

namespace Moebel\ServerPlanning;

use Moebel\ServerPlanning\ServerType;

class ServerAllocation
{
    public $serverCollection;
    
    public $virtualMachines;
    
    function __construct(ServerType $serverCollection ,  $virtualMachines) {
        $this->serverCollection = $serverCollection;
        $this->virtualMachines = $virtualMachines;
    }
    
    public function getServerCollection() {
        $this->serverCollection = $serverCollection;
    }
    
	public function calculate() : int
	{
        $vmJson = json_decode($this->virtualMachines);
        
        $remainingCpus = $originalCpu = $this->serverCollection->getCpuCapacity();
        $remainingRam  = $originalRam = $this->serverCollection->getRam();
        $remainingHdd  = $originalHdd = $this->serverCollection->getHdd();
        
        $servers[0] = array($originalCpu, $originalRam, $originalHdd);

        $no_of_servers = 1;

        foreach($vmJson as $vmObj) {
            if( $originalCpu < $vmObj->CPU || $originalRam < $vmObj->RAM || $originalHdd < $vmObj->HDD ) {
                break;
            } else {
                for($i = 0; $i < count($servers); $i++) {
                    $remainingCpus = $servers[$i][0]  - $vmObj->CPU;
                    $remainingRam  = $servers[$i][1] - $vmObj->RAM;
                    $remainingHdd  = $servers[$i][2] - $vmObj->HDD;
                    if($remainingCpus < 0 || $remainingRam < 0 || $remainingHdd < 0) {
                        if($i+1  === count($servers)) {
                            $servers[$i+1] = array($originalCpu  - $vmObj->CPU, $originalRam - $vmObj->RAM, $originalHdd - $vmObj->HDD);
                            $no_of_servers++;
                            break;
                        } else {
                            
                        }
                    } else {
                        $servers[$i] = array($remainingCpus, $remainingRam, $remainingHdd);
                        break;
                    } 
                }
            }
        }
        return $no_of_servers;
	}
}
