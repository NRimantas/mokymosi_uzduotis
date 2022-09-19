<?php

namespace App\Form;

use App\Entity\Applicant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApplicantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('first_name')
            ->add('last_name')
            ->add('address')
            ->add('email')
            ->add('phone_number')
            ->add('unique_house_number')
            ->add('project_number')
            ->add('compensation_received')
            ->add('created')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Applicant::class,
        ]);
    }
}
