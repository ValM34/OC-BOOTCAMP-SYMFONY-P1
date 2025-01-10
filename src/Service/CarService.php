<?php

namespace App\Service;
use App\Entity\Car;
use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;

class CarService implements CarServiceInterface
{
  public function __construct(private CarRepository $carRepository, private EntityManagerInterface $entityManager)
  {
  }

  public function createCar(Car $car): Car
  {
    $car
      ->setCreatedAt(new \DateTimeImmutable())
      ->setUpdatedAt(new \DateTimeImmutable())
    ;
    $this->entityManager->persist($car);
    $this->entityManager->flush();

    return $car;
  }

  public function getCars(): array
  {
    $cars = $this->carRepository->findAll();

    return $cars;
  }

  public function getCar(int $id): Car
  {
    $car = $this->carRepository->find($id);

    return $car;
  }

  public function deleteCar(int $id): bool
  {
    $car = $this->carRepository->find($id);
    if (!$car) {
      return false;
    }
    $this->entityManager->remove($car);
    $this->entityManager->flush();

    return true;
  }
}
