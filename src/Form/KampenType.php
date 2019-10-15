<?php

namespace App\Form;

use App\Entity\Kampen;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class KampenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'required' => true,
            ])
            ->add('quote', TextareaType::class, [
                'required' => true,
            ])
            ->add('datum', DateType::class, [
                'required' => true,
            ])
            ->add('afbeelding', TextType::class, [
                'required' => false,
            ])
            ->add('beschrijving', TextareaType::class, [
                'required' => true,
            ])
            ->add('kijker', CheckboxType::class, [
                'required' => false,
            ])
            ->add('likes', CollectionType::class, [
                'required' => false,
            ])
            ->add('save', SubmitType::class)
            ->add('update', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Kampen::class,
        ]);
    }
}
