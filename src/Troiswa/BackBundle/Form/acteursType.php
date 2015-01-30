<?php

namespace Troiswa\BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class acteursType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("prenom","text")
            ->add("nom","text")
            ->add("dateDeNaissance","date")
            ->add("sexe",'choice', array(
                'choices'   => array(0 => 'Masculin', 1 => 'Féminin'),
                'expanded'  => true,
                'data' => 0
            ))
            ->add("biographie","textarea")
            ->add("fichier","file");
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Troiswa\BackBundle\Entity\acteurs'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'troiswa_backbundle_acteurs';
    }
}
