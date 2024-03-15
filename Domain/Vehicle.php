<?php

namespace Src\Domain;

use Src\Domain\Enum\VehicleTypeEnum;

class Vehicle
{
    private string $id;
    private ?VehicleTypeEnum $type = null;
    private ?Location $location = null;

    public function __construct(string $id, ?VehicleTypeEnum $type, ?Location $location)
    {
        $this->id = $id;
        $this->type = $type;
        $this->location = $location;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getType(): ?VehicleTypeEnum
    {
        return $this->type;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }
}
