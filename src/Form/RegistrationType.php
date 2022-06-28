<?php

// src/Form/Type/RegistrationType.php
namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('name', TextType::class)
            ->add('surname', TextType::class)
            ->add('email', TextType::class)
            ->add('password', PasswordType::class)
            ->add('confirm_password', PasswordType::class)
        ;

    }
}