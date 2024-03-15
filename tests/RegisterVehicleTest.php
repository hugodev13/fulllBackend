<?php

namespace Src\tests;

use Src\App\Commands\RegisterVehicleCommand;
use PHPUnit\Framework\TestCase;
use Src\Domain\Fleet;
use Src\Domain\Vehicle;
use Src\App\Handlers\RegisterVehicleHandler;
use Src\Domain\Enum\VehicleTypeEnum;

class RegisterVehicleTest extends TestCase
{
    /**
     * Scenario: I can register a vehicle
     *
     * @return void
     */
    public function testRegisterVehicle()
    {
        $fleet = new Fleet();
        $vehicle = new Vehicle('AB-123-CD', VehicleTypeEnum::CAR, null);

        $command = new RegisterVehicleCommand($fleet, $vehicle);
        $handler = new RegisterVehicleHandler();
        $handler->handle($command);

        $this->assertTrue($fleet->hasVehicle($vehicle));
    }

    /**
     * Scenario: I can't register same vehicle twice
     *
     * @return void
     */
    public function testRegisterSameVehicleTwice()
    {
        $fleet = new Fleet();
        $vehicle = new Vehicle('AB-123-CD', VehicleTypeEnum::TRUCK, null);

        $command1 = new RegisterVehicleCommand($fleet, $vehicle);
        $command2 = new RegisterVehicleCommand($fleet, $vehicle);

        $handler = new RegisterVehicleHandler();
        $handler->handle($command1);
        $handler->handle($command2);

        // test if vehicle is added only one time
        $this->assertEquals(1, count($fleet->getVehicles()));
    }

    /**
     * Scenario: Same vehicle can belong to more than one fleet
     *
     * @return void
     */
    public function testRegisterSameVehicleOnTwoFleets()
    {
        $fleet1 = new Fleet();
        $fleet2 = new Fleet();
        $vehicle = new Vehicle('AB-123-CD', VehicleTypeEnum::MOTOCYCLE, null);

        $command1 = new RegisterVehicleCommand($fleet1, $vehicle);
        $command2 = new RegisterVehicleCommand($fleet2, $vehicle);

        $handler = new RegisterVehicleHandler();
        $handler->handle($command1);
        $handler->handle($command2);

        $this->assertTrue($fleet1->hasVehicle($vehicle));
        $this->assertTrue($fleet2->hasVehicle($vehicle));
    }
}
