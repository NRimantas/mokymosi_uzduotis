<?php

namespace App\Form;

use App\Entity\Applicant;
use App\Entity\ProjectTool;
use App\Entity\ToolMeasure;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class ApplicantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('first_name', TextType::class, [
                'label' => 'Vardas'
            ])
            ->add('last_name', TextType::class, [
                'label' => 'Pavardė'
            ])
            ->add('address', TextType::class, [
                'label' => 'Adresas'
            ])
            ->add('email', EmailType::class, [
                'label' => 'El.Paštas'
            ])
            ->add('phone_number', TextType::class, [
                'label' => 'Tel.Nr.'
            ])
            ->add('unique_house_number', TextType::class, [
                'label' => 'Unikalus pastato numeris',
                'attr' => ['placeholder'=>'0000-0000-0000']
            ])
            ->add('project_number', TextType::class, [
                'label' => 'Projekto numeris'
            ])
            ->add('compensation_received', CheckboxType::class, [
                'label' => 'Ar esate gavęs kompensaciją?',
                'required' => false,
            ])
            ->add('projectTool', EntityType::class, [
                'class' => ProjectTool::class,
                'multiple' => true,
                'label' => 'Pasirinkite norimą diegti priemonę: ',

            ])
            ->add('toolMeasure', EntityType::class, [
                'class' => ToolMeasure::class,
                'multiple' => true,
                'label' => 'Pasirinkite priemonės apimtį: ',

            ])


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Applicant::class,
        ]);
    }
}
