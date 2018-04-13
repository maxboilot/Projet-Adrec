<?php
/**
 * Created by PhpStorm.
 * User: maximeboilot
 * Date: 10/04/2018
 * Time: 11:28
 */

namespace AppBundle\Flowclass;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CreateQuestionStep5Form extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('Etudes', ChoiceType::class, [
            'label' => 'Quel est votre niveau d\'étude', 'required' => true, 'choices' => [
                'Baccalauréat' => 'Bacc',
                'BTS' => 'BTS',
                'Licence' => 'Licence',
                'Master' => 'Master',
                'Autre' => 'Autre',
            ],
            'expanded' => true, 'multiple' => true,
        ]);
    }

    public function getBlockPrefix() {
        return 'CreateQuestionStep5';
    }

}