<?php

namespace BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use BackBundle\Form\TraductionType;

class ProduitsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        //form fr
            ->add('traduction', CollectionType::class, array(
                'entry_type' => TraductionsType::class,
                //'allow_add'    => true
                ))
            ->add('actif')
            ->add('prix')
            ->add('stock')        
            ->add('datecreation', 'datetime')
            ->add('dateupdate', 'datetime')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackBundle\Entity\Produits'
        ));
    }
}
