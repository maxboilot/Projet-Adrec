<?php
namespace AppBundle\Flowclass;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class CreateQuestionStep21Form extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        //$validValues = array('Q2.1'=>'CDD' ,'Q2.2'=>'CDI' ,'Q2.3'=>'Intérim');
        $builder->add('dateFinContrat', DateType::class,[
            'label' => 'Quelle est la date de votre fin de contrat?']);
    }

    public function getBlockPrefix() {
        return 'CreateQuestionStep21';
    }

}