<?php

namespace BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Doctrine\ORM\EntityRepository;

class TraductionsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('langue', ChoiceType::class, array(
                    'choices' => array('fr' => "fr", 'en' => "en"),
                     // always include this
                     'choices_as_values' => true,))
            ->add('nom')
            ->add('description')
            ->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
                $trad = $event->getData();
                $form = $event->getForm();
                $form->add('type', EntityType::class, array(
                    'class' => 'BackBundle:Types',
                    'choice_label' => 'nom',
                    'expanded' => true,
                    'multiple' => true,
                    'query_builder' => function (EntityRepository $er) use ($trad) {

                        return $er->createQueryBuilder('t')
                            ->where("t.langue= :lg")
                            ->setParameter("lg", $trad->getLangue())
                             ;
                    },
                ));

                $form->add('categorie', EntityType::class, array(
                    'class' => 'BackBundle:Categories',
                    'choice_label' => 'nom',
                    'query_builder' => function (EntityRepository $er) use ($trad) {

                            return $er->createQueryBuilder('t')
                                ->where("t.langue= :lg")
                                ->setParameter("lg", $trad->getLangue())
                                 ;
                        } ));
            });

            /*->add('type', EntityType::class, array(
                'class' => 'BackBundle:Types',
                'choice_label' => 'nom',*/
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackBundle\Entity\Traductions'
        ));
    }
}