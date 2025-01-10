<?php

namespace App\Service;
use App\Entity\Car;

interface CarServiceInterface
{
  public function createCar(Car $car): Car;
  public function getCars(): array;
  public function getCar(int $id): Car;
  public function deleteCar(int $id): bool;
}
