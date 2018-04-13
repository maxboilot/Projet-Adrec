<?php
/**
 * Created by PhpStorm.
 * User: maximeboilot
 * Date: 10/04/2018
 * Time: 11:24
 */

namespace AppBundle\Flowclass;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CreateQuestionStep4Form extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {


        $builder->add('RqthMs', ChoiceType::class, [
            'label' => 'Donnez nous un peu plus de précision...', 'required' => true, 'choices' => [
                'Je suis reconnu(e) en Qualité Travailleur Handicapé (RQTH).'=>'RQTH',
                'Je bénéficie de minima sociaux (RSA, ASS, AAH).'=>'MinimaS',

            ],
            'expanded' => true, 'multiple' => true,
        ]);

    }

    public function getBlockPrefix() {
        return 'CreateQuestionStep4';
    }

}