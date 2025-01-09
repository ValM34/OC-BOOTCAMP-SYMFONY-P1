<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\CarServiceInterface;

class CarController extends AbstractController
{
  public function __construct(private CarServiceInterface $carService)
  {
  }

  #[Route('/car/create', name: 'car_create')]
  public function createCar(): Response
  {
    return $this->render(view: 'car/create.html.twig');
  }

  #[Route('/', name: 'home')]
  public function index(): Response
  {
    $cars = $this->carService->getCars();

    return $this->render(view: 'car/index.html.twig', parameters: ['cars' => $cars]);
  }

  #[Route('/car/{id}', name: 'car_get_one')]
  public function getCar(int $id): Response
  {
    return $this->render(view: 'car/getOne.html.twig');
  }
}
