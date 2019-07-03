<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class EquipoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('categoria')
        ->add('sexo',ChoiceType::class, [
            'choices'  => [
                'Masculino' => 'masculino',
                'Femenino' => 'femenino',
                'No' => false,
            ]])
        ->add('numJugadores')
        ->add('save', SubmitType::class, ['label' => 'Crear equipo'])
        ->getForm();
    }
}