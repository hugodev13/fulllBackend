<?php

namespace Src\Domain;

use Src\Domain\Vehicle;

class Fleet
{
    private array $vehicles = [];

    public function addVehicle(Vehicle $vehicle)
    {
        $this->vehicles[$vehicle->getId()] = $vehicle;
    }

    public function hasVehicle(Vehicle $vehicle): bool
    {
        return isset($this->vehicles[$vehicle->getId()]);
    }

    public function getVehicles(): array
    {
        return $this->vehicles;
    }

    // Other methods as needed
}
