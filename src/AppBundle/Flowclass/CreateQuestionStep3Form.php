<?php
/**
 * Created by PhpStorm.
 * User: maximeboilot
 * Date: 08/04/2018
 * Time: 16:56
 */

namespace AppBundle\Flowclass;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CreateQuestionStep3Form extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {

        //$validValues = array("CDD","CDI","Intérim");
        $builder->add('nombreHeuresTravaille', ChoiceType::class, [
            'label' => 'Donnez nous un peu plus de précision...', 'required' => true, 'choices' => [
                 'J\'exerce ou j\'ai exercé(e) une activité salarié
                 d\'au moins 24 mois, consécutifs ou non, dans le
                 secteur privé au cours des 5 dernières années.'=>'Q3.1',
                 'J\'effectue ou j\'ai effectué 1600 heures (environ 11 mois)
                 en intérim sur les 18 derniers mois.'=>'Q3.2',

            ],
            'expanded' => true, 'multiple' => false,
        ]);
    }

    public function getBlockPrefix() {
        return 'CreateQuestionStep3';
    }

}