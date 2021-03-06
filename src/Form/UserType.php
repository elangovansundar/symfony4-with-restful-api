<?php 
/*
 * Create User Form
 * Author : Elangovan.Sundar
 */

namespace App\Form;

use App\Document\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('userFirstName', TextType::class, array(
                'attr' => array('class' => 'form-control')
            ))
            ->add('userLastName', TextType::class, array(
                'attr' => array('class' => 'form-control')
            ))
            ->add('userEmail', CollectionType::class, 
            [
                'entry_type' => EmailType::class,
                'allow_add'  => true,
                'allow_delete'  => true,
                'entry_options' => array(
                    'attr' => array('class' => 'email-box form-control'),
                ),
            ])
            ->add('userMobileNumber', CollectionType::class, 
            [
                'entry_type' => IntegerType::class,
                'allow_add'  => true,
                'allow_delete'  => true,
                'entry_options' => array(
                    'attr' => array('class' => 'mobile-box form-control'),
                ),
            ])
            ->add('userDateofBirth', DateType::class, array(
                'format' => 'yyyy-MM-dd',
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control'],
                
            ))
            ->add('userEducation', CollectionType::class,
            [
                'entry_type' => TextType::class,
                'allow_add'  => true,
                'allow_delete'  => true,
                'prototype'     => true,
                'entry_options' => array(
                    'attr' => array('class' => 'edu-box form-control'),
                ),
            ])
            ->add('userBloodGroup', TextType::class, array(
                'attr' => array('class' => 'form-control')
            ))
            ->add('userGender', TextType::class, array(
                'attr' => array('class' => 'form-control')
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }
}