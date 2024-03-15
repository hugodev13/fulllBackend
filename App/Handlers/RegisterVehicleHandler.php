<?php

namespace Src\App\Handlers;

use Src\App\Commands\RegisterVehicleCommand;

class RegisterVehicleHandler
{
    public function handle(RegisterVehicleCommand $command)
    {
        $fleet = $command->getFleet();
        $vehicle = $command->getVehicle();

        if (!$fleet->hasVehicle($vehicle)) {
            $fleet->addVehicle($vehicle);
        } else {
            //todo : message same vehicle can't be added 2 times
        }
    }
}
