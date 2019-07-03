<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class EquipoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('email', EmailType::class)
        ->add('plainPassword',RepeatedType::class, array(
         'type'=>PasswordType::class,
         'first_options'=>array('label'=>'Contraseña'),
         'second_options'=>array('label'=>'Repetir Contraseña'),
         ))
        ->add('registrar', SubmitType::class, ['label' => 'Registrar'])
        ->getForm();
    }
}