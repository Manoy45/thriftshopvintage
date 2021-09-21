<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30
                ]),
                'label' => false,
                'attr' => [
                    'placeholder' => 'Prénom',
                ]
                ])
            ->add('lastname', TextType::class, [
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30
                ]),
                'label' => false,
                'attr' => [
                    'placeholder' => 'Nom'
                ]
                ])
            ->add('email', EmailType::class, [
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 55
                ]),
                'label' => false,
                'attr' => [
                    'placeholder' => 'Email'
                ]
                ])
            ->add('message', TextareaType::class, [
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 150
                ]),
                'label' => false,
                'attr' => [
                    'placeholder' => 'Écrivez votre message...'
                ]
                ])
            ->add('submit', SubmitType::class, [
                'label' => "Envoyer",
                'attr' => [
                    'class' => 'btn-block btn-warning'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
