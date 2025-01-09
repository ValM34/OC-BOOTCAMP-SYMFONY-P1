<?php

namespace App\Service;
use App\Entity\Car;
use App\Repository\CarRepository;

class CarService implements CarServiceInterface
{
  public function __construct(private CarRepository $carRepository)
  {
  }

  public function getCars(): array
  {
    $cars = $this->carRepository->findAll();
    return $cars;
  }
}
