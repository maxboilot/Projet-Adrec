<?php
/**
 * Created by PhpStorm.
 * User: maximeboilot
 * Date: 08/04/2018
 * Time: 16:56
 */

namespace AppBundle\Flowclass;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CreateQuestionStep3Form extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('nombreHeuresTravaille', ChoiceType::class, [
            'label' => 'Donnez nous un peu plus de précision...', 'required' => true, 'choices' => [
                 'J\'exerce ou j\'ai exercé(e) une activité salariée
                 d\'au moins 24 mois, consécutifs ou non, dans le
                 secteur privé au cours des 5 dernières années.'=>'activiteSalarieOk',
                 'J\'effectue ou j\'ai effectué 1600 heures (environ 11 mois)
                 en intérim sur les 18 derniers mois.'=>'activiteInterimOk',

            ],
            'expanded' => true, 'multiple' => true,
        ]);

        $builder->add('nombreHeuresCPF', NumberType::class,[
            'label' => 'Combien d\'heures de formation avez-vous acquises (CPF) ?']);

    }

    public function getBlockPrefix() {
        return 'CreateQuestionStep3';
    }

}