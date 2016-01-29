<?php

namespace BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AdressesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type')
            ->add('adresse')
            ->add('ville')
            ->add('cp')
            ->add('country', ChoiceType::class, array(
                'choices' => array( 'France' => 'France',
                                    'Belgique'  => 'Belgique',
                                    'Estonie' => 'Estonie',
                                    'Irlande' => 'Irlande',
                                    'Grèce' => 'Grèce',
                                    'Espagne' => 'Espagne',
                                    'Croatie' => 'Croatie',
                                    'Italie' => 'Italie',
                                    'Chypre' => 'Chypre',
                                    'Lettonie' => 'Lettonie',
                                    'Lituanie' => 'Lituanie',
                                    'Luxembourg' => 'Luxembourg',
                                    'Hongrie' => 'Hongrie',
                                    'Malte' => 'Malte',
                                    'Pays-Bas' => 'Pays-Bas',
                                    'Autriche' => 'Autriche',
                                    'Pologne' => 'Pologne',
                                    'Portugal' => 'Portugal',
                                    'Roumanie' => 'Roumanie',
                                    'Slovénie' => 'Slovénie',
                                    'Slovaquie' => 'Slovaquie',
                                    'Finlande' => 'Finlande',
                                    'Suède' => 'Suède',
                                    'Royaume-Uni' => 'Royaume-Uni'
                                    ),
                'choices_as_values' => true,
                'preferred_choices' => array('muppets', 'arr')
            ));
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackBundle\Entity\Adresses'
        ));
    }
}
