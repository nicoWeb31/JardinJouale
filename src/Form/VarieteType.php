<?php

namespace App\Form;

use App\Entity\Legume;
use App\Entity\Variete;
use Doctrine\DBAL\Types\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VarieteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('quantites')
            ->add('commentaire')
            ->add('legume',EntityType::class,[     //creer liste deroulante
                'class' => Legume::class,           // sur la classe legume
                'choice_label'=> 'nom'              // sur le label nom
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Variete::class,
        ]);
    }
}
