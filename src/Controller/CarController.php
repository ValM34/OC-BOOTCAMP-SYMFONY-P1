<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\CarServiceInterface;
use App\Entity\Car;
use App\Form\CarType;

class CarController extends AbstractController
{
  public function __construct(private CarServiceInterface $carService) {}

  #[Route('/car/create', name: 'car_create')]
  public function createCar(Request $request): Response
  {
    $car = new Car();
    $form = $this->createForm(CarType::class, $car);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $car = $this->carService->createCar($car);

      $this->addFlash('success', 'Voiture ajoutée avec succès !');
      return $this->redirectToRoute('car_get_one', ['id' => $car->getId()]);
    }

    return $this->render(view: 'car/create.html.twig', parameters: ['form' => $form->createView()]);
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
    $car = $this->carService->getCar($id);

    return $this->render(view: 'car/getOne.html.twig', parameters: ['car' => $car]);
  }

  #[Route('/car/delete/{id}', name: 'car_delete')]
  public function deleteCar(int $id): Response
  {
    $success = $this->carService->deleteCar($id);
    if ($success) {
      $this->addFlash('success', 'Voiture supprimée avec succès !');
    } else {
      $this->addFlash('error', 'Erreur lors de la suppression de la voiture !');
    }
    return $this->redirectToRoute('home');
  }
}
