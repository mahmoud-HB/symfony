<?php

namespace BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use BackBundle\Form\AdressesType;

class UserType extends AbstractType
{
	 /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('email')
            ->add('enabled')
            ->add('roles', 'choice', array(
                    'choices' => array(
                        'ROLE_ADMIN' => 'Admin',
                        'ROLE_USER' => 'Client'),
                    'expanded' => true,
                    'multiple' => true,
                       ))
            ->add('adresse', CollectionType::class, array(
                'entry_type' => AdressesType::class,
                'allow_add'    => true,
                'by_reference' => false,
                ))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackBundle\Entity\User'
        ));
    }
}
