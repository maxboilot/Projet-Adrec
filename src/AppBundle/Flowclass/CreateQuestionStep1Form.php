<?php
namespace AppBundle\Flowclass;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class CreateQuestionStep1Form extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $validValues = array('Q1.1'=>'Salarié' ,'Q1.2'=>'Demandeur(se) d\'emploi','Q1.3'=>'Autre' );
        $builder->add('statut', ChoiceType::class, array(
            'choices' => array_combine($validValues, $validValues),
            'placeholder' => '',
            'label' => 'Quel est votre situation actuel?',
            'expanded' => true,
        ));
    }

    public function getBlockPrefix() {
        return 'CreateQuestionStep1';
    }

}