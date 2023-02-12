<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Votre Prenom',
                'attr' => [
                    'placeholder' => 'Merci de saisir votre Prenom'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Votre Nom',
                'attr' => [
                    'placeholder' => 'Merci de saisir votre Nom'
                ]
                ])
            ->add('email', EmailType::class, [
                'label' => 'Votre email',
                'attr' => [
                    'placeholder' => 'Merci de saisir votre email'
                ]
                ])
            ->add('password', PasswordType::class, [
                'label' => 'Votre password',
                'attr' => [
                    'placeholder' => 'Merci de saisir votre password'
                ]
                ])
            ->add('password_confirm', PasswordType::class, [
                'label' => 'Confirmez votre password',
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'Merci de confirmer votre password'
                ]
                ])
            ->add('submit', SubmitType::class, [
                'label' => "S'inscrire"
                ])    
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}