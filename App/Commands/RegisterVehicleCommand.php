<?php

namespace Src\App\Commands;

use Src\Domain\Fleet;
use Src\Domain\Vehicle;

class RegisterVehicleCommand
{
    private Fleet $fleet;
    private Vehicle $vehicle;

    public function __construct(Fleet $fleet, Vehicle $vehicle)
    {
        $this->fleet = $fleet;
        $this->vehicle = $vehicle;
    }

    public function getFleet(): Fleet
    {
        return $this->fleet;
    }

    public function getVehicle(): Vehicle
    {
        return $this->vehicle;
    }
}
