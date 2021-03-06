<?php

namespace Aperophp\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

use Symfony\Component\Validator\Constraints;

/**
 * Edit member form.
 *
 * @author Koin <pkoin.koin@gmail.com>
 * @since 4 févr. 2012 
 * @version 1.0 - 4 févr. 2012 - Koin <pkoin.koin@gmail.com>
 */
class EditMemberType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('lastname', 'text', array('label' => 'Nom', 'required' => false, 'attr' => array('placeholder' => 'Facultatif.')))
            ->add('firstname', 'text', array('label' => 'Prénom', 'required' => false, 'attr' => array('placeholder' => 'Facultatif.')))
            ->add('email', 'email')
            ->add('password', 'password', array('label' => 'Mot de passe', 'required' => false));
    }
    
    public function getDefaultOptions(array $options)
    {
        $collectionConstraint = new Constraints\Collection(array(
            'fields' => array(
                'lastname'     => new Constraints\MaxLength(array('limit' => 80)),
                'firstname'    => new Constraints\MaxLength(array('limit' => 80)),
                'email'        => array(
                    new Constraints\Email(),
                    new Constraints\NotNull(),
                ),
                'password'     => new Constraints\MaxLength(array('limit' => 80)),
            ),
            'allowExtraFields' => false,
        ));
    
        return array('validation_constraint' => $collectionConstraint);
    }
    
    public function getName()
    {
        return 'signup';
    }
}