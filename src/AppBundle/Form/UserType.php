<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

        ->add('lastname', TextType::class,[
        'required' => true,
        'label' => 'Users.usersform.lastname',
      ])
        ->add('firstname', TextType::class,[
        'required' => true,
        'label' => 'Users.usersform.firstname',
      ])
        ->add('birthat', BirthdayType::class,[
        'label' => 'Users.usersform.birthat',
        'format' => 'yyyy-MM-dd',
      ])
        ->add('phone', IntegerType::class,[
        'label' => 'Users.usersform.phone',
      ])
        ->add('email', EmailType::class,[
        'label' => 'Users.usersform.email',
      ]);

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_user';
    }


}
