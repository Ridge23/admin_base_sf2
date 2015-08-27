<?php

namespace ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints as Constraints;

class UserType extends AbstractType
{

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ModelBundle\Entity\User',
            'attr' => array(
                'role' => 'form',
            ),
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'modelbundle_user';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email', 'email', array(
            'required' => true,
            'label' => 'Email',
            'attr' => array('class' => 'form-control'),
            'constraints' => array(new Constraints\NotBlank(), new Constraints\Length(
                array('min' => 2, 'max' => 60)
            ))
        ));

        $builder->add('username', 'text', array(
            'required' => true,
            'label' => 'Username',
            'attr' => array('class' => 'form-control'),
        ));

        $builder->add('firstname', 'text', array(
            'required' => true,
            'label' => 'First name',
            'attr' => array('class' => 'form-control'),
        ));

        $builder->add('lastname', 'text', array(
            'required' => true,
            'label' => 'Last name',
            'attr' => array('class' => 'form-control'),
        ));

    }
}