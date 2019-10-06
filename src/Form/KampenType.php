<?php

namespace App\Form;

use App\Entity\Kampen;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class KampenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('quote')
            ->add('datum')
            ->add('afbeelding')
            ->add('beschrijving')
            ->add('kijker')
            ->add('likes')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Kampen::class,
        ]);
    }
}
