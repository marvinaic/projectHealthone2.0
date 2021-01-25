<?php

namespace App\Form;

use App\Entity\Recept;
use Doctrine\DBAL\Types\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Drug;
use Symfony\Component\Form\FormTypeInterface;


class ReceptFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('duur', TextType::class)
            ->add('dossis')
            ->add('datum')
            ->add('medicijn', EntityType::class,[
                'class' => Drug::class,
                'choice_label' => 'naam'
                ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Recept::class,
        ]);
    }
}
