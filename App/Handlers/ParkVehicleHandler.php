<?php

namespace Src\App\Handlers;

use Src\App\Commands\ParkVehicleCommand;

class ParkVehicleHandler
{
    public function handle(ParkVehicleCommand $command)
    {
        $fleet = $command->getFleet();
        $location = $command->getLocation();
        $vehicle = $command->getVehicle();

        // todo : park the vehicle in the fleet with the location
    }
}
