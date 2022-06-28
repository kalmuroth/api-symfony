<?php

// src/Form/Type/AddAnnonceType.php
namespace App\Form;

use App\Entity\Category;
use App\Entity\Annonce;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\FormBuilderInterface;

class AddAnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
        ->add('nom', TextType::class)
        ->add('description',TextType::class)
        ->add('prix',IntegerType::class)
        ->add('category', EntityType::class, [
            'class' => Category::class,
            'choice_label' => 'nom'
        ])
        ->add('submit', SubmitType::class)
        ;
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }

}