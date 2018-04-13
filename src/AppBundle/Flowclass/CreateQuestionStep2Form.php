<?php
namespace AppBundle\Flowclass;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class CreateQuestionStep2Form extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $validValues = array('CDD'=>'CDD' ,'CDI'=>'CDI' ,'Interim'=>'Intérim');
        $builder->add('contratType', ChoiceType::class, array(
            'choices' => array_combine($validValues, $validValues),
            'placeholder' => '',
            'label' => 'Quel est le type de votre contrat de travail actuel?',
            'expanded' => true,
        ));
    }

    public function getBlockPrefix() {
        return 'CreateQuestionStep2';
    }

}