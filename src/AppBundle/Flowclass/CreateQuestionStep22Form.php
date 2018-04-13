<?php
namespace AppBundle\Flowclass;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class CreateQuestionStep22Form extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $validValues = array('Q2.2.1'=>'Oui', 'Q2.2.2'=>'Non');
        $builder->add('pole', ChoiceType::class, array(
            'choices' => array_combine($validValues, $validValues),
            'placeholder' => '',
            'label' => 'Êtes vous indémnisé(e) par Pôle Emploi?',
            'expanded' => true,
        ));
    }

    public function getBlockPrefix() {
        return 'CreateQuestionStep22';
    }

}