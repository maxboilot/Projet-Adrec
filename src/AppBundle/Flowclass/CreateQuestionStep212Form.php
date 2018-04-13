<?php
namespace AppBundle\Flowclass;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class CreateQuestionStep212Form extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $validValues = array('cdiPlus1An'=>'plus d\'1 an' ,'cdiMoins1An'=>'moins d\'1 an');
        $builder->add('tempsEnCdi', ChoiceType::class, array(
            'choices' => array_combine($validValues, $validValues),
            'placeholder' => '',
            'label' => 'Depuis combien de temps êtes vous en CDI?',
            'expanded' => true,
        ));

        $validValues = array('dispoOui'=>'Oui' ,'dispoNon'=>'Non');
        $builder->add('dispo', ChoiceType::class, array(
            'choices' => array_combine($validValues, $validValues),
            'placeholder' => '',
            'label' => 'Avez vous des disponibilités hors temps de travail?',
            'expanded' => true,
        ));
    }

    public function getBlockPrefix() {
        return 'CreateQuestionStep212';
    }

}