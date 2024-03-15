<?php

namespace Src\tests;

use PHPUnit\Framework\TestCase;
use Src\Domain\Vehicle;
use Src\Domain\Location;
use Src\App\Commands\ParkVehicleCommand;
use Src\App\Handlers\ParkVehicleHandler;
use Src\Domain\Enum\VehicleTypeEnum;
use Src\Domain\Fleet;

class ParkVehicleTest extends TestCase
{
    /**
     * Scenario: Successfully park a vehicle
     *
     * @return void
     */
    public function testParkVehicle()
    {
        $fleet = new Fleet;
        $location = new Location(43.4848, 5.3793);
        $vehicle = new Vehicle('AB-123-CD', VehicleTypeEnum::CAR, $location);

        $fleet->addVehicle($vehicle);

        $command = new ParkVehicleCommand($fleet, $vehicle, $location);
        $handler = new ParkVehicleHandler();
        $handler->handle($command);

        $this->assertTrue($fleet->hasVehicle($vehicle));
        $this->assertEquals($location, $vehicle->getLocation());
    }

    /**
     * Scenario: Can't localize my vehicle to the same location two times in a row
     *
     * @return void
     */
    public function testParkVehicleSameLocationTwice()
    {
        $fleet = new Fleet();
        $location = new Location(43.4848, 5.3793);
        $vehicle = new Vehicle('AB-000-CD', VehicleTypeEnum::TRUCK, $location);

        $fleet->addVehicle($vehicle);

        $command1 = new ParkVehicleCommand($fleet, $vehicle, $location);
        $command2 = new ParkVehicleCommand($fleet, $vehicle, $location);

        $handler = new ParkVehicleHandler();
        $handler->handle($command1);
        $handler->handle($command2);

        $this->assertTrue($fleet->hasVehicle($vehicle));
    }
}
