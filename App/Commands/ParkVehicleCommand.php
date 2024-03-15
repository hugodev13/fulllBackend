<?php

namespace Src\App\Commands;

use Src\Domain\Fleet;
use Src\Domain\Location;
use Src\Domain\Vehicle;

class ParkVehicleCommand
{
    private Fleet $fleet;
    private Vehicle $vehicle;
    private Location $location;

    public function __construct(Fleet $fleet, Vehicle $vehicle, Location $location)
    {
        $this->fleet = $fleet;
        $this->vehicle = $vehicle;
        $this->location = $location;
    }

    public function getFleet(): Fleet
    {
        return $this->fleet;
    }

    public function getVehicle(): Vehicle
    {
        return $this->vehicle;
    }

    public function getLocation(): Location
    {
        return $this->location;
    }
}
