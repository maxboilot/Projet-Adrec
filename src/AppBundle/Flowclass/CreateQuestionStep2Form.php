<?php
namespace AppBundle\Flowclass;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class CreateQuestionStep2Form extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $validValues = array('Q2.1'=>'CDD' ,'Q2.2'=>'CDI' ,'Q2.3'=>'Intérim');
        $builder->add('contractType', ChoiceType::class, array(
            'choices' => array_combine($validValues, $validValues),
            'placeholder' => '',
            'label' => 'Quel à été votre dernier type de contrat?',
            'expanded' => true,
        ));
    }

    public function getBlockPrefix() {
        return 'CreateQuestionStep2';
    }

}