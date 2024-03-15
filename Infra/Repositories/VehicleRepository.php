<?php

namespace Src\Infra\Repositories;

use Src\Domain\Vehicle;

class VehicleRepository
{
    private array $vehicles = [];

    public function save(Vehicle $vehicle)
    {
        $this->vehicles[$vehicle->getId()] = $vehicle;
    }
    
}
