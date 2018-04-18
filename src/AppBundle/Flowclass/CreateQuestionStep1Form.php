<?php
namespace AppBundle\Flowclass;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class CreateQuestionStep1Form extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $validValues = array('Salarié(e)'=>'Salarié(e)' ,'DE'=>'Demandeur(se) d\'emploi','Etudiant'=>'Etudiant(e)' );
        $builder->add('statut', ChoiceType::class, array(
            'choices' => array_combine($validValues, $validValues),
            'placeholder' => '',
            'label' => 'Quelle est votre situation actuelle?',
            'expanded' => true,
        ));
    }

    public function getBlockPrefix() {
        return 'CreateQuestionStep1';
    }

}