<?php

namespace App\Service;
use App\Entity\Car;

interface CarServiceInterface
{
  public function getCars(): array;
}
