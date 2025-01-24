<?php

namespace App\Form;

use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use App\Enum\CarGearbox;

class CarType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
    $builder
      ->add('name')
      ->add('description', TextareaType::class)
      ->add('monthlyAmount')
      ->add('dailyAmount')
      ->add('seatsNumber', ChoiceType::class, [
        'choices' => array_combine(
          range(1, 9),
          range(1, 9)
        )
      ])
      ->add('gearbox', EnumType::class, [
        'class' => CarGearbox::class,
        // 'choice_label' => fn($choice) => match($choice) {
        //   CarGearbox::AUTOMATIC => 'Automatique',
        //   CarGearbox::MANUAL => 'Manuelle',
        // }
      ])
    ;
  }

  public function configureOptions(OptionsResolver $resolver): void
  {
    $resolver->setDefaults([
      'data_class' => Car::class,
    ]);
  }
}
