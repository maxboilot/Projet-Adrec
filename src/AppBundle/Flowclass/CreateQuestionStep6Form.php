<?php
/**
 * Created by PhpStorm.
 * User: maximeboilot
 * Date: 10/04/2018
 * Time: 11:40
 */

namespace AppBundle\Flowclass;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CreateQuestionStep6Form extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {


        $builder->add('Compet', ChoiceType::class, [
            'label' => 'Quelles sont vos principales compétences?', 'required' => true, 'choices' => [
                'Word'=>'Word',
                'Excel'=>'Excel',
                'Powerpoint'=>'Powerpoint',
                'Développement web'=>'Développement web',
                'Gestion de planning'=>'Gestion de planning',
                'Gestion téléphonques'=>'Gestion téléphonques',
                'Relation clientèle'=>'Relation clientèle',
                'Négociation vente'=>'Négociation vente',
                'Management'=>'Management',
                'Comptabilité'=>'Comptabilité',
                'Fiscalité'=>'Fiscalité',
                'Droit'=>'Droit',

            ],
            'expanded' => true, 'multiple' => true,
        ]);

    }

    public function getBlockPrefix() {
        return 'CreateQuestionStep6';
    }
}