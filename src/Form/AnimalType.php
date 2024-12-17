<?php

namespace App\Form;

use App\Entity\Animals;
use App\Entity\Family;
use App\Entity\Mainlands;
use App\Entity\Zoos;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnimalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('picture')
            ->add('dangerous')
            ->add('family', EntityType::class, [
                'class' => Family::class,
                'choice_label' => 'id',
            ])
            ->add('mainlands', EntityType::class, [
                'class' => Mainlands::class,
                'choice_label' => 'id',
            ])
            ->add('zoos', EntityType::class, [
                'class' => Zoos::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Animals::class,
        ]);
    }
}
