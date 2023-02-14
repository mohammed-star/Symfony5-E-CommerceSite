<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Validator\Constraints\Length;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Votre Prenom',
                'constraints' => new Length(30, 2),
                'attr' => [
                    'placeholder' => 'Merci de saisir votre Prenom'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Votre Nom',
                'constraints' => new Length(30, 2),
                'attr' => [
                    'placeholder' => 'Merci de saisir votre Nom'
                ]
                ])
            ->add('email', EmailType::class, [
                'label' => 'Votre email',
                'constraints' => new Length(60, 2),
                'attr' => [
                    'placeholder' => 'Merci de saisir votre email'
                ]
                ])
            ->add('password', RepeatedType::class, [
                'type' =>  PasswordType::class,
                'invalid_message' => 'Le mdp et la confirmation ne sont pas identiques',
                'required' => true,
                'first_options' => [    'label' => 'Mot de passe'],
                'second_options' => [   'label' => 'La confirmation du Mot de passe']     
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
